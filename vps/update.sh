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
  sudo chown -R ubuntu:www-data "$APP_DIR"
  sudo chmod -R 775 storage bootstrap/cache
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

UPLOAD_DIRS=(
  public/testimonios_imagenes
  public/slider_principal_videos
  public/slider_principal_imagenes
  public/slider_carreras_imagenes
  public/noticias_imagenes
  public/noticias_autor_imagenes
  public/brochures_carreras
  public/brochures_imagenes
  public/reclamos_evidencia
  public/carreras_docentes
)

for dir in "${UPLOAD_DIRS[@]}"; do
  mkdir -p "${APP_DIR}/${dir}"
done

sudo chown -R ubuntu:www-data "${APP_DIR}/public"
sudo find "${APP_DIR}/public" -type d -exec chmod 775 {} \;
sudo find "${APP_DIR}/public" -type f -exec chmod 664 {} \;

echo "==> Recargar Apache"
sudo apache2ctl configtest
sudo systemctl reload apache2

echo ""
echo "Actualización completada."
echo "  URL: https://${DOMAIN}"
echo "  Health: https://${DOMAIN}/up"
