create table feirante(
    cod_feirante int not null auto_increment primary key,
    nome varchar(100) not null,
    data_nascimento date not null,
    email varchar(100) unique,
    senha varchar(100) not null,
    numero varchar(11) unique
);

create table fornecedor(
    cod_fornecedor int not null auto_increment primary key,
    nome varchar(100) not null,
    data_nascimento date not null,
    endereço varchar(100) not null,
    numero varchar(11) unique
);

create table barraca(
    cod_barraca int not null auto_increment primary key,
    cod_feirante_fk int,
    vendas int not null,
    endereço varchar(100) not null,
    FOREIGN KEY (cod_feirante_fk) references feirante (cod_feirante)
);

create table venda(
    cod_venda int not null auto_increment primary key,
    cod_barraca_fk int,
    cod_cliente int,
    quantidade int not null,
    valor dec not null,
    FOREIGN KEY (cod_barraca_fk) references barraca (cod_barraca)
);

create table produto(
    cod_produto int not null auto_increment primary key,
    cod_fornecedor_fk int,
    cod_venda_fk  int,
    cod_barraca_fk int,
    valor dec not null,
    nome varchar(100) not null,
    item varchar (100),
    FOREIGN KEY (cod_venda_fk) references venda (cod_venda),
    FOREIGN KEY (cod_fornecedor_fk) references fornecedor (cod_fornecedor),
    FOREIGN KEY (cod_barraca_fk) references barraca (cod_barraca)
);

create table estoque(
    cod_estoque int not null auto_increment primary key,
    cod_produto_fk int,
    quantidade int not null,
    medida varchar(100),
    FOREIGN KEY (cod_produto_fk) references produto (cod_produto)
);

