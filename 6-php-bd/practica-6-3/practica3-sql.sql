CREATE DATABASE mensajes;
USE mensajes;
CREATE TABLE usuarios(
  id_usuario INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(30) NOT NULL,
  pass VARCHAR(100) NOT NULL,
  CONSTRAINT usuarios_pk PRIMARY KEY(id_usuario),
  CONSTRAINT usuarios_uk UNIQUE(usuario)
);
CREATE TABLE mensajes(
  id_mensaje INT NOT NULL AUTO_INCREMENT,
  texto VARCHAR(300) NOT NULL,
  id_remite INT NOT NULL,
  id_destino INT NOT NULL,
  CONSTRAINT mensajes_pk PRIMARY KEY(id_mensaje),
  CONSTRAINT usuarios_fk1 FOREIGN KEY(id_remite)
  REFERENCES usuarios(id_usuario),
  CONSTRAINT usuarios_fk2 FOREIGN KEY(id_destino)
  REFERENCES usuarios(id_usuario)
);


alter table mensajes add nuevo BOOLEAN default true;

