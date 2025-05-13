<?php

class Dao { 
    private $dsn='mysql:host=192.168.8.211;dbname=feirafacil';
<<<<<<< HEAD
    private $usuario='root';
    private $senha=''; 
=======
    private $usuario='feirafacil';
    private $senha='feirafacil'; 
>>>>>>> e2ed1594ba48575d6222c64f597cb1aa4db01c8e
    private $pdo; 

public function __construct(){

    $this->pdo = new PDO($this->dsn, $this->usuario, $this->senha);
}

public function listaUsuarios(){
$resultado = $this->pdo->query("Select * from feirante");
return $resultado;
}

public function cadastrarUsuario($usuario,$senha){
    $this->pdo->query("insert into feirante values ('$usuario', '$senha') ");
}

public function verificaUsuario($usuario,$senha){
 $stmt = $this->pdo->query("select * from feirante where usuario='$usuario' and senha='$senha'");
 $resultado = $stmt->fetch();
 return $resultado;
}

public function inserirUsuario($usuario,$senha){
    $stmt = $this->pdo->query("insert into feirante values('$usuario','$senha')");
    $resultado = $stmt->execute();
    return $resultado; 
}

}