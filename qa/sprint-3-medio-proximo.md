# 🟡 Sprint 3 — Medio Prioridad / Próximo Sprint
**Proyecto:** uprit-web (Laravel 12)  
**Carpeta raíz:** `c:\Users\USUARIO\Documents\GitHub\uprit-web`  
**Duración estimada:** 1 semana  
**Prerequisito:** Sprints 1 y 2 completados  
**Issues resueltos:** MED-05 · MED-06 · MED-07 · MED-08 · MED-09 · MED-10 · LOW-02 · LOW-03

---

## Contexto general

Este sprint consolida la postura de seguridad con mejoras de hardening, protección de datos personales (PII), resistencia anti-bot y resiliencia ante errores operacionales. No son vulnerabilidades de explotación inmediata, pero sí mejoras que reducen la superficie de ataque a largo plazo y aseguran cumplimiento con buenas prácticas y la Ley 29733.

---

## ✅ Tarea 1 — MED-05: Anti-spam robusto en el libro de reclamos (reCAPTCHA)

### Problema
El formulario público de reclamos tiene una protección anti-spam débil:
- **Honeypot** (`website`): un bot puede simplemente no enviar ese campo
- **Tiempo mínimo** (`form_started_at`): un bot puede manipular ese valor client-side

No hay ninguna verificación de bot real del lado del servidor.

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\web\WebController.php` — líneas 444–455
- La vista del formulario de reclamos (buscar en `resources/views/web/libro-reclamaciones.blade.php`)
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\.env`

### Opción A — Google reCAPTCHA v3 (invisible, recomendado para UX)

#### Paso 1.1 — Obtener claves de reCAPTCHA
1. Ir a https://www.google.com/recaptcha/admin/create
2. Seleccionar tipo **reCAPTCHA v3**
3. Añadir el dominio del sitio (ej: `uprit.edu.pe`)
4. Copiar **Site Key** (pública, va en el frontend) y **Secret Key** (privada, va en `.env`)

#### Paso 1.2 — Configurar `.env`
```env
RECAPTCHA_SITE_KEY=tu_site_key_aqui
RECAPTCHA_SECRET_KEY=tu_secret_key_aqui
```

#### Paso 1.3 — Agregar en la vista del formulario
En `resources/views/web/libro-reclamaciones.blade.php`, dentro del `<head>` o antes del `</body>`:
```html
<!-- reCAPTCHA v3 -->
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    document.getElementById('form-reclamo').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'reclamo'}).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
                form.submit();
            });
        });
    });
</script>
```

Añadir campo oculto dentro del `<form>`:
```html
<input type="hidden" id="g-recaptcha-response" name="g_recaptcha_response" value="">
```

#### Paso 1.4 — Verificar en el servidor en `WebController.php`

Añadir al inicio del archivo:
```php
use Illuminate\Support\Facades\Http;
```

En el método `storeReclamo()`, reemplazar el bloque de anti-spam (líneas 444–455):
```php
public function storeReclamo(Request $request)
{
    // ✅ NUEVO: Verificar reCAPTCHA v3
    $recaptchaToken = $request->input('g_recaptcha_response');
    if (empty($recaptchaToken)) {
        return back()->withErrors(['spam' => 'Verificación requerida.']);
    }

    $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret'   => config('services.recaptcha.secret'),
        'response' => $recaptchaToken,
        'remoteip' => $request->ip(),
    ]);

    $recaptchaData = $recaptchaResponse->json();

    // Score menor a 0.5 = probable bot (0.0 = bot, 1.0 = humano)
    if (!($recaptchaData['success'] ?? false) || ($recaptchaData['score'] ?? 0) < 0.5) {
        return back()->withErrors(['spam' => 'Se detectó actividad sospechosa. Intente nuevamente.']);
    }

    // Mantener honeypot como capa adicional
    if (!empty($request->website)) {
        abort(403, 'Spam detectado');
    }

    $request->validate([
        // ... validaciones existentes ...
    ]);
    // ... resto del método
}
```

Añadir en `config/services.php`:
```php
'recaptcha' => [
    'key'    => env('RECAPTCHA_SITE_KEY'),
    'secret' => env('RECAPTCHA_SECRET_KEY'),
],
```

