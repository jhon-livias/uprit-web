#!/usr/bin/env bash
# UPRIT Web — Copiar prompts de optimización al chat de Cursor
# Uso: bash prompts.sh | bash prompts.sh list | bash prompts.sh 1

set -euo pipefail

DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$DIR"

PROMPTS=(
  "00-reglas-diseño.md|Fase 0: Reglas — rendimiento sin cambiar diseño"
  "01-preloader-fix.md|Fase 1: Arreglar preloader (impacto inmediato)"
  "02-backend-cache-queries.md|Fase 2: Cachear queries del menú (TTFB)"
  "03-limit-home-noticias.md|Fase 3: Limitar noticias en home"
  "04-chatbot-json-minimo.md|Fase 4: JSON mínimo del chatbot"
  "05-assets-duplicados-defer.md|Fase 5: Duplicados Swiper + defer scripts"
  "06-iconify-svg-optimizar.md|Fase 6: Iconify + SVG inject + rum"
  "07-imagenes-videos-lazy.md|Fase 7: Lazy load imágenes y videos"
  "08-css-purge-minify.md|Fase 8: Reducir app.css (~1 MB)"
  "09-produccion-cache-headers.md|Fase 9: Cache headers producción"
)

print_header() {
  echo "=============================================="
  echo "  UPRIT Web — Prompts de optimización"
  echo "  Directorio: $DIR"
  echo "=============================================="
  echo ""
}

list_prompts() {
  print_header
  echo "Prompts disponibles:"
  echo ""
  local i=1
  for entry in "${PROMPTS[@]}"; do
    local file="${entry%%|*}"
    local desc="${entry#*|}"
    printf "  %2d) %s\n      → %s\n\n" "$i" "$desc" "$file"
    ((i++)) || true
  done
  echo "Comandos:"
  echo "  bash prompts.sh 0            Reglas de diseño (pegar primero)"
  echo "  bash prompts.sh <número>     Mostrar prompt (copiar al chat)"
  echo "  bash prompts.sh all          Mostrar índice + instrucciones"
  echo ""
  echo "Copiar al portapapeles:"
  echo "  bash prompts.sh 1 | clip          # Windows Git Bash"
  echo "  bash prompts.sh 1 | pbcopy        # macOS"
  echo "  bash prompts.sh 1 | xclip -sel c  # Linux"
  echo ""
}

show_prompt() {
  local num="$1"
  if ! [[ "$num" =~ ^[0-9]+$ ]] || (( num < 1 || num > ${#PROMPTS[@]} )); then
    echo "Error: número inválido. Usa 1-${#PROMPTS[@]}" >&2
    exit 1
  fi
  local entry="${PROMPTS[$((num - 1))]}"
  local file="${entry%%|*}"
  local desc="${entry#*|}"
  local path="$DIR/$file"

  if [[ ! -f "$path" ]]; then
    echo "Error: no existe $path" >&2
    exit 1
  fi

  echo "# $desc"
  echo "# Archivo: $file"
  echo "# --- Copia desde aquí ---"
  echo ""
  # Extraer solo el bloque del prompt (después de "---")
  awk '
    /^---$/ { if (++n >= 1) show=1; next }
    show && /^---$/ { exit }
    show { print }
  ' "$path"
  echo ""
  echo "# --- Hasta aquí ---"
}

show_all_index() {
  list_prompts
  echo "Orden sugerido: fase 0 siempre; luego 9 → 2 → 1 → 5 (una fase, probar, commit)."
  echo "No ejecutar todas seguidas: fases 5, 7 y 8 suelen alterar el diseño."
  echo "Métricas actuales: DOMContentLoaded ~8.5s | Load ~1.1 min | ~12 MB"
}

interactive_menu() {
  list_prompts
  while true; do
    echo -n "Elige número (1-${#PROMPTS[@]}) o 'q' para salir: "
    read -r choice
    case "$choice" in
      q|Q) echo "Salida."; exit 0 ;;
      [0-9]*)
        echo ""
        show_prompt "$choice"
        echo ""
        echo "Tip: vuelve a ejecutar 'bash prompts.sh $choice | clip' para copiar."
        echo ""
        ;;
      *) echo "Opción no válida." ;;
    esac
  done
}

case "${1:-menu}" in
  list|ls)
    list_prompts
    ;;
  all)
    show_all_index
    ;;
  menu|"")
    interactive_menu
    ;;
  help|-h|--help)
    print_header
    echo "Uso:"
    echo "  bash prompts.sh           Menú interactivo"
    echo "  bash prompts.sh list      Listar prompts"
    echo "  bash prompts.sh all       Índice + métricas"
    echo "  bash prompts.sh <0-9>     Imprimir prompt para copiar"
    echo "  bash prompts.sh 1 | clip  Copiar fase 1 (Windows Git Bash)"
    ;;
  *)
    show_prompt "$1"
    ;;
esac
