# Prompt — Fase 2: Cachear queries del menú

Copia todo el bloque de abajo en el chat de Cursor:

---

Optimiza el backend Laravel que ralentiza TODAS las páginas web.

**Problema:** En `@app/Providers/AppServiceProvider.php` se ejecutan 3 queries pesadas con eager loading profundo en cada request:

```php
Categoria::with([
    'hijos', 'carreras', 'carreras.detalle_descripcion',
    'carreras.perfilEgresado', 'carreras.docentes',
    'carreras.malla', 'carreras.preguntas'
])
```

Esto alimenta el menú del header y el chatbot vía `View::share()`.

**Implementar:**
1. Cachear `$pregrado`, `$pregradoPuede`, `$posgrado` y `$nivelAcademico` con `Cache::remember()` (TTL: 1 hora o configurable en `.env`).
2. Para el **menú del header** (`resources/views/web/layouts/header.blade.php`), cargar solo lo necesario: categorías + carreras con `id` y `nombre` (sin docentes, malla, preguntas, etc.).
3. Invalidar caché cuando se modifique una carrera/categoría desde el admin (observers o limpieza en controllers admin de `@app/Http/Controllers/admin/`).
4. No romper el chatbot; la fase 4 separará sus datos.

**Restricciones (obligatorias):**
- **Solo rendimiento:** mismos datos en menú y vistas; cero cambio visual.
- Cambio incremental; mantener compatibilidad con las vistas actuales.
- No recortar relaciones que alguna vista use en runtime (solo separar menú vs chatbot si hace falta).
- Usar driver de caché existente (`config/cache.php`).
- Documentar la key de caché y cómo invalidarla.
- Si el menú o una carrera se ve distinto → revertir.

**Archivos:**
- `app/Providers/AppServiceProvider.php`
- Controllers admin de Carrera/Categoria (invalidación)
- Opcional: `app/Observers/` si encaja con el proyecto

---
