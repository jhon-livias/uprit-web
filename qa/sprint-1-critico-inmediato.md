# 🔴 Sprint 1 — Crítico / Inmediato
**Proyecto:** uprit-web (Laravel 12)  
**Carpeta raíz:** `c:\Users\USUARIO\Documents\GitHub\uprit-web`  
**Duración estimada:** 1 día  
**Prioridad:** BLOQUEANTE antes de cualquier despliegue a producción  
**Issues resueltos:** CRIT-01 · CRIT-02 · CRIT-03 · HIGH-03 · HIGH-04

---

## Contexto general

Este sprint atiende las vulnerabilidades que, si están activas en producción **hoy**, representan un riesgo inmediato de:
- Acceso total a la base de datos por credenciales expuestas
- Exposición de la arquitectura interna del servidor ante errores
- Destrucción masiva de datos via endpoint HTTP sin confirmación
- Filtración de datos personales (DNI, teléfono, correo) accesibles sin autenticación
- Ataques de fuerza bruta al panel de administración sin límite

---

## ✅ Tarea 1 — CRIT-01: Rotar credenciales de base de datos y eliminar usuario `root`

### Problema
El archivo `.env` contiene:
```env
DB_USERNAME=root
DB_PASSWORD=123qwe123
```
El usuario `root` tiene permisos totales sobre MySQL. La contraseña `123qwe123` es débil y figura en diccionarios de ataque comunes. Si el `.env` fue commiteado al historial de Git, las credenciales son públicas para cualquiera con acceso al repositorio.

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\.env` — líneas 26–28

### Pasos a ejecutar

#### Paso 1.1 — Verificar si `.env` fue commiteado al historial de Git
Ejecuta en la terminal (desde la raíz del proyecto):
```bash
git log --all --oneline -- .env
```
- **Si no hay output:** el `.env` nunca fue commiteado → continúa al paso 1.2.
- **Si hay commits listados:** el `.env` estuvo en el historial. Sigue el sub-paso 1.1.a antes de continuar.

#### Sub-paso 1.1.a — Purgar `.env` del historial de Git (solo si fue commiteado)
```bash
# Instalar git-filter-repo si no lo tienes:
pip install git-filter-repo

# Purgar el archivo del historial completo:
git filter-repo --path .env --invert-paths --force

# Forzar push a todos los remotes:
git push origin --force --all
git push origin --force --tags
```
> ⚠️ ADVERTENCIA: Esto reescribe el historial. Coordina con todos los colaboradores para que re-clonen el repositorio.

#### Paso 1.2 — Crear usuario MySQL con permisos mínimos
Conéctate a MySQL como root y ejecuta:
```sql
-- Crear usuario específico para la app
CREATE USER 'uprit_app_user'@'127.0.0.1' IDENTIFIED BY 'TuPasswordSeguro2026!';

-- Otorgar solo los permisos necesarios sobre la BD de la app
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES
  ON upritedu_bd.*
  TO 'uprit_app_user'@'127.0.0.1';

FLUSH PRIVILEGES;
```

#### Paso 1.3 — Actualizar `.env`
```env
# ANTES:
DB_USERNAME=root
DB_PASSWORD=123qwe123

# DESPUÉS:
DB_USERNAME=uprit_app_user
DB_PASSWORD=TuPasswordSeguro2026!
```
> Usa una contraseña generada aleatoriamente. Puedes usar: `openssl rand -base64 32`

#### Paso 1.4 — Limpiar caché de configuración de Laravel
```bash
php artisan config:clear
php artisan cache:clear
```

### Criterios de aceptación
- [ ] `git log --all --oneline -- .env` no muestra commits
- [ ] `php artisan db:show` conecta exitosamente con el nuevo usuario
- [ ] El usuario `root` ya no es el usuario de la aplicación

---

## ✅ Tarea 2 — CRIT-02: Desactivar modo debug en producción

### Problema
El `.env` tiene `APP_DEBUG=true` y `APP_ENV=local`. En producción, esto hace que cualquier error muestre:
- Rutas absolutas del servidor
- Variables de entorno (otras credenciales)
- Queries SQL completos
- Stack traces del código PHP

Un atacante puede provocar errores deliberadamente para extraer esta información.

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\.env` — líneas 2–4, 21
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Providers\AppServiceProvider.php`

### Pasos a ejecutar

#### Paso 2.1 — Actualizar variables en `.env`
```env
# ANTES:
APP_ENV=local
APP_DEBUG=true
LOG_LEVEL=debug

