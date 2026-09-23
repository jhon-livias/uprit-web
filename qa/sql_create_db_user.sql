-- ============================================================
-- SCRIPT SPRINT 1 - CRIT-01: Crear usuario MySQL seguro
-- Ejecutar como root en MySQL local Y en el VPS
-- ============================================================

-- 1. Crear usuario con el password generado
CREATE USER IF NOT EXISTS 'uprit_app_user'@'127.0.0.1' IDENTIFIED BY 'mvNWD-cxEi+qH=9oaGewUS1OhKQ8gutl';
CREATE USER IF NOT EXISTS 'uprit_app_user'@'localhost' IDENTIFIED BY 'mvNWD-cxEi+qH=9oaGewUS1OhKQ8gutl';

-- 2. Otorgar permisos mínimos sobre la BD de la app (sin SUPER, sin GRANT OPTION)
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES
  ON upritedu_bd.*
  TO 'uprit_app_user'@'127.0.0.1';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES
  ON upritedu_bd.*
  TO 'uprit_app_user'@'localhost';

-- 3. Aplicar cambios
FLUSH PRIVILEGES;

-- 4. Verificar (debe mostrar los permisos recién creados)
SHOW GRANTS FOR 'uprit_app_user'@'localhost';
