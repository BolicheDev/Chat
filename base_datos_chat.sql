drop database if exists chat_online;
create database chat_online CHARACTER SET utf8 COLLATE utf8_general_ci;

use chat_online;

drop table if exists usuarios;
create table usuarios (
	id_usuario int auto_increment,
    nick varchar(200) not null unique,
    password varchar(200),
    primary key(id_usuario)
);

drop table if exists mensajes;
create table mensajes (
	id_mensaje int auto_increment,
    id_usuario int,
    texto varchar(200),
    primary key(id_mensaje),
    foreign key(id_usuario) references usuarios(id_usuario)
);