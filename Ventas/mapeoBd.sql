CREATE DATABASE ventas;

CREATE TABLE producto(
codigo INT NOT NULL auto_increment,
nombre varchar(40) NOT NULL,
descripcion varchar(255) NOT NULL,
en_existencia INT NOT NULL,
imagen longblob NOT NULL,
constraint PK_PRODUCTO PRIMARY KEY(codigo)
);

CREATE TABLE producto(
codigo INT NOT NULL auto_increment,
nombre varchar(40) NOT NULL,
descripcion TEXT NOT NULL,
precio DECIMAL(5 , 2) NOT NULL,
en_existencia INT NOT NULL,
imagen longblob NOT NULL,
constraint PK_PRODUCTO PRIMARY KEY(codigo)
);
