CREATE DATABASE BANCOI2;

CREATE TABLE cliente(
cui varchar(13) NOT NULL,
nombre varchar(60) NOT NULL,
codigo varchar(13) NOT NULL,
contrasena varchar(13) NOT NULL,
constraint PK_CLIENTE PRIMARY KEY(cui)
);


CREATE TABLE cuenta_monetaria(
no_cuenta INT NOT NULL,
cui varchar(13) NOT NULL,
monto INT NOT NULL,
constraint PK_CM PRIMARY KEY(no_cuenta)
);


CREATE TABLE cuenta_ahorro(
no_cuenta INT NOT NULL,
cui varchar(13) NOT NULL,
monto INT NOT NULL,
constraint PK_CA PRIMARY KEY(no_cuenta)
);

CREATE TABLE tarjeta_credito(
no_tarjeta varchar(20),
cui varchar(13) NOT NULL,
monto INT NOT NULL,
constraint PK_TC PRIMARY KEY(no_tarjeta)
);