# DESPUÉS:
APP_ENV=production
APP_DEBUG=false
LOG_LEVEL=warning
```

#### Paso 2.2 — Forzar HTTPS en AppServiceProvider
Abre `app\Providers\AppServiceProvider.php` y modifica:

```php
<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Forzar HTTPS en producción
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
```

#### Paso 2.3 — Limpiar caché
```bash
php artisan config:clear
php artisan config:cache
```

### Criterios de aceptación
- [ ] `php artisan about` muestra `Environment: production` y `Debug Mode: OFF`
- [ ] Errores 404/500 muestran páginas genéricas sin stack trace
- [ ] Los logs en `storage/logs/laravel.log` muestran nivel warning o superior solamente

---

## ✅ Tarea 3 — CRIT-03: Proteger endpoint de re-seeding de BD

### Problema
Existe una ruta HTTP que un admin autenticado puede llamar para re-ejecutar el seeder con `--force`, borrando y reemplazando todos los datos de observaciones:

```php
// ObservacionController.php — línea 146
public function reimport()
{
    Artisan::call('db:seed', [
        '--class' => ObservacionSeeder::class,
        '--force' => true,
    ]);
}
```

Ruta activa: `POST /admin/observaciones/reimport`

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\ObservacionController.php` — líneas 146–158
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\routes\web.php` — línea 129

### Pasos a ejecutar

**Opción A — Eliminar completamente (RECOMENDADO):**

En `routes\web.php`, eliminar la línea 129:
```php
// ELIMINAR esta línea:
Route::post('/observaciones/reimport', [ObservacionController::class, 'reimport'])->name('observaciones.reimport');
```

En `ObservacionController.php`, eliminar el método (líneas 146–158) y el use de Artisan (línea 11):
```php
// ELIMINAR:
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\ObservacionSeeder;

// ELIMINAR el método completo:
public function reimport() { ... }
```

**Opción B — Restringir a entornos no-productivos:**
```php
public function reimport()
{
    if (app()->environment('production')) {
        abort(403, 'No disponible en producción.');
    }

    Artisan::call('db:seed', [
        '--class' => ObservacionSeeder::class,
        '--force' => true,
    ]);

    return response()->json([
        'ok' => true,
        'total' => Observacion::count(),
    ]);
}
```

### Criterios de aceptación
- [ ] `php artisan route:list | grep reimport` sin resultados (Opción A)
- [ ] O `POST /admin/observaciones/reimport` retorna 403 en producción (Opción B)

---

## ✅ Tarea 4 — HIGH-04: Rate Limiting en endpoint de login

### Problema
La ruta de login no tiene protección contra fuerza bruta a nivel de IP:
```php
// routes/web.php — línea 28
Route::post('/login', [AuthController::class, 'login'])->name('login');
```
Sin throttle, un atacante puede probar miles de contraseñas sin ser bloqueado por IP.

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\routes\web.php` — línea 28

### Pasos a ejecutar

En `routes\web.php`, modificar línea 28:
```php
// ANTES:
Route::post('/login', [AuthController::class, 'login'])->name('login');

// DESPUÉS:
Route::post('/login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('throttle:10,1'); // 10 intentos por minuto por IP
```

