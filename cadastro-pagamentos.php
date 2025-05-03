<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");
// entrada de formulário
$ficha = $_POST['c_ficha'];
$forma = $_POST['c_forma'];
$valor = $_POST['c_valor'];
// Converter Data Atual
$cadastro = date('Y-m-d');

//Hora Atual
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
$hora = date("h:i:s", time());

//Chamando banco de dados
include("conexao.php");
//selecionando o banco de dados
$bd = mysqli_select_db($conexao, "padoca");

   // Busca Tipo da Ficha
   //fazendo a seleção da tabela
   $sql = "SELECT p1_tipo, p1_situacao, p1_vl_total, p1_vl_acumulado FROM pv1 WHERE p1_ficha = '".$ficha."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $tipo=$linha['p1_tipo']; // Resultado Pesquisa
           $situacao=$linha['p1_situacao']; 
           $vl_total=$linha['p1_vl_total']; 
           $vl_acumulado=$linha['p1_vl_acumulado']; 
       }
   }
   //Calcula Valor Pagamento (Valor Total) com base forma de pagamento
   if ($forma=="1-Dinheiro") {
       $troco=$valor-$vl_total;
   }else{
       $troco=0;
       $valor=$vl_total;
   }
   // Situacao Ficha
   $sit_ficha="1-Aberta";
   $sit_pagto="4-Pagamento";

   // Valor Acumulado da Ficha
   $total=0;

//parametros para imagem
$pasta='uploads';
$permitido=array('image/jpg','image/jpeg','image/pjpeg'); //extensões permitidas$img=$_FILES['img'];
$tmp=$img['tmp_name'];
$name=$img['name']; //nome da imagem;
$type=$img['type']; //tipo nativo do arquivo;
    include("conexao.php");
    mysqli_select_db($conexao,"padoca");
    require('funcao.php');
        $sql = "INSERT INTO pv4 VALUES (DEFAULT, '$ficha', '$tipo', '$sit_pagto', '$forma', '$vl_total', '$valor', '$troco', '$cadastro', '$hora')";
        $salvar = mysqli_query($conexao,$sql);
        // Atualiza Situacao Ficha de Consumo
        $sql = "UPDATE pv1 SET p1_situacao='".$sit_ficha."', p1_vl_total='".$total."' WHERE p1_ficha='".$ficha."' ";
        $salvar = mysqli_query($conexao,$sql);
        // Exclui Consumo da Ficha
        $sql = "DELETE pv3 WHERE p1_ficha='".$ficha."' ";
        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-pagamentos.php");
mysqli_close($conexao);
?>