### Criterios de aceptación Tarea 1
- [ ] El formulario de reclamos carga el script de reCAPTCHA en el navegador
- [ ] Intentar hacer POST directo sin token retorna error de validación
- [ ] Un envío legítimo del formulario se procesa sin errores

---

## ✅ Tarea 2 — MED-07: Paginación en getReclamos() para proteger PII

### Problema
El endpoint `GET /admin/get_reclamos` devuelve TODOS los reclamos en un solo JSON, exponiendo en una sola respuesta todos los datos personales (nombres, DNI, correo, teléfono, domicilio) de todos los reclamantes.

### Archivo afectado
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\ReclamoController.php` — líneas 17–20

### Pasos a ejecutar

#### Paso 2.1 — Aplicar paginación en el controlador

En `ReclamoController.php`:
```php
public function getReclamos(Request $request)
{
    $query = Reclamo::orderby('fecha', 'desc');

    // Filtros opcionales (mejoran UX y reducen exposición de datos)
    if ($request->filled('sede')) {
        $query->where('sede', $request->sede);
    }

    if ($request->filled('tipo')) {
        $query->where('tipo', $request->tipo);
    }

    if ($request->filled('fecha_desde')) {
        $query->whereDate('fecha', '>=', $request->fecha_desde);
    }

    if ($request->filled('fecha_hasta')) {
        $query->whereDate('fecha', '<=', $request->fecha_hasta);
    }

    // Paginar: máximo 50 registros por página
    $reclamos = $query->paginate(50);

    return response()->json($reclamos);
}
```

#### Paso 2.2 — Actualizar el frontend si usa el endpoint
Si hay código JavaScript que llama a `get_reclamos`, verificar que maneje la respuesta paginada de Laravel (que añade `data`, `current_page`, `last_page`, etc.):
```javascript
// Respuesta paginada de Laravel tiene estructura:
// { data: [...], current_page: 1, last_page: N, per_page: 50, total: N }
```

### Criterios de aceptación Tarea 2
- [ ] `GET /admin/get_reclamos` retorna máximo 50 registros
- [ ] La respuesta incluye metadatos de paginación (`current_page`, `total`, etc.)
- [ ] El panel admin muestra los reclamos correctamente con la nueva respuesta

---

## ✅ Tarea 3 — MED-06: Limitar exposición de datos de usuarios en endpoint de observaciones

### Problema
El endpoint `GET /admin/get_observaciones_meta` devuelve el listado completo de todos los administradores (nombre + email) en cada llamada. Esto es útil para asignar observaciones, pero expone un directorio completo de administradores.

### Archivo afectado
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\ObservacionController.php` — línea 47

### Pasos a ejecutar

```php
public function getMeta()
{
    return response()->json([
        'estados'    => Observacion::ESTADOS,
        'prioridades'=> Observacion::PRIORIDADES,
        'areas'      => Observacion::query()->distinct()->orderBy('area')->pluck('area'),
        'paginas'    => Observacion::query()->distinct()->orderBy('pagina')->pluck('pagina'),
        'carpetas'   => Observacion::query()->distinct()->orderBy('carpeta_origen')->pluck('carpeta_origen'),

        // ✅ CAMBIAR: exponer solo id y name (sin email)
        'usuarios'   => User::query()->orderBy('name')->get(['id', 'name']),

        'totales' => [
            // ... sin cambio
        ],
    ]);
}
```

> **Alternativa más estricta:** Separar el listado de usuarios en un endpoint aparte que solo se llame cuando el usuario abre el modal de asignación, en lugar de cargarlo siempre en el `getMeta`.

### Criterios de aceptación Tarea 3
- [ ] El endpoint ya no retorna `email` de los usuarios
- [ ] La funcionalidad de asignación de observaciones sigue funcionando

---

## ✅ Tarea 4 — MED-10: Implementar Soft Deletes en modelos críticos

### Problema
Las eliminaciones en `Reclamo`, `Noticia`, `Testimonio` y `Slider` son permanentes. Un error operacional o un atacante con acceso admin puede destruir datos de forma irrecuperable.

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Models\Reclamo.php`
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Models\Noticia.php`
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Models\Testimonio.php`
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Models\Slider.php`

