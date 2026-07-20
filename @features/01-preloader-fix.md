# Prompt — Fase 1: Arreglar preloader

Copia todo el bloque de abajo en el chat de Cursor:

---

Arregla el preloader lento en `@resources/views/web/layouts/principal.blade.php` y `@public/web/assets/js/app.js`.

**Contexto medido en DevTools:**
- DOMContentLoaded: ~8.5s
- Load: ~1.1 min
- El preloader `#edublink-preloader` bloquea toda la UI con z-index altísimo.

**Problemas detectados:**
1. `sitePreloader()` existe en `public/web/assets/js/app.js` pero NO se invoca en la función `methods()` que arranca el tema EduBlink.
2. Cuando funciona, está diseñado para esperar `window.load` (todos los recursos), lo cual es demasiado lento.
3. El CSS del preloader tiene `transition: all 1.5s ease-out` en `#edublink-preloader` (`public/web/assets/css/app.css`).

**Implementar:**
1. Invocar la lógica del preloader al iniciar la app (o reemplazar con script claro en `principal.blade.php` si el JS ofuscado es difícil de mantener).
2. Ocultar el preloader en `DOMContentLoaded` con timeout máximo de 3 segundos (fallback por si algo cuelga).
3. NO esperar `window.load` para ocultar el preloader.
4. Reducir la transición CSS del preloader a ~300ms.
5. Añadir botón "Saltar" opcional solo si el preloader sigue visible tras 2s (accesibilidad).

**Restricciones (obligatorias):**
- **Solo rendimiento:** el sitio debe verse y comportarse igual que antes.
- Cambio mínimo y enfocado; no refactorizar todo el tema.
- Mantener el diseño visual actual (logo UPRIT sobre fondo #91001E, mismas transiciones visibles al usuario).
- No cambiar HTML del preloader salvo lo estrictamente necesario para ocultarlo antes.
- Probar home y una página interna; comparar captura antes/después.

**Archivos principales:**
- `resources/views/web/layouts/principal.blade.php`
- `public/web/assets/js/app.js`
- `public/web/assets/css/app.css` (solo reglas del preloader)

---

## Resultado aplicado

| Requisito | Implementación |
|-----------|----------------|
| Ocultar en `DOMContentLoaded` | Script inline en `principal.blade.php` (líneas ~44–85) |
| Fallback 3 s | `setTimeout(hidePreloader, 3000)` |
| Botón «Saltar» a los 2 s | Inyectado por JS si sigue visible |
| Transición ~300 ms | `app.css` + `.is-hidden` en `uprit-custom.css` |
| `app.js` | **Sin tocar** — `sitePreloader()` sigue atado a `window.load`; el script en Blade lo sustituye de forma explícita |

**Verificación:** recarga `/` con caché desactivada; el preloader debe desaparecer antes del evento **Load** del Network tab.

---
