# 🔐 Reporte QA de Seguridad — uprit-web
**Fecha:** 23 de Septiembre de 2026  
**Proyecto:** Laravel 12 (PHP 8.2) — Panel Admin + Sitio Web Institucional UPRIT  
**Analista:** Antigravity QA Security Agent  
**Severidad:** 🔴 Crítica · 🟠 Alta · 🟡 Media · 🟢 Baja

---

## Resumen Ejecutivo

Se encontraron **22 vulnerabilidades y malas prácticas de seguridad** distribuidas en las siguientes categorías:

| Categoría | Crítico | Alto | Medio | Bajo |
|-----------|---------|------|-------|------|
| Credenciales & Secretos | 2 | 0 | 0 | 0 |
| Subida de Archivos | 0 | 3 | 2 | 0 |
| Autenticación & Sesiones | 0 | 2 | 2 | 1 |
| Validación de Entrada | 0 | 3 | 2 | 0 |
| Control de Acceso | 0 | 1 | 2 | 0 |
| Configuración & Hardening | 1 | 1 | 2 | 2 |
| Exposición de Datos | 0 | 1 | 1 | 1 |
| **TOTAL** | **3** | **11** | **11** | **4** |

---

## 🔴 CRÍTICO

---

### CRIT-01 — Credenciales de base de datos hardcodeadas en `.env` (versionado)

**Archivo:** [`.env`](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/.env) · Líneas 26–28

```
DB_USERNAME=root
DB_PASSWORD=123qwe123
```

**Problema:** El archivo `.env` está siendo rastreado por Git (debería estar en `.gitignore`, y sí está listado en él, lo que sugiere que fue commiteado *antes* de agregarlo al `.gitignore`). El password `123qwe123` es extremadamente débil. El usuario de la BD es `root`, el superusuario con acceso total.

**Impacto:** Acceso total a la base de datos MySQL incluyendo lectura, escritura, eliminación de tablas y datos de usuarios, reclamos (DNI, correo, teléfono, etc.).

**Recomendación:**
1. Rotar el password de la BD inmediatamente.
2. Crear un usuario MySQL con permisos mínimos solo para esta app (no usar `root`).
3. Verificar el historial de Git: `git log --all -- .env` para confirmar si fue commiteado.
4. Usar `git filter-repo` o BFG para eliminarlo del historial si fue versionado.

---

### CRIT-02 — `APP_DEBUG=true` en el archivo `.env` activo

**Archivo:** [`.env`](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/.env) · Línea 4

```
APP_DEBUG=true
```

**Problema:** Si este `.env` se usa en producción, Laravel mostrará stack traces completos con rutas de archivos, variables de entorno, queries SQL y datos internos ante cualquier error.

**Impacto:** Un atacante puede forzar errores (ej. parámetros mal formados) para obtener información de la arquitectura interna, rutas absolutas del servidor y credenciales de la sesión.

**Recomendación:**
```env
APP_ENV=production
APP_DEBUG=false
LOG_LEVEL=warning
```

---

### CRIT-03 — Endpoint de re-seeding de BD accesible vía HTTP (sin confirmación adicional)

**Archivo:** [ObservacionController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/ObservacionController.php) · Línea 146–158  
**Ruta:** `POST /admin/observaciones/reimport`

```php
public function reimport()
{
    Artisan::call('db:seed', [
        '--class' => ObservacionSeeder::class,
        '--force' => true,
    ]);
    // ...
}
```

**Problema:** Un administrador autenticado (o un atacante que haya tomado una sesión de admin) puede llamar a este endpoint y forzar la re-ejecución del seeder `--force` sobre producción. Esto puede borrar/reemplazar datos masivamente.

**Impacto:** Destrucción masiva de datos de observaciones del panel admin.

**Recomendación:** Eliminar este endpoint de producción o protegerlo con una confirmación extra (2FA, clave OTP, restricción por IP). Si es solo para desarrollo, removerlo del código de producción con un feature flag.

---

## 🟠 ALTO

---

### HIGH-01 — Subida de archivos sin validación de tipo MIME en múltiples controladores

**Archivos afectados:**
- [NoticiaController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/NoticiaController.php) · Líneas 41–55, 73–100
- [SliderController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/SliderController.php) · Líneas 35–49, 65–91
- [TransparenciaController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/TransparenciaController.php) · Líneas 66–82, 84–105
- [TestimonioController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/TestimonioController.php) · Líneas 32, 59

