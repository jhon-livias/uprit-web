# Fase 0 — Línea base y acceso de auditoría

**Prioridad:** alta  
**Estado:** pendiente  
**Responsable:** pendiente  
**Fecha de inicio/cierre:** pendiente

## Objetivo

Documentar la arquitectura efectiva, responsables y configuración real antes de cambiar el sistema.

## Validar estado actual

- [ ] Confirmar acceso al VPS por `ssh uprit-repositorio`.
- [ ] Identificar servidor web, versión de PHP, Laravel, base de datos, cola, caché y tareas programadas.
- [ ] Inventariar dominios, DNS, Cloudflare, registrador y responsables.
- [ ] Obtener cabeceras HTTP de producción y comprobar HTTPS.
- [ ] Inventariar cuentas administrativas y proveedores con acceso.

## Acciones

1. Corregir o registrar el alias SSH sin guardar claves en el repositorio.
2. Crear una matriz de activos, propietarios y contactos de emergencia.
3. Crear una carpeta externa y restringida para evidencias de auditoría.
4. Abrir tickets para cada hallazgo con prioridad, dueño y fecha objetivo.

## Evidencia requerida

- Inventario de activos y responsables.
- Salida sanitizada de configuración de producción.
- Resultado de cabeceras HTTPS y certificado TLS.
- Lista de accesos administrativos aprobada.

## Criterio de cierre

La infraestructura, responsables y ruta de escalamiento están documentados y el acceso de solo lectura al VPS funciona.
