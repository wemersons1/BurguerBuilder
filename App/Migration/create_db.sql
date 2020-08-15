create table enderecos(
    id_endereco int not null primary key AUTO_INCREMENT,
    cidade varchar(30) not null ,
    bairro varchar(30) not null,
    complemento varchar (100) not null,
    cep varchar(10)
);

create table hamburguer(
    id_hamburguer int not null primary key auto_increment,
    id_usuario int,
    foreign key (id_usuario) references usuario(id),
    qtd_queijo int not null,
    qtd_carne int not null,
    qtd_bacon int not null,
    qtd_presunto int not NULL,
    valor float not null
)

create table usuario(
    id int not null primary key AUTO_INCREMENT,
    user varchar(30) not null,
    pass varchar(30) not null,
    id_endereco int,
    foreign key (id_endereco) references enderecos(id_endereco)
);
