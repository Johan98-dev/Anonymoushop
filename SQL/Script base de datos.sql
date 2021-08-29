/*-Validación de datos de entrada.
-Restricción de campo numéricos, para que estos no contengan valores negativos.
-Restricción de campos tipo fecha, en casos de tener fecha inicial y fecha final.
-Implementar un disparador.
-Implementar una vista.
-Implementar reglas de integridad referencial.

--------Relacionar personas con Proveedores-------------------
*/

create table usuarios(
    nomb_us varchar(50) not null primary key,
    contra_us varchar(50),
    tipo char(1)
);

create table proveedores (
    cod_prov varchar(3) not null primary key,
    nomb_prov varchar(50),
    tel_prov varchar(10),
    dir_prov varchar(50)
);

create table categorias (
    cod_cat varchar(3) not null primary key,
    nomb_cat varchar(50)
);

create table articulos (
    cod_art varchar(3) not null primary key,
    nomb_art varchar(50),
    precio float,
    stock int,
    cod_cat varchar(3),
    cod_prov varchar(3),
    constraint fk_cod_cat foreign key (cod_cat) references categorias(cod_cat),
    constraint fk_cod_prov foreign key (cod_prov) references proveedores(cod_prov)
);

create table pago (
    cod_pago varchar(3) not null primary key,
    modo_pago varchar(50)
);

create table ciudades (
    cod_ciu varchar(3) not null primary key,
    nomb_ciu varchar(50)
);

create table personas (
    id_pers varchar(3) not null primary key,
    nomb_pers varchar(50),
    apel_pers varchar(50),
    dir_pers varchar(50),
    tel_pers varchar(10),
    correo varchar(50),
    cod_ciu varchar(3),
    nomb_us varchar(50),
    constraint fk_cod_ciu foreign key (cod_ciu) references ciudades(cod_ciu),
    constraint fk_cod_us foreign key (nomb_us) references usuarios(nomb_us)
);

create table factura (
    cod_fac varchar(3) not null primary key,
    fecha date,
    total float,
    id_pers varchar(3),
    cod_pago varchar(3),
    constraint fk_id_pers foreign key (ci_pers) references personas(id_pers),
    constraint fk_cod_pago foreign key (cod_pago) references pago(cod_pago)
);

create table detalle (
    cod_fac varchar(3) not null,
    cod_art varchar(3) not null,
    cant int,
    primary key(cod_art,cod_fac),
    constraint fk_cod_fac foreign key (cod_fac) references factura(cod_fac),
    constraint fk_cod_art foreign key (cod_art) references articulos(cod_art)
);

create table envio (
    cod_fac varchar(3) not null,
    cod_ciu varchar(3) not null,
    primary key(cod_fac,cod_ciu),
    constraint fk_cod_fac foreign key (cod_fac) references factura(cod_fac),
    constraint fk_cod_ciu foreign key (cod_ciu) references ciudades(cod_ciu)
);

insert into ciudades("cod_ciu", "nomb_ciu") values ('1', 'villavicencio');

insert into usuarios("nomb_us", "contra_us", "tipo") values ('Johan98', 'root', 'A');
insert into usuarios("nomb_us", "contra_us", "tipo") values ('Alex98', '123', 'A');

insert into personas("id_pers", "nomb_pers", "apel_pers", "dir_pers", "tel_pers", "correo", "cod_ciu", "nomb_us") values ('1111','Johan', 'Albarracin', 'cll 6 #11 Br Estero', '3123456789', 'johan@example.com', '1', 'Johan98');
insert into personas("id_pers", "nomb_pers", "apel_pers", "dir_pers", "tel_pers", "correo", "cod_ciu", "nomb_us") values ('2222','Alex', 'Barreto', 'Apt 12-04 Torres de San Juan', '3222222234', 'alex@example.com', '1', 'Alex98');