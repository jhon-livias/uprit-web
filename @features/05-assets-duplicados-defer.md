# Prompt — Fase 5: Eliminar duplicados y defer en scripts

Copia todo el bloque de abajo en el chat de Cursor:

---

Optimiza la carga de assets en `@resources/views/web/layouts/principal.blade.php`.

**Problemas detectados:**
1. **Swiper duplicado:** local (`vendor/swiper-bundle.min.css/js`) + CDN v11 (`cdn.jsdelivr.net/npm/swiper@11`).
2. **24+ scripts síncronos** al final del body bloquean ejecución en cadena.
3. **Iconify en `<head>`** bloquea render: `code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js`.
4. Google Fonts carga 9 pesos (100-900) de Spartan.
5. Muchas librerías en todas las páginas: Isotope, Odometer, Vivus, Lightbox, jQuery UI, etc.

**Implementar:**
1. Dejar **una sola** versión de Swiper (preferir la que ya usa el código; revisar `index.blade.php` y scripts inline).
2. Mover Iconify al final del body con `defer`.
3. Añadir `defer` a scripts no críticos del vendor (mantener jQuery antes de dependientes, o usar defer en orden correcto).
4. Reducir Google Fonts a pesos 400, 600, 700 con `display=swap`.
5. Identificar librerías no usadas en páginas web públicas y comentar/eliminar las que no se necesiten (grep en `resources/views/web/`).

**Restricciones:**
- No romper sliders, modales, chatbot ni menú móvil.
- Probar home y al menos una página interna (ej. detalle carrera).
- Cambio conservador: si dudas de una librería, déjala.

**Archivos:**
- `resources/views/web/layouts/principal.blade.php`
- Revisar `@yield('scripts')` en vistas hijas

**Métrica objetivo:** bajar requests totales (actualmente ~102) y tiempo hasta DOMContentLoaded (< 3s).

---
