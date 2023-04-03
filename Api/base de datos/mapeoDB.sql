CREATE DATABASE happy_kids;

CREATE TABLE ninos(
cui varchar(13) NOT NULL,
nombre varchar(40) NOT NULL,
apellido varchar(40) NOT NULL,
fecha_nacimiento date NOT NULL,
sexo BOOLEAN NOT NULL,
peso DECIMAL(5 , 2) NOT NULL,
talla INT NOT NULL,
constraint PK_NINOS PRIMARY KEY(cui)
);