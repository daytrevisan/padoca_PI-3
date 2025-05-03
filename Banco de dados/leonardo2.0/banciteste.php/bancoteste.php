<?php
$dsn = "mysql:host=192.168.8.211;dbname=feirafacil";
$username = "feirafacil";
$password = "feirafacil";
$pdo = new PDO($dsn, $username, $password);
 
$smtmt = $pdo->query("SELECT feirante FROM carlos ");
while ($aluno = $stmt->fetch()){
          echo $aluno["nome"]. "-" $aluno["email"]. <br>
          
}

create table estoque (
cod_estoque int not null unique auto_increment primary key,
cod_produto_fk int,
quantidade varchar(180),
medida varchar(180)
);

