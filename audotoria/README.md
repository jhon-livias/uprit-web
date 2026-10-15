# Plan de auditoría y endurecimiento — UPRIT

Este directorio organiza el trabajo de seguridad en fases ejecutables. Cada fase debe cerrarse con evidencia verificable antes de avanzar a la siguiente.

## Orden de ejecución

| Fase | Archivo | Prioridad | Estado |
| --- | --- | --- | --- |
| 0 | [00-linea-base.md](00-linea-base.md) | Alta | Pendiente |
| 1 | [01-respaldos-sql.md](01-respaldos-sql.md) | Crítica | En progreso |
| 2 | [02-produccion.md](02-produccion.md) | Crítica | Pendiente de VPS |
| 3 | [03-csp-permissions-policy.md](03-csp-permissions-policy.md) | Alta | Pendiente |
| 4 | [04-roles-y-permisos.md](04-roles-y-permisos.md) | Alta | Pendiente |
| 5 | [05-transparencia.md](05-transparencia.md) | Alta | En progreso |
| 6 | [06-mfa-pruebas-backups.md](06-mfa-pruebas-backups.md) | Alta | Pendiente |

## Regla de trabajo

1. Ejecutar primero la sección **Validar estado actual**.
2. Registrar fecha, responsable y resultado en el archivo de la fase.
3. Realizar los cambios solo después de contar con respaldo y, cuando aplique, aprobación.
4. Guardar evidencia sin secretos: comandos ejecutados, capturas, hashes, resultados de pruebas y enlaces a tickets.
5. Marcar una fase como completada únicamente al cumplir todos sus criterios de cierre.

> No almacenar contraseñas, tokens, archivos `.env`, dumps SQL ni datos personales en este directorio.
