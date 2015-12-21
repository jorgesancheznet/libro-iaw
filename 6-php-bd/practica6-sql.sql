CREATE DATABASE cursos;
USE cursos;
CREATE TABLE cursos
(
  id_curso INT PRIMARY KEY,
  curso VARCHAR(20) NOT NULL UNIQUE,
  plazas_totales INT DEFAULT 15 NOT NULL,
  plazas_ocupadas INT DEFAULT 0 NOT NULL
);

INSERT INTO cursos VALUES(1,"Escalada",18,14);
INSERT INTO cursos VALUES(2,"Guitarra acústica",20,10);
INSERT INTO cursos VALUES(3,"Guitarra española",15,4);
INSERT INTO cursos VALUES(4,"Historia de Palencia",15,3);
INSERT INTO cursos VALUES(5,"Marcha nórdica",15,14);
INSERT INTO cursos VALUES(6,"Montañismo",15,0);
INSERT INTO cursos VALUES(7,"Natación para bebés",10,10);
INSERT INTO cursos VALUES(8,"Natación para bebés2",10,9);
INSERT INTO cursos VALUES(9,"Natación-avanzado",18,4);
INSERT INTO cursos VALUES(10,"Natación-básico",30,23);
INSERT INTO cursos VALUES(11,"Paddle",15,9);
INSERT INTO cursos VALUES(12,"Running",15,15);
INSERT INTO cursos VALUES(13,"Running avanzado",25,24);
INSERT INTO cursos VALUES(14,"Spinning",15,3);
INSERT INTO cursos VALUES(15,"Yoga",15,8);



select * from cursos;