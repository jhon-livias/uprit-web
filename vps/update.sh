#!/usr/bin/env bash
#
# update.sh — Actualiza la app en el VPS (ejecutar en el servidor).
# Uso normal: ./vps/publicar.sh  (lo invoca vía SSH)
#
set -euo pipefail

APP_DIR="/var/www/uprit-web"
DOMAIN="staging.uprit.edu.pe"
GIT_BRANCH="main"

DO_PULL=false
for arg in "$@"; do
  case "$arg" in
    --pull) DO_PULL=true ;;
  esac
done

cd "$APP_DIR"

if $DO_PULL; then
  echo "==> Git pull"
  git fetch origin "${GIT_BRANCH}"
  git reset --hard "origin/${GIT_BRANCH}"
  git clean -fd \
    -e .env \
    -e vendor \
    -e node_modules \
    -e storage/logs \
    -e storage/framework/cache \
    -e storage/framework/sessions \
    -e storage/framework/views \
    -e bootstrap/cache
fi

echo "==> Dependencias PHP"
composer install --no-dev --optimize-autoloader --no-interaction

echo "==> Build frontend"
npm ci
npm run build

echo "==> Cachés Laravel"
php artisan storage:link --force 2>/dev/null || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Permisos"
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo "==> Recargar Apache"
sudo apache2ctl configtest
sudo systemctl reload apache2

echo ""
echo "Actualización completada."
echo "  URL: https://${DOMAIN}"
echo "  Health: https://${DOMAIN}/up"