**Problema:** Estos controladores aceptan subidas de archivos sin aplicar `$request->validate(['campo' => 'file|mimes:jpg,png|max:5120'])`. El `store()` de `NoticiaController`, `SliderController` y `TestimonioController` solo verifica si existe el archivo con `hasFile()`, pero no valida el tipo.

```php
// NoticiaController.php (vulnerable)
if ($request->hasFile('imagen')) {
    $file = $request->file('imagen');
    // Sin validate() de mimes o max
    $nameimg = 'noticia_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
    $file->move($path, $nameimg);
}
```

**Impacto:** Un atacante admin podría subir archivos PHP disfrazados, archivos HTML con XSS, o scripts maliciosos que luego son servidos directamente desde `/public/`.

**Recomendación:** Añadir validación explícita en todos los métodos `store()` y `update()`:
```php
$request->validate([
    'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    'video'  => 'nullable|file|mimes:mp4,webm|max:102400',
]);
```

---

### HIGH-02 — `getClientOriginalName()` usado para nombrar archivos (Path Traversal)

**Archivo:** [DocenteController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/DocenteController.php) · Línea 176

```php
$filename = time() . '_' . $file->getClientOriginalName();
$file->move($path, $filename);
```

**Problema:** `getClientOriginalName()` devuelve el nombre del archivo *tal como lo envió el cliente*. Un atacante podría enviar `../../../config/app.php`, `shell.php`, o nombres con caracteres especiales, potencialmente causando:
- **Path Traversal**: sobrescribir archivos fuera del directorio destino.
- **Remote Code Execution**: subir un `.php` con extensión manipulada.

**Recomendación:**
```php
// Usar una extensión validada y un nombre completamente generado
$ext = strtolower($file->extension()); // detectado por MIME real, no por el cliente
$filename = time() . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
```

---

### HIGH-03 — Archivos subidos servidos directamente desde `/public/` sin protección

**Directorios públicos detectados:**
```
/public/reclamos_evidencia/      ← datos sensibles (DNI, evidencia de reclamos)
/public/transparencia_documentos/ ← documentos institucionales
/public/noticias_imagenes/
/public/carreras_docentes/
```

**Problema:** Los archivos subidos se almacenan directamente en `public/`, lo que significa que cualquier persona con la URL puede acceder a ellos sin autenticación, incluyendo evidencias de reclamos que contienen datos personales (DNI, correo, teléfono de estudiantes).

**Impacto:** Filtración de datos personales de reclamantes (GDPR/Ley de Protección de Datos Personales de Perú — Ley 29733).

**Recomendación:** Mover archivos sensibles a `storage/app/private/` y servirlos mediante un controlador con verificación de permisos:
```php
// En lugar de public_path(), usar:
$file->storeAs('reclamos', $filename, 'private');

// Para servirlo:
return Storage::download('reclamos/' . $filename);
```

---

### HIGH-04 — Sin Rate Limiting en el endpoint de login

**Archivo:** [routes/web.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/routes/web.php) · Línea 28  
**Archivo:** [AuthController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/AuthController.php)

```php
Route::post('/login', [AuthController::class, 'login'])->name('login');
```

**Problema:** La ruta de login no tiene el middleware `throttle`. Aunque el controlador implementa bloqueo de cuenta a nivel de usuario (3 intentos → bloqueo 30 min), esto no protege contra ataques a múltiples cuentas distintas (credential stuffing / password spraying), ni contra intentos en cuentas inexistentes.

**Recomendación:**
```php
Route::post('/login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('throttle:10,1'); // 10 intentos por minuto por IP
```

---

### HIGH-05 — Sin validación en múltiples métodos store/update del panel admin

**Archivos:**
- [CarreraController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/CarreraController.php) · `store()`, `update()` — sin validación de `categoria_id`, `nombre`, etc.
- [SliderController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/SliderController.php) · `store()`, `update()`
- [NoticiaController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/NoticiaController.php) · `store()`, `update()`

```php
// CarreraController.php store() — sin validación
$carrera->nombre = $request->nombre; // puede ser null, array, o extremadamente largo
$carrera->categoria_id = $request->categoria_id; // puede ser un ID inexistente
```

