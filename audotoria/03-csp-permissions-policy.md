# Fase 3 — CSP y Permissions-Policy

**Prioridad:** alta  
**Estado:** pendiente  
**Responsable:** pendiente

## Estado actual

El middleware tiene cabeceras básicas (`HSTS`, `nosniff`, `X-Frame-Options` y `Referrer-Policy`), pero no CSP ni `Permissions-Policy`.

## Validar estado actual

- [ ] Inventariar scripts, estilos, fuentes, imágenes, frames y conexiones externas por página.
- [ ] Identificar dependencias como Cloudflare, reCAPTCHA, Google Fonts, mapas y widgets.
- [ ] Detectar estilos o scripts inline que requieran nonce/hash.

## Acciones

1. Implementar CSP inicialmente como `Content-Security-Policy-Report-Only`.
2. Registrar y revisar reportes de violación durante una semana representativa.
3. Migrar código inline a nonce/hash y reducir dominios autorizados al mínimo.
4. Activar CSP final con `default-src 'self'`, `object-src 'none'`, `base-uri 'self'`, `frame-ancestors 'self'` y directivas específicas justificadas.
5. Agregar `Permissions-Policy` denegando cámara, micrófono, geolocalización, pagos, USB y funciones no utilizadas.
6. Probar login, reCAPTCHA, formularios, Transparencia, navegación y móvil.

## Evidencia requerida

- Inventario de orígenes autorizados y justificación.
- Reportes CSP revisados.
- Cabeceras finales capturadas desde producción/staging.
- Pruebas funcionales aprobadas.

## Criterio de cierre

CSP y Permissions-Policy están activas sin dependencias no justificadas ni fallas funcionales.
