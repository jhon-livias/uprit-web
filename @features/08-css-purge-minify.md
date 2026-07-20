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
- **PurgeCSS agresivo** que quite clases usadas por JS, `:hover`, menú móvil o estados del tema.
- Deploy de CSS recortado sin comparar visualmente home + carrera + footer.

**Restricciones (obligatorias):**
- **Prioridad: paridad visual.** Si el CSS pesa menos pero algo se ve roto, no entregar el cambio.
- Separar `uprit-custom.css` está bien; no mover reglas del tema que afecten layout global sin probar.
- Documentar qué se eliminó; preferir eliminar bloques claramente de demo/RTL/dark duplicado del theme vendor.

**Entregable:**
- Reducción medible del KB de CSS en Network tab.
- Documentar qué se eliminó y por qué.

**Archivos:**
- `public/web/assets/css/app.css`
- Nuevo: `public/web/assets/css/uprit-custom.css` (opcional)
- `resources/views/web/layouts/principal.blade.php`

---

## Resultado aplicado (conservador)

Script: `node scripts/split-uprit-css.mjs` (re-ejecutable sobre backup si hace falta).

| Archivo | Antes | Después (actual en repo) |
|---------|-------|---------------------------|
| `app.css` | ~990 KB / 45151 líneas | **~824 KB / 36830 líneas** |
| `uprit-custom.css` | — | **~52 KB / 3282 líneas** |
| **Total descargado** | ~990 KB | **~876 KB** (−~114 KB) |

> Medición local: `app.css` 843708 bytes, `uprit-custom.css` 53094 bytes. El script `split-uprit-css.mjs` solo debe ejecutarse **una vez** sobre el `app.css` original; si ya se aplicó, no volver a correr (rompe rangos de líneas).

### Eliminado de `app.css` (no usado en UPRIT)

1. **RTL** (`html[dir="rtl"]`, líneas 37991–41879): el sitio no define `dir="rtl"` en ninguna vista.
2. **Theme preview / landing demo** (`.pv-*`, `.edublink-landing-page`, líneas 19163–20315): páginas demo del theme EduBlink, sin referencias en `resources/views/web/`.
3. **`@import` Google Fonts** en CSS: duplicado; Spartan ya carga en `principal.blade.php`.
4. Selectores `.pv-*` en el reset global de listas (5 líneas).

### Movido a `uprit-custom.css` (sin cambio visual)

Reglas custom UPRIT desde ~línea 41881: preloader, hero, header sticky, marquesina, convenios, footer, carreras, chatbot, etc.

### No tocado (paridad visual)

- Bloque `.dark-mode` completo (toggle en `principal.blade.php`); referencias `.pv-*` restantes solo en reglas dark-mode del theme.
- CSS vendor en `<head>` (lightbox, odometer, etc.) — revisión aparte si se condiciona por página.
- PurgeCSS agresivo del resto del theme.

### Verificación en repo

- `principal.blade.php` líneas 23–24: `app.css` + `uprit-custom.css`.
- `app.css`: sin `html[dir="rtl"]` ni `.edublink-landing-page`.
- `uprit-custom.css`: `#edublink-preloader`, `.convenios-area`, hero, marquesina, chatbot, etc.

