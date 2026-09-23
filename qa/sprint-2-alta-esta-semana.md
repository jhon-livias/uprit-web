# 🟠 Sprint 2 — Alta Prioridad / Esta Semana
**Proyecto:** uprit-web (Laravel 12)  
**Carpeta raíz:** `c:\Users\USUARIO\Documents\GitHub\uprit-web`  
**Duración estimada:** 3–5 días  
**Prerequisito:** Sprint 1 completado  
**Issues resueltos:** HIGH-01 · HIGH-02 · HIGH-05 · HIGH-06 · MED-01 · MED-02 · MED-03 · MED-04

---

## Contexto general

Este sprint atiende los huecos de validación de entrada y subida de archivos en el panel de administración. Son vulnerabilidades de severidad ALTA que, si bien requieren acceso de administrador para ser explotadas directamente, representan un riesgo severo en caso de que una cuenta admin sea comprometida. También se refuerzan la configuración de sesiones y tokens.

---

## ✅ Tarea 1 — HIGH-01 + HIGH-02 + MED-04: Validación MIME y nombres seguros en subida de archivos

### Problema global
Múltiples controladores aceptan archivos sin validar el tipo MIME real, usando la extensión informada por el cliente (`getClientOriginalExtension()`) y nombres predecibles (`time() . rand(1,200)`).

**Riesgo:**
- Subida de archivos `.php` disfrazados como `.jpg` → Remote Code Execution
- Path Traversal via `getClientOriginalName()` en DocenteController
- Enumeración de URLs de archivos subidos

### Archivos afectados

| Controlador | Método(s) | Líneas |
|---|---|---|
| `NoticiaController.php` | `store()`, `update()` | 41–55, 73–100 |
| `SliderController.php` | `store()`, `update()`, `storeCarrera()`, `updateCarrera()` | 35–91, 131–166 |
| `TestimonioController.php` | `store()`, `update()` | ~30–65 |
| `DocenteController.php` | `savePublicUpload()` | 154–180 |
| `TransparenciaController.php` | `saveUpload()` | 116–125 |

### Cambio universal a aplicar

**Regla de oro para todos los uploads:**
```php
// PATRÓN SEGURO — aplicar en TODOS los métodos de subida:
private function savePublicUpload(Request $request, string $field, string $directory, string $prefix, ?string $oldFilename = null): ?string
{
    if (!$request->hasFile($field)) {
        return null;
    }

    $file = $request->file($field);

    if (!$file->isValid()) {
        return null;
    }

    $path = public_path($directory);
    File::ensureDirectoryExists($path, 0775);

    if ($oldFilename) {
        $oldFilePath = $path . DIRECTORY_SEPARATOR . $oldFilename;
        if (is_file($oldFilePath)) {
            unlink($oldFilePath);
        }
    }

    // ✅ SEGURO: extensión detectada por MIME real (magic bytes), no por el cliente
    $ext = strtolower($file->extension());

    // ✅ SEGURO: nombre completamente aleatorio e impredecible
    $filename = $prefix . '_' . bin2hex(random_bytes(16)) . '.' . $ext;

    $file->move($path, $filename);

    return $filename;
}
```

### Paso 1.1 — NoticiaController.php

Archivo: `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\NoticiaController.php`

Añadir validación al inicio de `store()` y `update()`:
```php
public function store(Request $request)
{
    // ✅ AGREGAR validación al inicio del método:
    $request->validate([
        'categoria_noticia_id' => 'required|exists:categoria_noticias,id',
        'titulo'              => 'required|string|max:255',
        'fecha'               => 'required|date',
        'descripcion_corta'   => 'nullable|string|max:500',
        'autor_nombre'        => 'nullable|string|max:150',
        'autor_descripcion'   => 'nullable|string|max:500',
        'descripcion_total'   => 'nullable|string',
        'imagen'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'autor_imagen'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $noticia = new Noticia();
    // ... resto igual

    // ✅ CAMBIAR en el bloque de imagen:
    // ANTES:
    // $nameimg = 'noticia_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
    // DESPUÉS:
    $ext = strtolower($file->extension());
    $nameimg = 'noticia_' . bin2hex(random_bytes(16)) . '.' . $ext;
}
```

