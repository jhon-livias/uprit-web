# Prompt: revisar o ejecutar Observación #X

Copia este bloque en un **nuevo chat de Cursor** y reemplaza `#X` por el número real (ej. `#42`).

---

## Prompt (copiar desde aquí)

```
Revisa la observación #X del tablero UPRIT y dime si ya está hecha o si se puede implementar ahora.

### Contexto del proyecto
- Repo: uprit-web (Laravel + Blade + Vue en admin)
- Staging: https://staging.uprit.edu.pe
- Admin observaciones: https://staging.uprit.edu.pe/admin/observaciones
- CSS custom: public/web/assets/css/uprit-custom.css
- Layout web: resources/views/web/layouts/principal.blade.php
- NO editar header.blade.php ni footer.blade.php salvo que la observación lo exija explícitamente

### Paso 1 — Obtener la observación #X
Busca el registro con `id = X` en este orden:
1. `data/export/observaciones-import.json` (campo `observaciones`, buscar `"id": X`)
2. Si hace falta estado actual del equipo: tabla `observaciones` en BD local o comentarios en el admin

Extrae y muestra:
- id, titulo, descripcion, area, pagina, carpeta_origen, archivo_origen
- estado, prioridad, es_duplicado, duplicado_de
- asignado (si existe en BD)

Si `es_duplicado = true`, revisa también la observación principal (`duplicado_de`) y no dupliques trabajo.

### Paso 2 — Verificar si YA está hecha
Comprueba en el código y/o staging si el cambio pedido ya existe:

1. **Código**: busca en `resources/views/`, `routes/web.php`, `config/breadcrumbs.php`, controladores y CSS relacionados según `pagina` y `area`.
2. **Staging** (si puedes): abre la URL o sección afectada y valida visualmente/contenido.
3. **Duplicados**: confirma que no sea la misma tarea que otra observación ya resuelta.

Clasifica como:
- ✅ **Ya hecha** — el sitio/código ya cumple lo pedido
- 🟡 **Parcial** — hay avance pero falta algo concreto (lista qué falta)
- 🔴 **Pendiente** — no está implementado
- ⏸️ **No aplica / Bloqueada** — requiere contenido, decisión institucional, asset o dato que no está en el repo (explica por qué)

### Paso 3 — Si NO está hecha, ¿se puede hacer ahora?
Evalúa:
- ¿Hay copy/texto suficiente en la descripción?
- ¿Hay imagen/asset referenciado y existe en `public/web/imagenes/`?
- ¿Afecta solo frontend o también admin/BD?
- ¿Es cambio de contenido, diseño, navegación o lógica?
- ¿Rompe otras secciones ya entregadas?

Responde:
- **Sí, se puede hacer ahora** → propone archivos exactos a tocar y un plan de 3–5 pasos
- **No todavía** → qué falta (texto, foto, confirmación, otra área, etc.)

### Paso 4 — Si te pido implementarla
Solo implementa si yo lo confirmo en el mismo chat. Al terminar:
1. Haz el cambio mínimo necesario (sin refactors extra)
2. Indica archivos modificados
3. Cómo validar en staging
4. Sugiere nuevo estado para el tablero: `en_progreso` | `en_revision` | `hecho` | `rechazado`

### Formato de respuesta obligatorio

## Observación #X
**Título:** …
**Área / Página:** …
**Carpeta origen:** …
**Estado actual (tablero):** …

### Qué pide
(resumen en 1–3 líneas)

### Verificación
- Código: …
- Staging: …

### Conclusión
**Estado:** ✅ Ya hecha | 🟡 Parcial | 🔴 Pendiente | ⏸️ Bloqueada

**¿Se puede hacer ahora?** Sí / No — motivo breve

### Si procede implementar
- Archivos: …
- Pasos: …
- Riesgos: …
```

---

## Ejemplos de uso

### Solo revisar
> Revisa la observación **#12** del tablero UPRIT y dime si ya está hecha o si se puede implementar ahora.  
> (adjunta o referencia `@data/export/observaciones-import.json`)

### Revisar e implementar
> Revisa la observación **#12**. Si no está hecha y se puede hacer, impleméntala.

### Revisar varias
> Revisa las observaciones **#12, #45 y #78** y devuélveme una tabla con estado y si se pueden hacer.

---

## Referencia rápida — campos del JSON

| Campo | Uso |
|-------|-----|
| `id` | Número de tarjeta en el tablero |
| `titulo` / `descripcion` | Qué hay que hacer |
| `area` | Quién observó (ej. DCA, Investigación) |
| `pagina` | Sección afectada (Menú, Posgrado, Bienestar…) |
| `carpeta_origen` | Carpeta fuente en `data/` |
| `estado` | `pendiente` \| `en_progreso` \| `en_revision` \| `hecho` \| `rechazado` |
| `es_duplicado` | Si es copia de otra observación |
| `duplicado_de` | ID de la observación principal |

---

## Consulta rápida local (opcional)

```bash
# Ver observación #42 en terminal
python3 - <<'PY'
import json
from pathlib import Path
data = json.loads(Path("data/export/observaciones-import.json").read_text())
obs = next(o for o in data["observaciones"] if o["id"] == 42)
import pprint; pprint.pp(obs)
PY
```

---

## Notas para el agente
- Priorizar **staging** como referencia visual cuando la observación mencione URLs `staging.uprit.edu.pe`.
- Muchas observaciones de **Marietta (DCA)** son ortografía/contenido en fichas de carrera.
- **Investigación** suele tocar menú, textos de dirección y orden de equipo.
- **Bienestar/RSU** suele ser páginas ya construidas en `resources/views/web/partials/rsu/` y similares.
- No marcar como `hecho` sin verificar el criterio de la descripción, no solo el título.
