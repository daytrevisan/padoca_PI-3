create table feirante(
    cod_fornecedor int primary key,
    nome varchar(200) not null
    data_nascimento data not null
    email varchar(200) unique
    senha varchar(200) unique
    numero varchar unique
);


create table barraca (
    cod_barraca int
    cod_feirante int
    cod_produto int
    cod_venda int
    endereço varchar
);

create table estoque(
    cod_estoque int
    cod_produto varchar
    medida varchar
);

create table venda(
    cod_venda int
    cod_produto int
    cod_barraca int
    cod_cliente int
    quantidade int
    valor dec
    total dec
);

create table ofrncedor(
    cod_fonecedor int
    nome vachar(200)
    idade int
    celular int
    email int 
    endereço int
);

create table produto(
    cod_produto int
    nome varchar(200)
    marca varchar(200)
    data_de_validade int
    
    
)