Aplicar el mismo patrón en `update()` (mismas reglas de validación + mismo cambio de nombre).

### Paso 1.2 — SliderController.php

Archivo: `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\SliderController.php`

Añadir al inicio de `store()` y `update()`:
```php
$request->validate([
    'titulo_superior'  => 'nullable|string|max:255',
    'titulo_principal' => 'nullable|string|max:255',
    'descripcion'      => 'nullable|string|max:500',
    'enlace_boton'     => 'nullable|url|max:500',
    'orden'            => 'nullable|integer|min:0|max:999',
    'video'            => 'nullable|file|mimes:mp4,webm,ogg|max:204800',  // 200 MB max
    'imagen'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
]);
```

Reemplazar en todos los bloques de subida:
```php
// ANTES:
$namevideo = 'video_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
$nameimg = 'slider_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();

// DESPUÉS:
$ext = strtolower($file->extension());
$namevideo = 'video_' . bin2hex(random_bytes(16)) . '.' . $ext;
$nameimg = 'slider_' . bin2hex(random_bytes(16)) . '.' . $ext;
```

### Paso 1.3 — TestimonioController.php

Archivo: `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\TestimonioController.php`

Añadir al inicio de `store()` y `update()`:
```php
$request->validate([
    'nombre'      => 'required|string|max:150',
    'cargo'       => 'nullable|string|max:150',
    'descripcion' => 'nullable|string|max:1000',
    'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
]);
```

Reemplazar nombre de archivo:
```php
// ANTES:
$nameimg = 'testimonio_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();

// DESPUÉS:
$ext = strtolower($file->extension());
$nameimg = 'testimonio_' . bin2hex(random_bytes(16)) . '.' . $ext;
```

### Paso 1.4 — DocenteController.php (HIGH-02: Path Traversal)

Archivo: `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\DocenteController.php`

En el método privado `savePublicUpload()` (línea 176), reemplazar:
```php
// ANTES (vulnerable — usa nombre del cliente):
$filename = time() . '_' . $file->getClientOriginalName();
$file->move($path, $filename);

// DESPUÉS (seguro):
$ext = strtolower($file->extension()); // MIME real
$filename = bin2hex(random_bytes(16)) . '.' . $ext;
$file->move($path, $filename);
```

En `store()` y `update()`, verificar que la validación de `imagen` tenga la regla `image`:
```php
$request->validate([
    // ... resto de validaciones ya existentes ...
    'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // asegurar que 'image' rule esté
]);
```

### Criterios de aceptación Tarea 1
- [ ] Intentar subir un archivo `.php` renombrado como `.jpg` retorna error de validación HTTP 422
- [ ] Los nombres de archivos subidos son hexadecimales aleatorios (ej: `noticia_a3f9b2...jpg`)
- [ ] `php artisan route:list` muestra las rutas sin errores
- [ ] No se rompe ninguna funcionalidad del admin panel tras los cambios

---

## ✅ Tarea 2 — HIGH-05 + HIGH-06: Validación de input en CarreraController y TransparenciaController

### Problema
`CarreraController` y `TransparenciaController` asignan datos directamente del request al modelo sin ninguna validación, permitiendo inyectar datos nulos, extremadamente largos o de tipo incorrecto.

### Paso 2.1 — CarreraController.php

Archivo: `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\CarreraController.php`

