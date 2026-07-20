# Prompt — Fase 9: Cache headers y optimización producción

Copia todo el bloque de abajo en el chat de Cursor:

---

Configura optimizaciones de producción para Laravel y assets estáticos.

**Contexto:** 102 requests, ~12 MB transferidos. Muchos assets en `public/web/assets/` sin cache agresivo.

**Implementar:**

1. **Laravel caches (documentar comandos deploy):**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **Headers estáticos:** Archivo `.htaccess` o config nginx para `public/web/assets/`, imágenes (`noticias_imagenes/`, `slider_*`):
   - `Cache-Control: public, max-age=31536000, immutable` para assets versionados.
   - Gzip/Brotli habilitado.

3. **APP_DEBUG=false** en producción (verificar `.env.example`).

4. **Opcional:** `php artisan optimize` en pipeline de deploy.

5. **Documentar** en `@features/README.md` o comentario en deploy cómo invalidar cachés tras cambios en menú/carreras.

**Restricciones:**
- No commitear `.env`.
- Cambios compatibles con hosting actual (Apache/XAMpp/nginx — detectar qué usa el proyecto).

**Archivos:**
- `public/.htaccess` (si existe o crear)
- `README.md` del repo (sección deploy, breve)
- Verificar `config/app.php`, `bootstrap/app.php`

---