### Paso 4.1 — Crear migración para agregar `deleted_at`
```bash
php artisan make:migration add_soft_deletes_to_critical_models
```

En el archivo generado en `database/migrations/`:
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reclamos', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('noticias', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('testimonios', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('reclamos', fn($t) => $t->dropSoftDeletes());
        Schema::table('noticias', fn($t) => $t->dropSoftDeletes());
        Schema::table('testimonios', fn($t) => $t->dropSoftDeletes());
        Schema::table('sliders', fn($t) => $t->dropSoftDeletes());
    }
};
```

Ejecutar:
```bash
php artisan migrate
```

### Paso 4.2 — Añadir SoftDeletes a los modelos

En cada modelo afectado:

```php
// Reclamo.php
use Illuminate\Database\Eloquent\SoftDeletes;

class Reclamo extends Model
{
    use SoftDeletes; // ✅ AGREGAR

    // ... resto sin cambio
}
```

Aplicar el mismo cambio en `Noticia.php`, `Testimonio.php` y `Slider.php`.

### Paso 4.3 — Verificar que los controladores no necesitan cambio
Con `SoftDeletes` activo, `$model->delete()` ya no elimina el registro físicamente sino que rellena `deleted_at`. Las queries normales con `Eloquent::all()` y `::get()` automáticamente excluyen los soft-deleted. No se requieren cambios en los controladores.

### Criterios de aceptación Tarea 4
- [ ] `php artisan migrate` ejecuta sin errores
- [ ] Tras `$reclamo->delete()`, el registro sigue en la BD con `deleted_at` != null
- [ ] `Reclamo::all()` NO retorna el registro eliminado
- [ ] `Reclamo::withTrashed()->find($id)` SÍ retorna el registro (recuperación posible)

---

## ✅ Tarea 5 — LOW-03: Implementar Security Headers HTTP

### Problema
La aplicación no envía headers de seguridad HTTP estándar, exponiendo a los usuarios a ataques de clickjacking, MIME sniffing y XSS.

### Archivos afectados
- Crear nuevo archivo: `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Middleware\SecurityHeaders.php`
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\bootstrap\app.php`

### Paso 5.1 — Crear el middleware

```bash
php artisan make:middleware SecurityHeaders
```

En `app/Http/Middleware/SecurityHeaders.php`:
```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Previene clickjacking
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Previene MIME sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Controla información del referrer
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Deshabilitar características peligrosas del navegador
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        // XSS Protection (para navegadores legacy)
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Content Security Policy básica (ajustar según los recursos externos usados)
        // IMPORTANTE: Verificar que no rompa scripts/estilos de terceros antes de activar
        // $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' https://www.google.com https://www.gstatic.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:;");

        return $response;
    }
}
```

> ⚠️ **Nota sobre CSP:** La directiva `Content-Security-Policy` está comentada porque requiere auditar todos los recursos externos (Google Fonts, YouTube embeds, CDNs, etc.) antes de activarla. Descomentar y ajustar gradualmente.

### Paso 5.2 — Registrar el middleware

En `bootstrap/app.php`, dentro del callback de `withMiddleware`:
```php
->withMiddleware(function (Middleware $middleware) {
    // ... middlewares existentes ...

    // ✅ AGREGAR al final:
    $middleware->append(\App\Http\Middleware\SecurityHeaders::class);
})
```

### Paso 5.3 — Verificar headers con herramienta externa
Tras el deploy:
1. Ir a https://securityheaders.com
2. Ingresar la URL del sitio
3. Objetivo: obtener calificación **B** o superior (A+ con CSP activado)

### Criterios de aceptación Tarea 5
- [ ] Las DevTools del navegador muestran `X-Frame-Options: SAMEORIGIN` en las respuestas
- [ ] `X-Content-Type-Options: nosniff` presente en todas las respuestas
- [ ] El sitio no se puede embeber en un `<iframe>` externo
- [ ] https://securityheaders.com retorna B o superior

---

## ✅ Tarea 6 — MED-08 + MED-09: Hardening de configuración de producción

