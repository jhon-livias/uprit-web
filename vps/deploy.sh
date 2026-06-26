#!/usr/bin/env bash
# deploy.sh — Despliegue del sitio institucional UPRIT en Apache + MariaDB
set -euo pipefail

APP_DIR="/var/www/uprit-web"
DOMAIN="${UPRIT_DOMAIN:-staging.uprit.edu.pe}"
DB_NAME="upritedu_bd"
DB_USER="upritedu_user"
DB_PASS="${UPRIT_DB_PASS:-$(openssl rand -base64 24 | tr -dc 'A-Za-z0-9' | head -c 24)}"

cd "$APP_DIR"

echo "==> MariaDB (primero, AppServiceProvider consulta la BD al boot)"
sudo mariadb <<SQL
DROP DATABASE IF EXISTS \`${DB_NAME}\`;
CREATE DATABASE \`${DB_NAME}\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
DROP USER IF EXISTS '${DB_USER}'@'localhost';
CREATE USER '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}';
GRANT ALL PRIVILEGES ON \`${DB_NAME}\`.* TO '${DB_USER}'@'localhost';
FLUSH PRIVILEGES;
SQL

if [[ -f database/query/upritedu_bd.sql ]]; then
  echo "==> Importando dump SQL"
  sudo mariadb "$DB_NAME" < database/query/upritedu_bd.sql
fi

echo "==> .env"
cp .env.example .env
sed -i "s|^APP_NAME=.*|APP_NAME=UPRIT|" .env
sed -i "s|^APP_ENV=.*|APP_ENV=production|" .env
sed -i "s|^APP_DEBUG=.*|APP_DEBUG=false|" .env
sed -i "s|^APP_URL=.*|APP_URL=https://${DOMAIN}|" .env
sed -i "s|^DB_CONNECTION=.*|DB_CONNECTION=mysql|" .env
sed -i "s|^DB_DATABASE=.*|DB_DATABASE=${DB_NAME}|" .env
sed -i "s|^DB_USERNAME=.*|DB_USERNAME=${DB_USER}|" .env
sed -i "s|^DB_PASSWORD=.*|DB_PASSWORD=${DB_PASS}|" .env

echo "==> Dependencias PHP"
composer install --no-dev --optimize-autoloader --no-interaction

echo "==> Node.js (si no existe)"
if ! command -v node >/dev/null 2>&1; then
  curl -fsSL https://deb.nodesource.com/setup_22.x | sudo -E bash -
  sudo apt-get install -y nodejs
fi

echo "==> Build frontend"
npm ci
npm run build

php artisan key:generate --force
php artisan storage:link --force || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo "==> Apache"
sudo tee /etc/apache2/sites-available/uprit-web.conf > /dev/null <<APACHE
<VirtualHost *:80>
    ServerName ${DOMAIN}
    DocumentRoot ${APP_DIR}/public

    <Directory ${APP_DIR}/public>
        Options FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/uprit-web-error.log
    CustomLog \${APACHE_LOG_DIR}/uprit-web-access.log combined
</VirtualHost>
APACHE

sudo a2ensite uprit-web.conf
sudo a2enmod rewrite
sudo apache2ctl configtest
sudo systemctl reload apache2

echo ""
echo "Deploy completado."
echo "  App:     ${APP_DIR}"
echo "  Domain:  ${DOMAIN}"
echo "  DB user: ${DB_USER}"
echo "  DB pass: ${DB_PASS}"
echo ""
echo "SSL (cuando el DNS apunte a este servidor):"
echo "  sudo certbot --apache -d ${DOMAIN} -d uprit.edu.pe"
