# Prompt — Fase 3: Limitar noticias en home

Copia todo el bloque de abajo en el chat de Cursor:

---

Optimiza la carga de la página de inicio (`/`).

**Problema:** En `@app/Http/Controllers/web/WebController.php` método `index()`:

```php
$noticias = Noticia::orderBy('fecha', 'desc')->get(); // trae TODAS
```

La vista `@resources/views/web/index.blade.php` solo muestra la primera noticia grande + las demás en lista lateral, pero carga imágenes de todas.

**Implementar:**
1. Cambiar a `Noticia::with('categoriaNoticia')->orderBy('fecha', 'desc')->limit(6)->get()` (o el mínimo que use la vista).
2. Revisar `@resources/views/web/index.blade.php` y ajustar el loop para no asumir colección infinita.
3. Añadir `loading="lazy"` a imágenes de noticias below-the-fold.
4. Eager load `categoriaNoticia` para evitar N+1.

**Restricciones (obligatorias):**
- **No cambiar diseño visual ni cantidad de noticias visibles** en home.
- Contar en `index.blade.php` cuántas noticias muestra la vista (destacada + lateral) y usar ese número exacto en `limit()`, no menos.
- Mismas imágenes, mismos textos, mismo orden; solo menos queries y lazy en imágenes claramente below-the-fold.
- Solo tocar home; otras rutas que usan noticias quedan igual.

**Archivos:**
- `app/Http/Controllers/web/WebController.php`
- `resources/views/web/index.blade.php`

---

## Resultado aplicado

| Cambio | Detalle |
|--------|---------|
| Query home | `with('categoriaNoticia')->limit(6)->get()` — 1 destacada + hasta 5 laterales |
| Vista | `$noticiasLaterales = $noticias->skip(1)` sobre colección ya acotada; `@if($noticias->isNotEmpty())` |
| Lazy load | Solo imágenes del listado lateral (`loading="lazy" decoding="async"`) |
| Otras rutas | Sin cambios (`noticias()`, `detalle`, etc.) |

**Conteo en vista:** 1 `$principal` + `$noticias->skip(1)` → máximo **6** noticias visibles (mismo layout del tema `blog-area-3`).

---
