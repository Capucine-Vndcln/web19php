create table articles
(
    Id              bigint auto_increment
        primary key,
    Titre           varchar(50)  null,
    Description     text         null,
    DateAjout       date         null,
    Auteur          varchar(50)  null,
    ImageRepository varchar(50)  null,
    ImageFileName   varchar(255) null
);

create table categorie
(
    Id      bigint auto_increment
        primary key,
    Libelle varchar(30) null,
    Icone   varchar(50) null
);