### Criterios de aceptación
- [ ] `php artisan route:list | grep login` muestra `throttle:10,1`
- [ ] 11 intentos rápidos desde la misma IP retornan HTTP 429

---

## ✅ Tarea 5 — HIGH-03: Mover evidencias de reclamos a almacenamiento privado

### Problema
Las evidencias de reclamos (imágenes de DNI, documentos privados) se guardan en `/public/reclamos_evidencia/`, accesibles sin autenticación por cualquier persona con la URL. Esto viola la Ley 29733 de Protección de Datos Personales de Perú.

### Archivos afectados
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\web\WebController.php` — líneas 505–511
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\app\Http\Controllers\admin\ReclamoController.php`
- `c:\Users\USUARIO\Documents\GitHub\uprit-web\routes\web.php`

### Pasos a ejecutar

#### Paso 5.1 — Modificar `storeReclamo()` en WebController.php

Añadir import al inicio del archivo:
```php
use Illuminate\Support\Facades\Storage;
```

Reemplazar el bloque de subida (líneas 505–511):
```php
// ANTES:
if ($request->hasFile('evidencia')) {
    $file = $request->file('evidencia');
    $nameimg = 'evidencia_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
    $path = public_path() . '/reclamos_evidencia/';
    $file->move($path, $nameimg);
    $reclamo->evidencia = $nameimg;
}

// DESPUÉS:
if ($request->hasFile('evidencia')) {
    $file = $request->file('evidencia');
    $ext = strtolower($file->extension()); // detectado por MIME real
    $filename = 'evidencia_' . bin2hex(random_bytes(16)) . '.' . $ext;
    Storage::disk('local')->putFileAs('reclamos', $file, $filename);
    $reclamo->evidencia = $filename;
}
```

#### Paso 5.2 — Agregar ruta protegida de descarga en routes/web.php (dentro del grupo auth:sanctum)
```php
Route::get('/reclamos/evidencia/{filename}', [ReclamoController::class, 'descargarEvidencia'])
    ->name('reclamos.evidencia.download')
    ->where('filename', '[a-zA-Z0-9_\-\.]+');
```

#### Paso 5.3 — Agregar método en ReclamoController.php
```php
use Illuminate\Support\Facades\Storage;

public function descargarEvidencia(string $filename)
{
    // Sanitizar: solo nombre de archivo, sin rutas
    $filename = basename($filename);
    $path = 'reclamos/' . $filename;

    if (!Storage::disk('local')->exists($path)) {
        abort(404);
    }

    return Storage::disk('local')->download($path);
}
```

#### Paso 5.4 — Migrar archivos existentes
```bash
mkdir -p storage/app/private/reclamos
mv public/reclamos_evidencia/* storage/app/private/reclamos/ 2>/dev/null || true
rm -rf public/reclamos_evidencia/
```

### Criterios de aceptación
- [ ] Nuevos archivos guardados en `storage/app/private/reclamos/`
- [ ] URL directa `https://dominio/reclamos_evidencia/archivo.jpg` retorna 404
- [ ] Admin autenticado puede descargar via `GET /admin/reclamos/evidencia/{filename}`
- [ ] Usuario no autenticado recibe 302 redirect a login

---

## 📋 Checklist final del Sprint 1

- [ ] CRIT-01: `.env` fuera del historial de Git + credenciales rotadas
- [ ] CRIT-02: `APP_DEBUG=false`, `APP_ENV=production`, `LOG_LEVEL=warning`
- [ ] CRIT-02: HTTPS forzado en AppServiceProvider
- [ ] CRIT-03: Ruta `/reimport` eliminada o bloqueada en producción
- [ ] HIGH-04: Login con `throttle:10,1`
- [ ] HIGH-03: Evidencias en `storage/app/private/`, descarga protegida por auth
- [ ] `php artisan config:clear && php artisan cache:clear` ejecutado en producción

---

*Sprint 1 de 3 | Siguiente: sprint-2-alta-esta-semana.md*
