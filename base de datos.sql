CREATE USER "Reactiva" WITH
	LOGIN
	SUPERUSER
	NOCREATEDB
	NOCREATEROLE
	NOINHERIT
	REPLICATION
	CONNECTION LIMIT 1
	PASSWORD 'xxxxxx';
COMMENT ON ROLE "Reactiva" IS 'usuario para usar la tabla reactiva como administrador';

CREATE DATABASE "Reactiva"
    WITH 
    OWNER = "Reactiva"
    ENCODING = 'UTF8'
    CONNECTION LIMIT = 5;
CREATE SCHEMA "Usuario"
    AUTHORIZATION postgres;