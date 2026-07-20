# Regla de oro — rendimiento sin cambiar la web

**Objetivo:** bajar latencia, peso y requests. **No** rediseñar, recortar contenido visible ni cambiar UX.

Copia este bloque **antes** de cualquier fase si el agente no lo respeta:

---

## Regla de oro (obligatoria)

Esta tarea es **solo rendimiento**. El sitio debe verse y comportarse **igual** que antes para el usuario.

### NO hacer

- Cambiar colores, tipografías, espaciados, tamaños, animaciones ni layout.
- Eliminar secciones, slides, noticias, iconos, videos o textos que el usuario ve hoy.
- Sustituir componentes por alternativas “más ligeras” que se vean distinto (ej. marquesina con CSS distinto, iconos icomoon en lugar de Iconify si cambian de aspecto).
- PurgeCSS agresivo, quitar CSS vendor “por si acaso”, ni recortar `app.css` sin diff visual página por página.
- `defer`/`async` en scripts si rompe orden de dependencias (sliders, menú móvil, modales, chatbot).
- Lazy load en hero, logo, preloader, primer slide del slider ni above-the-fold.
- Reducir `limit()` de noticias por debajo de lo que la vista ya muestra.
- Recortar JSON del chatbot si eso quita respuestas o datos que el bot mostraba antes.

### SÍ hacer

- Cache backend, headers HTTP, preload/defer **solo** donde no cambie el resultado visual.
- Lazy load **below-the-fold** con mismas URLs e imágenes.
- Quitar **duplicados** (ej. Swiper local + CDN) manteniendo la versión que ya funciona.
- Medir antes/después: TTFB, DOMContentLoaded, peso — **y** captura visual de home + 1 página interna.

### Verificación obligatoria (antes de dar por terminado)

Comparar **lado a lado** con la versión anterior:

1. `/` — hero, sliders, marquesina, noticias, testimonios, footer.
2. Una carrera (`/carrera/...` o equivalente) — tabs, iconos, formulario.
3. Menú desktop y móvil, chatbot (abrir y una pregunta de prueba).
4. Sin iconos rotos, slides vacíos, estilos “sin CSS” ni contenido faltante.

Si algo visual o de contenido cambió → **revertir ese cambio** y buscar otra vía de optimización.

### Fases de mayor riesgo visual (probar una a una)

| Fase | Riesgo | Motivo |
|------|--------|--------|
| 8 — CSS purge | **Alto** | Elimina clases usadas por JS o estados hover |
| 7 — Lazy imágenes/videos | **Alto** | Hero y sliders pueden quedar en blanco |
| 5 — Defer / quitar libs | **Medio-alto** | Rompe Swiper, Isotope, lightbox |
| 6 — Iconify / SVG | **Medio** | Iconos distintos o missing |
| 3 — Limit noticias | **Medio** | Menos items visibles en home |
| 4 — JSON chatbot | **Medio** | Bot incompleto si se recortan campos |
| 1 — Preloader | **Bajo** | Solo timing; no cambiar markup/CSS del logo |
| 2 — Cache queries | **Bajo** | Solo backend si datos son idénticos |
| 9 — Cache headers | **Mínimo** | Infra; no toca HTML/CSS |

---
