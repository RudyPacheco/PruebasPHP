CREATE DATABASE GOODWAY;


CREATE TABLE tiendas(
codigo varchar(13) NOT NULL,
nombre varchar(40) NOT NULL,
constraint PK_TIENDAS PRIMARY KEY(codigo)
);


CREATE TABLE usuarios(
codigo varchar(13) NOT NULL,
contrasena varchar(13) NOT NULL,
constraint PK_USUARIOS PRIMARY KEY(codigo)
);


CREATE TABLE facturas(
numero_factura varchar(13) NOT NULL,
codigo_tienda varchar(13) NOT NULL,
fecha_emision date NOT NULL,
codigo_usuario varchar(13) NOT NULL,
total INT NOT NULL,
constraint PK_FACTURAS PRIMARY KEY(numero_factura)
);