#!/usr/bin/env bash
#
# publicar.sh — Deploy local → VPS (staging.uprit.edu.pe)
#
# Uso:
#   ./vps/publicar.sh --push     Commit, push a GitHub y despliega
#   ./vps/publicar.sh            Push (si hay commits) y despliega
#
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
# shellcheck source=common.sh
source "${SCRIPT_DIR}/common.sh"

PUSH_GIT=false

for arg in "$@"; do
  case "$arg" in
    --push) PUSH_GIT=true ;;
    -h|--help)
      echo "Uso: $0 [--push]"
      echo "  --push   Hace git add, commit y push antes de desplegar"
      exit 0
      ;;
    *)
      echo "Opción desconocida: $arg" >&2
      exit 1
      ;;
  esac
done

ensure_pem

cd "${PROJECT_ROOT}"

if [[ -n "$(git status --porcelain)" ]]; then
  if $PUSH_GIT; then
    echo "==> Git commit"
    git add -A
    git commit -m "Deploy $(date +%Y-%m-%d\ %H:%M)"
  else
    echo "Error: hay cambios sin commit. Usa --push o haz commit manualmente." >&2
    exit 1
  fi
fi

echo "==> Git push"
git push "${GIT_REMOTE}" "${GIT_BRANCH}"

echo "==> Actualizando código en el VPS"
ssh_cmd "bash ${APP_DIR}/vps/update.sh --pull"

echo ""
echo "Deploy listo: https://${DOMAIN}"
