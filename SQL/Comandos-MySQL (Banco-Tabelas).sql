-- Comandos MySQL
CREATE database PADOCA;
USE PADOCA;
SHOW databases;

-- Produto
CREATE TABLE SB1 (
	B1_COD varchar (15) NOT NULL,
	B1_DESC varchar (100) NULL,
	B1_UM varchar (10) NULL,
	B1_PESO float NULL,
	B1_QTDE float NULL,
	B1_ATIVO varchar (10) NULL,
PRIMARY KEY (B1_COD)
);

-- Locais Estoque
CREATE TABLE SBE (
	BE_COD varchar (15) NOT NULL,
	BE_LOCAL varchar (100) NULL,
	BE_ATIVO varchar (10) NULL,
PRIMARY KEY (BE_COD)
);

-- Movimento Estoque
CREATE TABLE SD3 (
	D3_SEQ int AUTO_INCREMENT,
	D3_PRODUTO varchar (15) NOT NULL,
	D3_LOCAL varchar (15) NULL,
	D3_QTDE FLOAT,
	D3_SINAL varchar (1) NULL,
PRIMARY KEY (D3_SEQ)
);

-- Local Estoque
CREATE TABLE tb_local(
  cd_local int(11) not null AUTO_INCREMENT,
  nm_local varchar(50) not null,
  st_local varchar(50) not null,
  ds_local varchar(300),
  CONSTRAINT pk_local PRIMARY KEY (cd_local)
);

-- Produtos
CREATE TABLE tb_produto(
  cd_produto int(11) not null AUTO_INCREMENT,
  nm_produto varchar(50) not null,
  ds_produto varchar(300),
  nm_imagem_produto varchar(50) not null,
  um_produto varchar(02) not null,
  qt_produto decimal(10,2) not null,
  vl_unit decimal(10,2) not null,
  vl_produto decimal(10,2) not null,
  nm_tipo_produto varchar(25) not null,
  CONSTRAINT pk_produto PRIMARY KEY (cd_produto)
);

-- Cadastro
CREATE TABLE USU (
	US_NOME varchar (30) NOT NULL,
	US_EMAIL varchar (50) NULL,
	US_CPF varchar (14) NULL,
	US_SENHA varchar (20) NULL,
PRIMARY KEY (US_CPF)
);

-- Estrutura
CREATE TABLE SG1(
    G1_CONT int (11) NOT NULL AUTO_INCREMENT,
    G1_COD varchar (15) NOT NULL,
    G1_COMP varchar (15) NOT NULL,
    G1_SEQ varchar (4) NULL,
    G1_QTDE float NULL,
    G1_PERDA float NULL,
    G1_LISTA varchar (20) NULL,
    G1_QTDE_HORA time NULL,
  CONSTRAINT pk_estrutura PRIMARY KEY (G1_CONT)
);

