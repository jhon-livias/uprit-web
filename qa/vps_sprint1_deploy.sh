#!/bin/bash
# ==========================================================
# SCRIPT VPS - SPRINT 1 SEGURIDAD - uprit-web
# Ejecutar en el servidor como usuario con sudo
# Fecha: 23/09/2026
# ==========================================================

set -e  # Detener si hay error

VPS_DB_NAME="upritedu_bd"
VPS_DB_ROOT_PASS="[INGRESAR PASSWORD ROOT MYSQL DEL VPS]"
NEW_DB_USER="uprit_app_user"
NEW_DB_PASS="mvNWD-cxEi+qH=9oaGewUS1OhKQ8gutl"
APP_DIR="/var/www/uprit-web"   # Ajustar a la ruta real del proyecto en el VPS

echo "=== [1/5] Creando usuario MySQL seguro ==="
mysql -u root -p"${VPS_DB_ROOT_PASS}" <<SQL
CREATE USER IF NOT EXISTS '${NEW_DB_USER}'@'127.0.0.1' IDENTIFIED BY '${NEW_DB_PASS}';
CREATE USER IF NOT EXISTS '${NEW_DB_USER}'@'localhost' IDENTIFIED BY '${NEW_DB_PASS}';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES
  ON ${VPS_DB_NAME}.*
  TO '${NEW_DB_USER}'@'127.0.0.1';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES
  ON ${VPS_DB_NAME}.*
  TO '${NEW_DB_USER}'@'localhost';
FLUSH PRIVILEGES;
SELECT user, host FROM mysql.user WHERE user='${NEW_DB_USER}';
SQL
echo "✓ Usuario MySQL creado"

echo "=== [2/5] Actualizando .env en el servidor ==="
cd "${APP_DIR}"

# Hacer backup del .env actual
cp .env .env.backup.$(date +%Y%m%d_%H%M%S)

# Aplicar cambios de seguridad
sed -i "s/^APP_ENV=.*/APP_ENV=production/" .env
sed -i "s/^APP_DEBUG=.*/APP_DEBUG=false/" .env
sed -i "s/^APP_URL=.*/APP_URL=https:\/\/uprit.edu.pe/" .env
sed -i "s/^LOG_LEVEL=.*/LOG_LEVEL=warning/" .env
sed -i "s/^DB_USERNAME=.*/DB_USERNAME=${NEW_DB_USER}/" .env
sed -i "s/^DB_PASSWORD=.*/DB_PASSWORD=${NEW_DB_PASS}/" .env
sed -i "s/^SESSION_ENCRYPT=.*/SESSION_ENCRYPT=true/" .env

# Añadir SESSION_SECURE_COOKIE si no existe
grep -q "SESSION_SECURE_COOKIE" .env || echo "SESSION_SECURE_COOKIE=true" >> .env

echo "✓ .env actualizado"

echo "=== [3/5] Limpiando caché de Laravel ==="
php artisan config:clear
php artisan cache:clear
php artisan view:clear
echo "✓ Caché limpiada"

echo "=== [4/5] Creando directorio privado para evidencias de reclamos ==="
mkdir -p storage/app/private/reclamos
chmod 775 storage/app/private/reclamos

# Si existen archivos anteriores en public/reclamos_evidencia/, moverlos
if [ -d "public/reclamos_evidencia" ]; then
    echo "  Moviendo archivos existentes de evidencias..."
    mv public/reclamos_evidencia/* storage/app/private/reclamos/ 2>/dev/null || true
    rm -rf public/reclamos_evidencia/
    echo "  ✓ Archivos migrados"
else
    echo "  (No existe directorio público de evidencias, omitiendo migración)"
fi

echo "=== [5/5] Verificando conexión a BD con nuevo usuario ==="
php artisan db:show 2>&1 | head -10

echo ""
echo "=== ✅ SPRINT 1 COMPLETADO EN VPS ==="
echo "Password del nuevo usuario DB: ${NEW_DB_PASS}"
echo "Guardar en un gestor de contraseñas seguro (1Password, Bitwarden, etc.)"
