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

**Restricciones:**
- No cambiar diseño visual.
- Solo tocar home; otras rutas que usan noticias quedan igual.

**Archivos:**
- `app/Http/Controllers/web/WebController.php`
- `resources/views/web/index.blade.php`

---