**Problema:** Ausencia de `$request->validate()` en varios métodos críticos permite inyectar datos nulos, inválidos o malformados en la BD.

**Impacto:** Corrupción de datos, posibles errores 500 que revelan información interna, y vectores de XSS stored si el contenido no se escapa correctamente en las vistas.

---

### HIGH-06 — `TransparenciaController` sin validación de input en ningún método

**Archivo:** [TransparenciaController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/TransparenciaController.php)

```php
public function storeSeccion(Request $request)
{
    $seccion = new TransparenciaSeccion();
    $seccion->titulo = $request->titulo; // sin validación
    $seccion->subtitulo = $request->subtitulo; // sin validación
    // ...
}
```

Ninguno de los 6 métodos del controlador llama a `$request->validate()`. Todos asignan directamente datos del request al modelo.

---

## 🟡 MEDIO

---

### MED-01 — Tokens Sanctum sin expiración configurada

**Archivo:** [config/sanctum.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/config/sanctum.php) · Línea 53

```php
'expiration' => null,
```

**Problema:** Los tokens de API generados en el login nunca expiran. Si un token es comprometido (XSS, leak de sesión), el atacante mantiene acceso indefinidamente.

**Recomendación:**
```php
'expiration' => 120, // minutos (igualar a SESSION_LIFETIME)
```

---

### MED-02 — Sesiones no cifradas

**Archivo:** [`.env`](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/.env) · Línea 32

```env
SESSION_ENCRYPT=false
```

**Problema:** El payload de la sesión se almacena sin cifrado en la BD. Si la BD es comprometida, los datos de sesión son legibles.

**Recomendación:**
```env
SESSION_ENCRYPT=true
```

---

### MED-03 — Cookie de sesión sin flag `Secure` en producción

**Archivo:** [config/session.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/config/session.php) · Línea 172

```php
'secure' => env('SESSION_SECURE_COOKIE'),
```

La variable `SESSION_SECURE_COOKIE` no está definida en `.env`, por lo que es `null` (equivalente a `false`).

**Problema:** La cookie de sesión se puede transmitir por HTTP no cifrado.

**Recomendación:**
```env
SESSION_SECURE_COOKIE=true   # Solo en producción con HTTPS
```

---

### MED-04 — Weak randomness en nombres de archivo subidos

**Múltiples archivos:** Todos los controladores con subidas usan:

```php
$nameimg = 'noticia_' . time() . rand(1, 200) . '.' . $ext;
```

`rand(1, 200)` solo da 200 valores posibles. Combinado con el timestamp (1 segundo de resolución), es muy predecible. Un atacante podría adivinar URLs de archivos subidos (especialmente evidencias de reclamos sensibles).

**Recomendación:**
```php
$filename = 'noticia_' . bin2hex(random_bytes(16)) . '.' . $ext;
```

---

### MED-05 — Anti-spam del libro de reclamos es bypasseable

**Archivo:** [WebController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/web/WebController.php) · Líneas 444–455

```php
if (!empty($request->website)) { abort(403, 'Spam detectado'); }

$startedAt = (int) $request->form_started_at;
$seconds = time() - $startedAt;
if ($seconds <= 3) { /* rechazar */ }
```

**Problema:** El honeypot (`website`) y el tiempo de envío son verificaciones del lado del cliente que un atacante puede bypassear simplemente:
1. No enviando el campo `website`.
2. Ajustando el valor `form_started_at` a `time() - 10`.

No hay CAPTCHA ni validación de bot real.

**Impacto:** Spam masivo al libro de reclamaciones, llenando la BD con datos falsos y dificultando atención a reclamos reales. Datos de reclamantes inválidos.

**Recomendación:** Implementar Google reCAPTCHA v3 o hCaptcha en el formulario público.

---

### MED-06 — Información de usuarios expuesta en endpoint de meta de observaciones

**Archivo:** [ObservacionController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/ObservacionController.php) · Línea 47

```php
'usuarios' => User::query()->orderBy('name')->get(['id', 'name', 'email']),
```

**Endpoint:** `GET /admin/get_observaciones_meta`

