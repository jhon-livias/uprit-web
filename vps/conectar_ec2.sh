#!/usr/bin/env bash
#
# conectar_ec2.sh — Conexión SSH segura a una instancia EC2 de AWS.
# Uso: ./conectar_ec2.sh
#

set -euo pipefail

# =============================================================================
# CONFIGURACIÓN — Edita solo estas dos variables según tu entorno
# =============================================================================

# Hostname o IP pública de tu instancia EC2
EC2_HOST="ec2-13-217-220-99.compute-1.amazonaws.com"

# Ruta local a tu llave privada (.pem)
# Por defecto apunta al .pem en la misma carpeta que este script.
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PEM_FILE="${SCRIPT_DIR}/RepositoryMagazine.pem"

# Usuario SSH de la instancia (Amazon Linux suele usar ec2-user; Ubuntu usa ubuntu)
SSH_USER="ubuntu"

# =============================================================================
# CONEXIÓN
# =============================================================================

# 1. Verificar que la llave privada existe
if [[ ! -f "${PEM_FILE}" ]]; then
  echo "Error: no se encontró la llave privada en: ${PEM_FILE}" >&2
  exit 1
fi

# 2. Aplicar permisos estrictos (solo lectura para el propietario).
#    SSH rechaza llaves con permisos demasiado abiertos (grupo/otros con lectura).
chmod 400 "${PEM_FILE}"

# 3. Conectar a la instancia EC2 usando la llave privada
exec ssh -i "${PEM_FILE}" "${SSH_USER}@${EC2_HOST}"
