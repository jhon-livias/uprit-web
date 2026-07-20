# Prompt — Fase 4: Reducir JSON embebido del chatbot

Copia todo el bloque de abajo en el chat de Cursor:

---

Reduce el tamaño del HTML inicial causado por el chatbot en `@resources/views/web/layouts/principal.blade.php`.

**Problema:** Líneas ~841-844 serializan datasets completos con `@json()`:

```javascript
const pregradoCategorias = @json($pregradoCategorias);
const pregradoPuedeCategorias = @json($pregradoPuedeCategorias);
const posgradoCategorias = @json($posgradoCategorias);
```

Incluyen relaciones profundas (docentes, malla, preguntas, perfil) que inflan el HTML en cada página.

**Implementar (elige la opción más simple que funcione):**

**Opción A — JSON mínimo inline (recomendada):**
1. En `AppServiceProvider` o un View Composer, preparar arrays ligeros solo con campos que usa el chatbot: `id`, `nombre`, `carreras[].id`, `carreras[].nombre`, y lo mínimo para `mostrarRespuesta()`.
2. Reemplazar `@json($pregradoCategorias)` por variables dedicadas (`$pregradoCategoriasChatbot`).

**Opción B — Endpoint lazy:**
1. Crear ruta `GET /api/chatbot/menu` que devuelva JSON mínimo.
2. Cargar datos del chatbot solo al abrir el modal (click en contacto), no en cada page load.

**Requisitos:**
- Leer el script del chatbot en `principal.blade.php` (~líneas 832-1845) para identificar qué campos realmente necesita.
- Mantener funcionalidad del chatbot intacta.
- Reducir KB del HTML document.

**Archivos:**
- `resources/views/web/layouts/principal.blade.php`
- `app/Providers/AppServiceProvider.php` o nuevo `ChatbotDataComposer`
- Opcional: `routes/web.php` + método en `WebController`

---
