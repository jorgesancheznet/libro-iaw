create database geografia;
use geografia;
create table localidades(
  id_localidad int(5),
  nombre varchar(50) not null,
  poblacion int(8),
  n_provincia int(2) not null,
  constraint localidades_pk primary key(id_localidad)
);

create  table provincias(
  n_provincia int(2),
  nombre varchar(25) not null,
  superficie int(5),
  id_capital int(5) not null,
  id_comunidad int(2) not null,
  constraint provincias_pk primary key(n_provincia),
  constraint provincias_uk1 unique(nombre),
  constraint provincias_fk1 foreign key(id_capital) 
              references localidades(id_localidad),
  constraint provincias_uk2 unique(id_capital)	
);


create table comunidades(
  id_comunidad int(2),
  nombre varchar(25) not null,
  id_capital int(5) not null,
  max_provincias int(1),
  constraint comunidades_pk primary key(id_comunidad),
  constraint comunidades_uk1 unique(nombre), 
  constraint comunidades_fk1 foreign key(id_capital) references localidades(id_localidad),
  constraint comunidades_uk2 unique(id_capital)
  
);

alter table localidades add constraint localidades_fk 
    foreign key(n_provincia) references provincias(n_provincia);

alter table provincias add constraint provincias_fk2
    foreign key(id_comunidad) references comunidades(id_comunidad);

