#!/usr/bin/env bash
# Configuración compartida para scripts VPS.
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_ROOT="$(cd "${SCRIPT_DIR}/.." && pwd)"

EC2_HOST="ec2-13-217-220-99.compute-1.amazonaws.com"
SSH_USER="ubuntu"
APP_DIR="/var/www/uprit-web"
DOMAIN="staging.uprit.edu.pe"
GIT_REMOTE="origin"
GIT_BRANCH="main"

PEM_FILE="${SCRIPT_DIR}/RepositoryMagazine.pem"
if [[ ! -f "${PEM_FILE}" ]]; then
  PEM_FILE="${HOME}/Documents/UPRIT/RepositoryMagazine.pem"
fi

ssh_cmd() {
  ssh -i "${PEM_FILE}" -o StrictHostKeyChecking=accept-new "${SSH_USER}@${EC2_HOST}" "$@"
}

rsync_cmd() {
  # Nota: macOS usa openrsync (protocolo 29) incompatible con rsync del servidor.
  # Preferir git pull vía publicar.sh. Esta función queda por si se necesita sync puntual.
  RSYNC_RSH="ssh -i ${PEM_FILE} -o StrictHostKeyChecking=accept-new"
  rsync -avz --delete \
    --exclude 'node_modules' \
    --exclude '/vendor' \
    --exclude '.env' \
    --exclude '.git' \
    --exclude 'storage/logs/*' \
    --exclude 'storage/framework/views/*.php' \
    --exclude 'public/hot' \
    --exclude '*.pem' \
    -e "${RSYNC_RSH}" \
    "$@"
}

ensure_pem() {
  if [[ ! -f "${PEM_FILE}" ]]; then
    echo "Error: no se encontró la llave .pem en ${PEM_FILE}" >&2
    exit 1
  fi
  chmod 400 "${PEM_FILE}"
}
