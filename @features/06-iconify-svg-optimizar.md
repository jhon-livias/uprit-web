# Prompt — Fase 6: Optimizar Iconify y SVG inject

Copia todo el bloque de abajo en el chat de Cursor:

---

Optimiza Iconify y SVG inject según métricas de Network tab.

**Problema medido:**
- Requests a `mdi.json?icons=...` tardan **1.14s - 1.72s** cada uno (initiator: `iconify-icon.min.js`).
- `icon01.svg`, `icon02.svg`, `icon03.svg` vía `svg-inject.min.js` tardan ~736-842ms c/u.
- Hay múltiples iconos Iconify en header/footer (`mdi:phone`, etc.).

**Implementar (prioridad):**

1. **Iconify — precargar iconos usados:**
   - Auditar todos los `iconify-icon icon="mdi:..."` en `resources/views/web/`.
   - Opción A: bundle local de iconos usados (sin fetch runtime a API).
   - Opción B: un solo `<script src="...iconify.min.js" data-icon="mdi:phone,mdi:..." defer>` con lista de iconos.
   - Opción C: reemplazar iconos críticos above-the-fold por SVG inline o `<i class="icon-*">` del tema icomoon ya cargado.

2. **SVG inject (`svgInject`):**
   - Los 3 iconos de features en home (`icon01.svg`, `icon02.svg`, `icon03.svg`) convertir a inline SVG en `index.blade.php` o servir como `<img>` estático si no necesitan animación Vivus.
   - Evaluar si `svgVivusAnimation` en app.js es necesario en home.

3. **Request `rum` pendiente:**
   - Buscar en el proyecto qué script dispara request `rum` (Real User Monitoring).
   - Si es de un script externo/analytics, cargarlo con `async` o después del preloader para que no bloquee `window.load`.

**Archivos:**
- `resources/views/web/layouts/header.blade.php`
- `resources/views/web/layouts/footer.blade.php`
- `resources/views/web/index.blade.php`
- `resources/views/web/layouts/principal.blade.php`
- Buscar: `grep -r "iconify-icon\|svgInject\|rum" resources/views/web/`

**Restricciones (obligatorias):**
- **Los iconos deben verse idénticos** (mismo tamaño, color, alineación). No sustituir por otro set si cambia el aspecto.
- Preferir precarga/bundle de los mismos iconos MDI; inline SVG solo como copia pixel-equivalente.
- SVG inject: si se inlinean icon01–03, mantener mismas dimensiones y animación Vivus si existía.
- No eliminar `rum`/analytics si eso rompe otra cosa; solo diferir carga sin cambiar UX.

**Objetivo:** eliminar fetches lentos a mdi.json en carga inicial; reducir dependencia de svg-inject para above-the-fold.

---
