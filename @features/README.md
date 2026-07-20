# Prompts de optimización — UPRIT Web

Prompts listos para copiar y pegar en el chat de Cursor. Cada archivo es una tarea independiente, ordenada por impacto.

## Uso en Bash (Git Bash / WSL)

```bash
cd @features
bash prompts.sh              # menú interactivo
bash prompts.sh list         # listar todos los prompts
bash prompts.sh 1            # mostrar prompt fase 1 (copiar manualmente)
bash prompts.sh 1 | clip     # Windows: copiar al portapapeles (Git Bash)
bash prompts.sh 1 | pbcopy   # macOS
bash prompts.sh 1 | xclip -selection clipboard   # Linux
```

## Orden recomendado

| # | Archivo | Impacto | Tiempo est. |
|---|---------|---------|-------------|
| 1 | `01-preloader-fix.md` | Inmediato (percepción) | ~15 min |
| 2 | `02-backend-cache-queries.md` | Alto (TTFB) | ~30 min |
| 3 | `03-limit-home-noticias.md` | Alto (home) | ~15 min |
| 4 | `04-chatbot-json-minimo.md` | Alto (HTML size) | ~45 min |
| 5 | `05-assets-duplicados-defer.md` | Alto (JS/CSS) | ~30 min |
| 6 | `06-iconify-svg-optimizar.md` | Medio (Network: mdi.json lento) | ~30 min |
| 7 | `07-imagenes-videos-lazy.md` | Medio-alto | ~45 min |
| 8 | `08-css-purge-minify.md` | Medio | ~1 h |
| 9 | `09-produccion-cache-headers.md` | Medio (infra) | ~30 min |

## Deploy y cachés (Fase 9)

### Pipeline recomendado

```bash
composer install --no-dev --optimize-autoloader --no-interaction
npm ci && npm run build
php artisan optimize
```

En VPS: `./vps/update.sh --pull` (incluye `optimize` e invalida menú/chatbot).

### Invalidar menú / chatbot (admin)

Tras editar categorías, carreras o niveles:

```bash
php artisan tinker --execute="App\Services\WebNavigationCache::forget();"
```

TTL configurable: `WEB_NAV_CACHE_TTL` en `.env` (default 3600 s).

### Invalidar todo Laravel

```bash
php artisan optimize:clear
```

### Assets estáticos

- Apache: reglas en `public/.htaccess` (gzip + `Cache-Control`).
- nginx: `vps/nginx-static-cache.conf.example`.
- Producción: `APP_DEBUG=false` (ver `.env.example`).

## Métricas objetivo (según tu Network tab)

- **Actual:** DOMContentLoaded ~8.5s, Load ~1.1 min, ~12 MB, 102 requests
- **Meta razonable:** DOMContentLoaded < 3s, Load < 15s, < 5 MB, < 60 requests

## Notas del análisis previo

- `sitePreloader` en `public/web/assets/js/app.js` existe pero no se invoca en `methods()`.
- Request `rum` pendiente puede estar bloqueando el evento `load`.
- Iconify hace fetch individuales a `mdi.json` (~1.5s c/u).
- Swiper cargado dos veces (local + CDN v11).