Añadir al inicio de `store()` (antes de la asignación a `$carrera`):
```php
public function store(Request $request)
{
    // ✅ AGREGAR validación:
    $request->validate([
        'categoria_id'   => 'required|integer|exists:categorias,id',
        'nombre'         => 'required|string|max:255',
        'descripcion'    => 'nullable|string',
        'admision'       => 'nullable|string|max:255',
        'duracion'       => 'nullable|string|max:100',
        'grado_obtenido' => 'nullable|string|max:255',
        'titulacion'     => 'nullable|string|max:255',
        'modalidades'    => 'nullable|string',
        'visible_in_nav' => 'nullable|boolean',
        'brochure'       => 'nullable|file|mimes:pdf|max:' . self::BROCHURE_MAX_KB,
        'imagen'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'imagen_banner'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $carrera = new Carrera();
    // ... resto igual
}
```

Aplicar el mismo patrón en `update()`:
```php
public function update(Request $request)
{
    // ✅ AGREGAR validación:
    $request->validate([
        'id'             => 'required|integer|exists:carreras,id',
        'categoria_id'   => 'required|integer|exists:categorias,id',
        'nombre'         => 'required|string|max:255',
        'descripcion'    => 'nullable|string',
        'admision'       => 'nullable|string|max:255',
        'duracion'       => 'nullable|string|max:100',
        'grado_obtenido' => 'nullable|string|max:255',
        'titulacion'     => 'nullable|string|max:255',
        'modalidades'    => 'nullable|string',
        'visible_in_nav' => 'nullable|boolean',
        'brochure'       => 'nullable|file|mimes:pdf|max:' . self::BROCHURE_MAX_KB,
        'imagen'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'imagen_banner'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $carrera = Carrera::find($request->id);
    // ... resto igual
}
```

### Paso 2.2 — TransparenciaController.php

Archivo: `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\TransparenciaController.php`

Añadir validación a los 6 métodos:

```php
public function storeSeccion(Request $request)
{
    // ✅ AGREGAR:
    $request->validate([
        'titulo'             => 'required|string|max:255',
        'subtitulo'          => 'nullable|string|max:500',
        'icono'              => 'nullable|string|max:100',
        'orden'              => 'nullable|integer|min:0|max:999',
        'abierta_por_defecto'=> 'nullable|boolean',
    ]);

    $seccion = new TransparenciaSeccion();
    // ... resto igual
}

public function updateSeccion(Request $request)
{
    // ✅ AGREGAR:
    $request->validate([
        'id'                 => 'required|integer|exists:transparencia_secciones,id',
        'titulo'             => 'required|string|max:255',
        'subtitulo'          => 'nullable|string|max:500',
        'icono'              => 'nullable|string|max:100',
        'orden'              => 'nullable|integer|min:0|max:999',
        'abierta_por_defecto'=> 'nullable|boolean',
    ]);

    $seccion = TransparenciaSeccion::findOrFail($request->id);
    // ... resto igual
}

public function storeDocumento(Request $request)
{
    // ✅ AGREGAR:
    $request->validate([
        'seccion_id' => 'required|integer|exists:transparencia_secciones,id',
        'etiqueta'   => 'required|string|max:255',
        'url'        => 'nullable|url|max:500',
        'orden'      => 'nullable|integer|min:0|max:999',
        'archivo'    => 'nullable|file|mimes:pdf|max:20480', // 20 MB max
    ]);

    // ... resto igual
}

public function updateDocumento(Request $request)
{
    // ✅ AGREGAR:
    $request->validate([
        'id'       => 'required|integer|exists:transparencia_documentos,id',
        'etiqueta' => 'required|string|max:255',
        'url'      => 'nullable|url|max:500',
        'orden'    => 'nullable|integer|min:0|max:999',
        'archivo'  => 'nullable|file|mimes:pdf|max:20480',
    ]);

    // ... resto igual
}
```

### Criterios de aceptación Tarea 2
- [ ] `POST /admin/carreras/store` sin `nombre` retorna HTTP 422 con mensaje de error
- [ ] `POST /admin/carreras/store` con `categoria_id` inexistente retorna HTTP 422
- [ ] `POST /admin/transparencia/seccion/store` sin `titulo` retorna HTTP 422
- [ ] El admin panel sigue funcionando correctamente con datos válidos

