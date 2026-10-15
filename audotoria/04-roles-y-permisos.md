# Fase 4 — Roles y permisos granulares

**Prioridad:** alta  
**Estado:** pendiente  
**Responsable:** pendiente

## Estado actual

Las rutas administrativas requieren autenticación, pero no hay evidencia de autorización granular por módulo o acción.

## Validar estado actual

- [ ] Listar usuarios administrativos y su función institucional.
- [ ] Mapear cada ruta administrativa a responsable, dato tratado y riesgo.
- [ ] Identificar acciones críticas: usuarios, Transparencia, reclamos, evidencias y eliminación.

## Acciones

1. Implementar roles/permisos, preferiblemente mediante `spatie/laravel-permission`.
2. Definir como mínimo: `superadministrador`, `transparencia`, `comunicaciones`, `reclamos` y `auditor`.
3. Definir permisos por acción, no solo por menú: ver, crear, editar, publicar, eliminar, descargar evidencia y administrar usuarios.
4. Aplicar middleware y políticas Laravel a rutas y controladores.
5. Asignar a cada usuario el privilegio mínimo necesario.
6. Crear pruebas automáticas de denegación y autorización para cada rol.

## Evidencia requerida

- Matriz de roles y permisos aprobada.
- Resultado de pruebas automatizadas.
- Lista de cuentas con rol asignado y responsable institucional.

## Criterio de cierre

Un usuario autenticado solo puede ejecutar las acciones autorizadas para su rol.
