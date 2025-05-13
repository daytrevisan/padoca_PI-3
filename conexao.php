<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "padoca";
$conexao = mysqli_connect($hostname,$user,$password,$database);

if (!$conexao){
    print "Falha na Conexão com o Banco de Dados";
}
