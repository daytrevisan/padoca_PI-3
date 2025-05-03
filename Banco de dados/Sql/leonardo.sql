create table feirante(
    cod_feirante    int not null unique auto_increment primary key,
    nome            varchar(180) not null,
    data_nascimento date('ddmmyyyy'), 
    email           varchar(180) unique,
    senha           varchar(20) not null,
    numero          int
);

create table vendas(
    cod_venda_      int(180) not null unique auto_increment primary key,
    cod_produto_fk  int(180),
    cod_barraca_fk  int(180),
    cod_clientes    int(180),
    quantidade      int(180),
    valor           dec
);

create table fornecedor(
    cod_fornecedor int not null unique auto_increment primary key(100),
    nome varchar(170) not null,
    idade int(180),
    celular int(180) unique,
    telefone int(180) unique,
    email  varchar(180) unique,
    endereço varchar(180)
);

create table produto(
    cod_produto  int(108) not null unique auto_increment primary key,
    cod_fornecedor_fk  int(180) not null unique,
    cod_venda_fkcod_barraca_fk  int(100),
    valor  dec,
    nome  varchar(180) not null,
    item varchar (180)
);

create table barraca(
    cod_barraca int(180) not null unique auto_increment primary key
    cod_feirante int(180)
    cod_venda_fk int(180)
    quantidae int(180)
    valor dec not null
);

create table estoque(
    cod_estoque int(180) not null unique auto_increment primary key
    cod_produto_fk int(180)
    quantidade varchar(180)
    medida varchar(180) 