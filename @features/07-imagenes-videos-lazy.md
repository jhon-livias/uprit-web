# Prompt — Fase 7: Lazy load imágenes y optimizar videos

Copia todo el bloque de abajo en el chat de Cursor:

---

Optimiza imágenes y videos pesados en la web pública.

**Problemas:**
- Hero en `@resources/views/web/index.blade.php` carga videos MP4 con `autoplay muted loop` por cada slider (`slider_principal_videos/`).
- Muchas imágenes sin `loading="lazy"` (noticias, testimonios, marquesina con ~18 iconos repetidos).
- `data-background` en slides de carreras fuerza carga de imágenes de fondo.

**Implementar:**

1. **Videos del hero:**
   - Solo el slide activo debe tener video; slides inactivos usar `poster` o imagen estática.
   - Añadir `preload="metadata"` (no `auto`) en `<video>`.
   - Cargar source del video al activar slide (lazy por Swiper event `slideChange`).

2. **Imágenes:**
   - `loading="lazy"` en todo below-the-fold.
   - `fetchpriority="high"` solo en logo/preloader si aplica.
   - Marquesina: una sola instancia del icono con CSS repeat en lugar de 18 `<img>` idénticos.

3. **Testimonios y noticias:**
   - Lazy load imágenes en `@resources/views/web/index.blade.php`.
   - Width/height explícitos donde falten (reduce CLS).

**Restricciones:**
- Mantener autoplay del primer video visible (UX actual).
- No re-encoding de videos en este paso (solo HTML/JS); sugerir compresión manual si hay MP4 > 5MB.

**Archivos:**
- `resources/views/web/index.blade.php`
- CSS relacionado en `public/web/assets/css/app.css` (marquesina, solo si necesario)

---
