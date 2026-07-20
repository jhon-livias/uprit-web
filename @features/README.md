# Prompts de optimización — UPRIT Web

Prompts listos para copiar y pegar en el chat de Cursor. Cada archivo es una tarea independiente, ordenada por impacto.

## Regla de oro

**Solo latencia y peso. Cero cambios visibles.**

Si al aplicar las fases el diseño o el contenido cambian, la optimización **no cuenta**: hay que revertir y acotar el cambio. Lee `00-reglas-diseño.md` y pégalo al inicio del chat si hace falta.

### No ejecutar las 9 fases de golpe

Aplicar **una fase → probar en navegador → commit** (o revertir). Las fases 5, 7 y 8 son las que más suelen romper el diseño.

### Checklist rápido post-cambio

- [ ] Home igual (hero, sliders, noticias, testimonios)
- [ ] Una página de carrera igual
- [ ] Menú móvil y chatbot funcionan
- [ ] Sin iconos rotos ni secciones vacías
- [ ] Network tab mejoró (TTFB, DOMContentLoaded, KB)

## Uso en Bash (Git Bash / WSL)

```bash
cd @features
bash prompts.sh              # menú interactivo
bash prompts.sh list         # listar todos los prompts
bash prompts.sh 0            # reglas de diseño (copiar primero)
bash prompts.sh 1            # mostrar prompt fase 1
bash prompts.sh 1 | clip     # Windows: copiar al portapapeles (Git Bash)
bash prompts.sh 1 | pbcopy   # macOS
bash prompts.sh 1 | xclip -selection clipboard   # Linux
```

## Orden recomendado

| # | Archivo | Impacto | Riesgo diseño | Tiempo est. |
|---|---------|---------|---------------|-------------|
| 0 | `00-reglas-diseño.md` | — | — | leer siempre |
| 1 | `01-preloader-fix.md` | Inmediato (percepción) | Bajo | ~15 min |
| 2 | `02-backend-cache-queries.md` | Alto (TTFB) | Bajo | ~30 min |
| 3 | `03-limit-home-noticias.md` | Alto (home) | Medio | ~15 min |
| 4 | `04-chatbot-json-minimo.md` | Alto (HTML size) | Medio | ~45 min |
| 5 | `05-assets-duplicados-defer.md` | Alto (JS/CSS) | Medio-alto | ~30 min |
| 6 | `06-iconify-svg-optimizar.md` | Medio (Network) | Medio | ~30 min |
| 7 | `07-imagenes-videos-lazy.md` | Medio-alto | Alto | ~45 min |
| 8 | `08-css-purge-minify.md` | Medio | **Alto** | ~1 h |
| 9 | `09-produccion-cache-headers.md` | Medio (infra) | Mínimo | ~30 min |

**Orden seguro sugerido:** 9 → 2 → 1 → 5 → 6 → 3 → 4 → 7 → 8 (dejar CSS purge al final y solo con diff visual).

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

**Importante:** las métricas no valen si el diseño o el contenido empeoran. Prioridad: paridad visual → luego números.

## Notas del análisis previo

- `sitePreloader` en `public/web/assets/js/app.js` existe pero no se invoca en `methods()`.
- Request `rum` pendiente puede estar bloqueando el evento `load`.
- Iconify hace fetch individuales a `mdi.json` (~1.5s c/u).
- Swiper cargado dos veces (local + CDN v11).
