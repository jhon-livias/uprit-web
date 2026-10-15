# Fase 1 — Contención de respaldos SQL

**Prioridad:** crítica  
**Estado:** en progreso — nuevas reglas de ignorado agregadas; retiro y rotación pendientes.  
**Responsable:** pendiente

## Hallazgo actual

Se detectaron dumps SQL en el árbol local: `database/query/upritedu_bd.sql`, `prod_backup.sql`, `remote_backup_clean.sql` y `remote_data_only.sql`. Los dos primeros están versionados; los otros están sin seguimiento. Pueden contener datos personales o credenciales históricas.

## Validar estado actual

- [ ] Clasificar contenido y sensibilidad sin exponerlo en tickets o chat.
- [ ] Verificar si los dumps llegaron al repositorio remoto o a releases.
- [ ] Identificar credenciales, datos personales y claves presentes.
- [ ] Confirmar si existe una copia cifrada, necesaria y recuperable fuera del repositorio.

## Acciones

1. Crear un respaldo cifrado, con hash y acceso restringido, si retenerlo está justificado.
2. Retirar los dumps del árbol de trabajo y del repositorio con aprobación explícita.
3. Agregar reglas `.gitignore` para dumps, backups y exportaciones locales; conservar únicamente migraciones y fixtures ficticios.
4. Si ya fueron publicados, limpiar historial de forma coordinada y avisar a quienes clonaron el repositorio.
5. Rotar toda credencial expuesta: BD, correo, API, VPS y claves de aplicación, según corresponda.
6. Habilitar escaneo de secretos pre-commit y en CI.

## Avance registrado

- Se agregaron patrones para ignorar nuevos archivos SQL, dumps y backups en `.gitignore`.
- Los dumps existentes no se han eliminado ni alterado; requieren respaldo cifrado, revisión de historial y autorización antes de retirarlos.

## Evidencia requerida

- Hash y ubicación aprobada del respaldo cifrado, si se conserva.
- Resultado de búsqueda Git sin dumps reales.
- Constancia de rotación de secretos, sin incluir valores.
- Reporte del escáner de secretos.

## Criterio de cierre

No hay dumps productivos ni secretos en el repositorio o historial accesible; los datos requeridos están cifrados y bajo custodia.