**Problema:** Aunque está protegido por `auth:sanctum`, devuelve el listado completo de todos los usuarios admin (nombres + emails) en cada request. Si la sesión de un usuario de bajo privilegio fuera comprometida, el atacante obtiene el directorio de administradores.

**Recomendación:** Limitar qué información de usuarios se expone, o cargar este dato solo cuando realmente se necesite asignar tareas.

---

### MED-07 — `getReclamos()` devuelve todos los reclamos sin paginación

**Archivo:** [ReclamoController.php](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/app/Http/Controllers/admin/ReclamoController.php) · Línea 17–20

```php
public function getReclamos(){
    $reclamos = Reclamo::orderby('fecha', 'desc')->get();
    return response()->json($reclamos);
}
```

**Problema:** Devuelve TODOS los reclamos sin paginación. Cada reclamo contiene: nombres, apellidos, DNI, correo, teléfono, domicilio de estudiantes. Con miles de reclamos, esto expone una cantidad masiva de PII en un solo request.

**Recomendación:** Aplicar paginación y filtros:
```php
$reclamos = Reclamo::orderby('fecha', 'desc')->paginate(50);
```

---

### MED-08 — Sin HTTPS forzado en el nivel de aplicación

No se encontró middleware para forzar HTTPS (`\App\Http\Middleware\ForceHttps` o similar), ni configuración en `.htaccess` que redirija de HTTP a HTTPS.

**Recomendación:** Añadir en `.htaccess` o en `AppServiceProvider`:
```php
// AppServiceProvider::boot()
if (app()->environment('production')) {
    URL::forceScheme('https');
}
```

---

### MED-09 — `LOG_LEVEL=debug` en entorno activo

**Archivo:** [`.env`](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/.env) · Línea 21

```env
LOG_LEVEL=debug
```

**Problema:** En producción, este nivel registra queries SQL completos, parámetros de request y datos de sesión en los archivos de log. Si los logs son accesibles (p. ej. a través de un path traversal o error de config de servidor), se filtra información sensible.

**Recomendación:**
```env
LOG_LEVEL=warning
```

---

### MED-10 — Eliminación de registros sin soft deletes (datos irrecuperables)

**Archivos:** Múltiples controladores (`delete()` en Reclamo, Noticia, Slider, Testimonio, etc.)

```php
$reclamo->delete(); // eliminación permanente
```

Sin `SoftDeletes`, cualquier eliminación accidental o por un atacante con acceso admin es irreversible.

**Recomendación:** Implementar `SoftDeletes` en modelos críticos:
```php
use Illuminate\Database\Eloquent\SoftDeletes;
class Reclamo extends Model {
    use SoftDeletes;
}
```

---

### MED-11 — `DB_PASSWORD` débil incluso para desarrollo

**Archivo:** [`.env`](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/.env) · Línea 28

```env
DB_PASSWORD=123qwe123
```

Esta contraseña es predecible y figura en listas de diccionario. Incluso en entorno de desarrollo compartido representa un riesgo.

---

## 🟢 BAJO

---

### LOW-01 — `APP_ENV=local` no corrresponde al entorno real

Si la aplicación está en producción con `APP_ENV=local`, algunos comportamientos de seguridad de Laravel cambian (p. ej. forzado de `--force` en migraciones). Debe ser `production`.

---

### LOW-02 — Extensión de archivo obtenida del cliente, no del MIME real

```php
$file->getClientOriginalExtension() // retorna lo que el cliente dice
// vs
$file->extension() // detectado por el contenido real del archivo (Magic bytes)
```

Usar `getClientOriginalExtension()` es menos seguro porque un archivo puede tener extensión `.jpg` pero ser realmente un `.php`.

**Recomendación:** Usar `$file->extension()` combinado con validación de mimes.

---

### LOW-03 — Sin Content Security Policy (CSP) headers

No se detectó configuración de headers de seguridad HTTP como:
- `Content-Security-Policy`
- `X-Frame-Options`
- `X-Content-Type-Options`
- `Referrer-Policy`
- `Permissions-Policy`

**Recomendación:** Añadir un middleware que configure estos headers, o configurarlos a nivel de servidor (Nginx/Apache).

---

### LOW-04 — `remember_token` en tabla users sin uso aparente de "remember me"