### Problema
- No hay forzado de HTTPS a nivel de aplicación (si no se completó en Sprint 1)
- `LOG_LEVEL=debug` registra información sensible en los logs

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\.env`
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Providers\AppServiceProvider.php`
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\public\.htaccess`

### Paso 6.1 — Verificar variables de entorno de producción

Confirmar que `.env` en producción tenga:
```env
APP_ENV=production
APP_DEBUG=false
LOG_LEVEL=warning    # CAMBIAR de 'debug' a 'warning'
APP_URL=https://uprit.edu.pe  # URL con HTTPS
```

### Paso 6.2 — Forzar HTTPS en .htaccess (como capa adicional)

En `public\.htaccess`, añadir antes de `# Handle Angular Routes...` o `# Routes...`:
```apache
# Forzar HTTPS
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### Paso 6.3 — Proteger archivos de log de acceso externo

En `public\.htaccess`, asegurarse que los archivos de log no sean accesibles (Laravel los pone en `storage/`, no en `public/`, así que esto es preventivo):
```apache
# Bloquear acceso a archivos sensibles
<FilesMatch "\.(env|log|json|lock|yml|yaml|xml|sql|sh)$">
    Require all denied
</FilesMatch>
```

### Criterios de aceptación Tarea 6
- [ ] `http://dominio.com/` redirige automáticamente a `https://dominio.com/`
- [ ] El archivo `storage/logs/laravel.log` no contiene queries SQL ni datos de sesión
- [ ] Intentar acceder a `/.env` retorna 403 o 404

---

## ✅ Tarea 7 — LOW-02: Usar `$file->extension()` en lugar de `getClientOriginalExtension()`

> ⚠️ Esta tarea puede estar parcialmente resuelta si completaste la Tarea 1 del Sprint 2. Verificar y completar donde falte.

### Problema
`getClientOriginalExtension()` retorna la extensión que el cliente *dice* que tiene el archivo. `$file->extension()` detecta la extensión real basándose en el contenido del archivo (magic bytes / MIME).

### Verificación global
Ejecutar desde la raíz del proyecto:
```bash
grep -rn "getClientOriginalExtension" app/Http/Controllers/
```

Todos los resultados deben haber sido reemplazados por `$file->extension()` en el Sprint 2.

Si quedan ocurrencias, reemplazarlas:
```php
// ANTES:
$ext = $file->getClientOriginalExtension();

// DESPUÉS:
$ext = strtolower($file->extension()); // MIME-based, más seguro
```

### Criterios de aceptación Tarea 7
- [ ] `grep -rn "getClientOriginalExtension" app/` retorna 0 resultados

---

## 📋 Checklist final del Sprint 3

- [ ] MED-05: reCAPTCHA v3 integrado en el formulario de reclamos
- [ ] MED-05: Verificación server-side de token reCAPTCHA en `storeReclamo()`
- [ ] MED-07: `getReclamos()` paginado (máximo 50 por request)
- [ ] MED-06: Endpoint `getMeta` ya no expone emails de administradores
- [ ] MED-10: SoftDeletes en `Reclamo`, `Noticia`, `Testimonio`, `Slider`
- [ ] MED-10: Migración ejecutada: `php artisan migrate`
- [ ] LOW-03: Middleware `SecurityHeaders` creado y registrado
- [ ] LOW-03: https://securityheaders.com retorna B o superior
- [ ] MED-08: HTTPS forzado en `.htaccess`
- [ ] MED-09: `LOG_LEVEL=warning` en producción
- [ ] LOW-02: Cero ocurrencias de `getClientOriginalExtension` en el código

---

## 🏁 Estado post-Sprint 3

Al completar los 3 sprints, el proyecto habrá resuelto:

| Severidad | Total | Resueltos |
|-----------|-------|-----------|
| 🔴 Crítico | 3 | 3 |
| 🟠 Alto | 6 | 6 |
| 🟡 Medio | 11 | 10 |
| 🟢 Bajo | 4 | 2 |

### Pendientes post-Sprint 3 (menor prioridad):
- **MED-11:** Actualizar `.env.example` con política de passwords fuertes
- **LOW-01:** Ya resuelto en Sprint 1 (APP_ENV=production)
- **LOW-04:** Evaluar si se usa "remember me" y remover `remember_token` si no
- **CSP Header:** Auditar recursos externos y activar Content-Security-Policy completo

---

*Sprint 3 de 3 | Anterior: sprint-2-alta-esta-semana.md | Reporte origen: qa_security_report.md*
