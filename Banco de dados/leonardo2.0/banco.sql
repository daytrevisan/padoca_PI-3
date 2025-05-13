use feirafacil;

create table feirante (
cod_feirante int not null unique auto_increment primary key,
nome varchar(180) not null,
data_nascimento date,
email varchar(180) unique,
senha varchar(20) not null,
numero int
);

create table vendas (
cod_venda int not null unique auto_increment primary key,
cod_produto_fk int,
cod_barraca_fk int,
cod_clientes int,
quantidade int,
valor decimal(10, 2)
);

create table fornecedor (
cod_fornecedor int not null unique auto_increment primary key,
nome varchar(170) not null,
idade int,
celular int unique,
numero int unique,
email varchar(180) unique,
endereco varchar(180)
);

create table produto (
cod_produto int not null unique auto_increment primary key,
cod_fornecedor_fk int not null,
cod_venda_fk int,
cod_barraca_fk int,
valor decimal(10, 2),
nome varchar(180) not null,
item varchar(180)
);

create table barraca (
cod_barraca int not null unique auto_increment primary key,
cod_feirante int,
cod_venda_fk int,
quantidade int,
valor decimal(10, 2) not null
);

create table estoque (
cod_estoque int not null unique auto_increment primary key,
cod_produto_fk int,
quantidade varchar(180),
medida varchar(180)
);

$stmt = $pdo->query("SELECT * FROM  aluno");
