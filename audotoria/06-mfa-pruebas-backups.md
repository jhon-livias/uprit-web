# Fase 6 — MFA, pruebas de seguridad y recuperación

**Prioridad:** alta  
**Estado:** pendiente  
**Responsable:** pendiente

## MFA de administradores

- [ ] Implementar MFA TOTP mediante aplicación autenticadora.
- [ ] Generar códigos de recuperación de un solo uso y protegerlos adecuadamente.
- [ ] Exigir MFA para todos los roles administrativos.
- [ ] Exigir reautenticación/MFA para acciones sensibles: usuarios, roles, eliminación y Transparencia.
- [ ] Documentar recuperación de cuenta con doble validación institucional.

## Dependencias y pruebas

- [ ] Ejecutar `composer audit` y `npm audit` en desarrollo y CI.
- [ ] Agregar escaneo de secretos y análisis estático PHP/Laravel.
- [ ] Probar autenticación, autorización, CSRF, sesión, XSS, cargas, path traversal y descarga de evidencias.
- [ ] Ejecutar escaneo dinámico solo en staging inicialmente.
- [ ] Registrar vulnerabilidades, responsable, plazo y aceptación de riesgo cuando aplique.

## Respaldo y recuperación

1. Definir RPO y RTO institucionales.
2. Respaldar diariamente base de datos, archivos y configuración crítica de forma cifrada.
3. Conservar una copia fuera del VPS/proveedor principal.
4. Establecer retención diaria, semanal y mensual.
5. Documentar restauración, responsables, contactos de emergencia y escalamiento.
6. Restaurar en un entorno aislado al menos trimestralmente y registrar resultado y tiempo.

## Evidencia requerida

- MFA habilitado en todas las cuentas administrativas.
- Reportes de dependencia, SAST/secretos y pruebas dinámicas.
- Política de backup aprobada.
- Evidencia de restauración satisfactoria y medición de RPO/RTO.

## Criterio de cierre

Administración con MFA obligatorio, controles de seguridad continuos y restauración probada dentro de los objetivos definidos.