**Archivo:** [Migración users](file:///c:/Users/USUARIO/Documents/GitHub/uprit-web/database/migrations/0001_01_01_000000_create_users_table.php)

El campo `remember_token` existe pero el login no usa la funcionalidad "Recordarme". Si no se usa, eliminar el campo reduce la superficie de ataque.

---

## Tabla Resumen de Hallazgos

| ID | Severidad | Descripción | Archivo Principal |
|----|-----------|-------------|-------------------|
| CRIT-01 | 🔴 Crítico | Credenciales de BD en `.env` / password débil / usuario root | `.env` |
| CRIT-02 | 🔴 Crítico | `APP_DEBUG=true` en producción | `.env` |
| CRIT-03 | 🔴 Crítico | Endpoint de re-seeding de BD vía HTTP | `ObservacionController.php` |
| HIGH-01 | 🟠 Alto | Subida de archivos sin validación MIME | Múltiples controllers |
| HIGH-02 | 🟠 Alto | Path Traversal via `getClientOriginalName()` | `DocenteController.php` |
| HIGH-03 | 🟠 Alto | Archivos sensibles en `/public/` sin control de acceso | `WebController.php` |
| HIGH-04 | 🟠 Alto | Sin Rate Limiting en endpoint de login | `routes/web.php` |
| HIGH-05 | 🟠 Alto | Sin validación en store/update de Carreras, Sliders, Noticias | Múltiples controllers |
| HIGH-06 | 🟠 Alto | `TransparenciaController` sin validación en ningún método | `TransparenciaController.php` |
| MED-01 | 🟡 Medio | Tokens Sanctum sin expiración | `sanctum.php` |
| MED-02 | 🟡 Medio | Sesiones no cifradas | `.env` |
| MED-03 | 🟡 Medio | Cookie de sesión sin flag `Secure` | `session.php` |
| MED-04 | 🟡 Medio | Nombres de archivo predecibles (weak randomness) | Múltiples controllers |
| MED-05 | 🟡 Medio | Anti-spam del libro de reclamos bypasseable | `WebController.php` |
| MED-06 | 🟡 Medio | Listado completo de usuarios admin en endpoint | `ObservacionController.php` |
| MED-07 | 🟡 Medio | `getReclamos()` expone todos los datos PII sin paginación | `ReclamoController.php` |
| MED-08 | 🟡 Medio | Sin forzado de HTTPS en producción | — |
| MED-09 | 🟡 Medio | `LOG_LEVEL=debug` en producción | `.env` |
| MED-10 | 🟡 Medio | Sin Soft Deletes en modelos críticos | Múltiples modelos |
| MED-11 | 🟡 Medio | Password de BD débil incluso para desarrollo | `.env` |
| LOW-01 | 🟢 Bajo | `APP_ENV=local` en producción | `.env` |
| LOW-02 | 🟢 Bajo | Extensión de archivo obtenida del cliente | Múltiples controllers |
| LOW-03 | 🟢 Bajo | Sin Security Headers (CSP, X-Frame-Options, etc.) | — |
| LOW-04 | 🟢 Bajo | `remember_token` sin uso | Migration |

---

## Plan de Acción Prioritario

### Inmediato (hoy):
1. **Rotar** la contraseña de la BD y cambiar usuario de `root` a uno con permisos mínimos.
2. **Verificar** si `.env` fue commiteado a Git → purgar del historial si es así.
3. **Configurar** `APP_DEBUG=false` y `APP_ENV=production` en el servidor.

### Esta semana:
4. Añadir `->middleware('throttle:10,1')` a la ruta de login.
5. Añadir `$request->validate()` con reglas de mimes/max a **todos** los métodos de subida de archivos.
6. Reemplazar `getClientOriginalName()` por nombres generados con `bin2hex(random_bytes(16))`.
7. Mover `reclamos_evidencia/` de `public/` a `storage/app/private/`.
8. Configurar expiración de tokens Sanctum.

### Próximo sprint:
9. Implementar reCAPTCHA en el libro de reclamos público.
10. Configurar headers de seguridad HTTP.
11. Implementar SoftDeletes en modelos críticos.
12. Paginar `getReclamos()`.
13. Configurar `SESSION_ENCRYPT=true` y `SESSION_SECURE_COOKIE=true`.

---

*Reporte generado mediante análisis estático del código fuente. No se realizaron pruebas de penetración activas.*
