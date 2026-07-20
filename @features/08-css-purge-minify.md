# Prompt — Fase 8: Reducir app.css (~1 MB)

Copia todo el bloque de abajo en el chat de Cursor:

---

Reduce el peso de `@public/web/assets/css/app.css` (~990 KB / 45151 líneas).

**Contexto:** Es el CSS monolítico del tema EduBlink. Carga en TODAS las páginas vía `principal.blade.php`.

**Implementar (enfoque pragmático):**

1. **Auditoría:** Usar cobertura de Chrome DevTools o listar clases usadas en `resources/views/web/**/*.blade.php`.
2. **PurgeCSS / manual:** Identificar secciones claramente no usadas (landing variants, dark-mode duplicado, RTL, demos del tema).
3. **Separar CSS custom UPRIT:** Las reglas custom al final del archivo (~línea 42365+: `#edublink-preloader`, `.convenios-area`, etc.) mover a `public/web/assets/css/uprit-custom.css` pequeño.
4. **Vendor review:** Confirmar si todos los CSS vendor en head son necesarios (jqueru-ui-min.css, tipped, odometer, lightbox en páginas que no los usan).

**NO hacer en esta fase:**
- Reescribir todo el tema.
- Migrar a Tailwind en web pública (solo admin usa Vite/Tailwind).

**Entregable:**
- Reducción medible del KB de CSS en Network tab.
- Documentar qué se eliminó y por qué.

**Archivos:**
- `public/web/assets/css/app.css`
- Nuevo: `public/web/assets/css/uprit-custom.css` (opcional)
- `resources/views/web/layouts/principal.blade.php`

---
