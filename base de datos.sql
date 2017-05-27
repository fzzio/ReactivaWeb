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

CREATE TABLE public."Usuario"
(
    id integer,
    nombres character varying(50),
    apellidos character varying(50),
    "nUsuario" character varying(20),
    pass character varying(150),
    correo character varying(60),
    estado boolean,
    PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public."Usuario"
    OWNER to postgres;

insert into "Usuario" values (1, 'Erick Joel', 'Rocafuerte Villon','ejrocafuerte','Iris','ejrocafuerte@gmail.com',true);

