# Fase 5 — Transparencia: archivos y auditoría de cambios

**Prioridad:** alta  
**Estado:** en progreso — carga segura implementada localmente; auditoría/versionado pendientes.  
**Responsable:** pendiente

## Estado actual

La carga admite cualquier archivo de hasta 50 MB y lo guarda bajo `public/transparencia_documentos`. Los documentos tienen nombres aleatorios, pero no se valida un tipo documental explícito ni se registra quién cambió el contenido.

## Validar estado actual

- [ ] Inventariar documentos, tamaños, extensiones y enlaces externos.
- [ ] Definir formatos institucionales permitidos y tamaño máximo real.
- [ ] Confirmar requisitos de conservación, publicación, versiones y responsables.

## Acciones de carga segura

1. Permitir PDF exclusivamente, salvo excepción documentada.
2. Validar extensión, MIME real y firma PDF; no confiar solo en el nombre.
3. Reducir el máximo a la necesidad acordada y aplicar antivirus si el entorno lo permite.
4. Mover los archivos a almacenamiento no público.
5. Publicarlos mediante un controlador que entregue únicamente documentos aprobados con tipo `application/pdf`.
6. Guardar checksum SHA-256, MIME, tamaño, fecha y usuario que cargó el archivo.

## Acciones de auditoría y versionado

1. Crear `audit_logs` con actor, IP, user-agent, fecha, acción, entidad, identificador, valores previos/nuevos y resultado.
2. Registrar creación, edición, publicación, sustitución, despublicación y eliminación.
3. Crear versiones documentales; nunca eliminar evidencia de una versión publicada sin retención aprobada.
4. Dar vista de solo lectura de bitácora a `superadministrador` y `auditor`.
5. Definir retención y protección contra modificación de las bitácoras.

## Avance registrado

- Las nuevas cargas se restringieron a PDF de hasta 25 MB, con validación de MIME y cabecera PDF.
- Los nuevos archivos se guardan en el disco privado de Laravel y se entregan desde una ruta pública controlada.
- Los documentos heredados bajo `public/transparencia_documentos` se mantienen disponibles temporalmente para evitar una interrupción.
- El comando de migración ahora usa TLS, solo migra PDFs válidos y los guarda de forma privada.

## Evidencia requerida

- Pruebas de rechazo para archivo no PDF, MIME falso, exceso de tamaño y acceso no autorizado.
- Registro de auditoría de cada operación CRUD.
- Hash y versión de una publicación de prueba.

## Criterio de cierre

Solo se publican documentos permitidos y cada cambio puede asociarse a usuario, IP, fecha y versión.
