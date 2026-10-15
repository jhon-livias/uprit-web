# Fase 2 — Endurecimiento de producción

**Prioridad:** crítica  
**Estado:** pendiente de validación VPS  
**Responsable:** pendiente

## Validar estado actual en VPS

- [ ] `APP_ENV=production` y `APP_DEBUG=false`.
- [ ] URL principal bajo HTTPS y redirección HTTP → HTTPS.
- [ ] `SESSION_SECURE_COOKIE=true`, `SESSION_ENCRYPT=true`, `SESSION_HTTP_ONLY=true`, `SESSION_SAME_SITE=lax`.
- [ ] `LOG_LEVEL=warning` o `error`; logs con rotación y acceso limitado.
- [ ] Permisos restrictivos para `.env`, `storage` y `bootstrap/cache`.
- [ ] Certificado TLS vigente, firewall y puertos expuestos revisados.

## Acciones

1. Aplicar valores seguros en el `.env` de producción y guardar un backup seguro previo.
2. Configurar Nginx/Apache para HTTPS obligatorio; activar HSTS solo tras validar subdominios.
3. Limpiar y regenerar configuración/cache de Laravel de forma controlada.
4. Configurar logs diarios, retención y monitoreo de errores.
5. Verificar que archivos sensibles, errores y trazas no estén expuestos públicamente.

## Evidencia requerida

- Salida sanitizada de configuración efectiva.
- Prueba de redirección HTTPS, certificado y cabeceras.
- Validación de cookie `Secure`, `HttpOnly` y `SameSite`.
- Registro de cambio y plan de reversión.

## Criterio de cierre

Producción opera sin depuración, con HTTPS obligatorio, cookies seguras y logging restringido.
