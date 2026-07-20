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

**Requisitos (obligatorios):**
- Leer el script del chatbot en `principal.blade.php` (~líneas 832-1845) para identificar qué campos realmente necesita.
- **Paridad funcional:** el chatbot debe mostrar las mismas respuestas y datos que antes; solo reducir peso del HTML.
- No eliminar campos hasta probar flujos: pregrado, posgrado, carrera concreta, volver atrás.
- Mantener funcionalidad del chatbot intacta.
- Reducir KB del HTML document.

**Archivos:**
- `resources/views/web/layouts/principal.blade.php`
- `app/Providers/AppServiceProvider.php` o nuevo `ChatbotDataComposer`
- Opcional: `routes/web.php` + método en `WebController`

---

## Resultado aplicado (Opción A)

| Componente | Cambio |
|------------|--------|
| `WebNavigationCache` | `buildChatbotByNivel()` + `mapCarreraForChatbot()` — arrays mínimos cacheados |
| `principal.blade.php` | Ya usa `$chatbotPregradoCategorias`, `$chatbotPregradoPuedeCategorias`, `$chatbotPosgradoCategorias` (Fase 2) |
| Menú header | Sigue con `$pregradoCategorias` / `$posgradoCategorias` ligeros (id/nombre) |

### Campos por carrera (solo los que usa `mostrarRespuesta()`)

- **General:** `id`, `nombre`, `admision`, `duracion`, `grado_obtenido`, `titulacion`, `modalidades`
- **Descripción:** `detalle_descripcion.descripcion`, `detalle_descripcion.oportunidades`
- **Perfil:** `perfil_egresado.descripcion`
- **Docentes:** `nombre`, `tags`, `correo`, `departamento` (sin `imagen`, `linkedin`, etc.)
- **Malla:** `ciclo`, `descripcion`, `cursos`
- **Preguntas:** `pregunta`, `respuesta`

### Peso JSON embebido (medido en dev)

| Dataset | Antes (Eloquent completo, pregrado) | Después (mínimo) |
|---------|-------------------------------------|------------------|
| Pregrado | ~279 KB | ~166 KB (−41%) |
| **Total 3 datasets** | ~800+ KB estimado | **~501 KB** |

Invalidar caché tras deploy o al editar carreras: `WebNavigationCache::forget()` (ya en controllers admin).

**Verificación manual:** flujos pregrado → buscar carrera → Información General / Descripción / Malla / Docentes; posgrado con subcategorías; volver atrás.

---