---

## ✅ Tarea 3 — MED-01: Configurar expiración de tokens Sanctum

### Problema
Los tokens de API generados en cada login nunca expiran (`'expiration' => null`). Si un token es robado (XSS, man-in-the-middle, leak), el atacante mantiene acceso indefinidamente.

### Archivo afectado
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\config\sanctum.php` — línea 53

### Pasos a ejecutar

En `config\sanctum.php`, modificar línea 53:
```php
// ANTES:
'expiration' => null,

// DESPUÉS:
'expiration' => 120, // 120 minutos = igual que SESSION_LIFETIME
```

Limpiar caché:
```bash
php artisan config:clear
php artisan config:cache
```

> **Nota:** Al activar expiración, los tokens existentes de usuarios actualmente logueados expirarán. Deberán volver a hacer login. Considera comunicar esto antes de hacer deploy.

### Criterios de aceptación
- [ ] `config('sanctum.expiration')` retorna `120`
- [ ] Un token generado hace más de 2 horas ya no permite acceso al panel admin
- [ ] El login genera un nuevo token fresco correctamente

---

## ✅ Tarea 4 — MED-02 + MED-03: Sesiones cifradas y cookie Secure

### Problema
- Las sesiones se almacenan sin cifrado en la BD (`SESSION_ENCRYPT=false`)
- La cookie de sesión no tiene el flag `Secure`, pudiendo transmitirse por HTTP

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\.env` — líneas 32–34

### Pasos a ejecutar

En `.env`, actualizar:
```env
# ANTES:
SESSION_ENCRYPT=false
SESSION_DOMAIN=null

# DESPUÉS:
SESSION_ENCRYPT=true
SESSION_SECURE_COOKIE=true    # Solo activar si el sitio usa HTTPS (requerido por Sprint 1 Tarea 2)
SESSION_SAME_SITE=strict      # Cambiar de 'lax' a 'strict' para máxima protección CSRF
```

Limpiar sesiones existentes (usuarios deberán re-loguear):
```bash
php artisan session:table  # no necesario, la tabla ya existe
php artisan config:clear
php artisan cache:clear
```

> ⚠️ `SESSION_SECURE_COOKIE=true` requiere que el servidor tenga HTTPS activo. Activarlo sin HTTPS impedirá que las cookies se envíen y los usuarios no podrán loguearse.

### Criterios de aceptación
- [ ] La cookie de sesión tiene el flag `Secure` en las DevTools del navegador
- [ ] La cookie de sesión tiene `SameSite=Strict`
- [ ] El login funciona correctamente tras el cambio
- [ ] Los datos de sesión en la tabla `sessions` son ininteligibles (cifrados)

---

## 📋 Checklist final del Sprint 2

- [ ] HIGH-01: Todos los uploads tienen `$request->validate(['campo' => 'image|mimes:...'])` y `$file->extension()`
- [ ] HIGH-02: `getClientOriginalName()` eliminado de DocenteController, reemplazado por `bin2hex(random_bytes(16))`
- [ ] HIGH-05: `CarreraController::store()` y `update()` tienen validación completa
- [ ] HIGH-06: Los 4 métodos de `TransparenciaController` tienen validación
- [ ] MED-01: `sanctum.php` tiene `'expiration' => 120`
- [ ] MED-02: `.env` tiene `SESSION_ENCRYPT=true`
- [ ] MED-03: `.env` tiene `SESSION_SECURE_COOKIE=true` (tras confirmar HTTPS activo)
- [ ] MED-04: Todos los nombres de archivo usan `bin2hex(random_bytes(16))`
- [ ] Prueba de regresión: el panel admin funciona con datos válidos sin errores

---

*Sprint 2 de 3 | Anterior: sprint-1-critico-inmediato.md | Siguiente: sprint-3-medio-proximo.md*
