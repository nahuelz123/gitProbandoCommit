create database Ecommerce;

use Ecommerce;

create table  User (
      idUser integer not null auto_increment,
    email varchar(30) not null,
    name varchar(30) not null,
    password varchar(30) not null,
   
    primary key (idUser);
);

create table  realEstate (
     idRealEstate integer not null auto_increment,
    idUser integer not null,
    title varchar(30) not null,
    description varchar(30) not null,
      bedrooms varchar(30) not null,
    parking BOOLEAN not null,
    price integer not null,
     city varchar(30) not null,
  url varchar(2000) not null,
    primary key (idRealEstate),
    foreign key (idUser) references Users (idUser);
);
create table  vehicle (
     idVehicle integer not null auto_increment,
    idUser integer not null,
    title varchar(30) not null,
    description varchar(30) not null,
      year varchar(30) not null,
    price integer not null,
     city varchar(30) not null,
    url varchar(2000) not null,
    primary key (idVehicle),
    foreign key (idUser) references Users (idUser)
);
create table  imagen (
     idImagen integer not null auto_increment,
    
  url varchar(2000) not null,
    primary key (idImagen),
);