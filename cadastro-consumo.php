<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");
// entrada de formulário
$ficha = $_POST['c_ficha'];
$prod = $_POST['c_prod'];
$qtde = $_POST['c_qtde'];
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
   $sql = "SELECT p1_tipo, p1_vl_total FROM pv1 WHERE p1_ficha = '".$ficha."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $tipo=$linha['p1_tipo']; // Resultado Pesquisa
           $vl_total=$linha['p1_vl_total']; // Resultado Pesquisa
       }
   }
   // Busca Descricao Produto e UM
   //fazendo a seleção da tabela
   $sql = "SELECT nm_produto, um_produto FROM tb_produto WHERE cc_cod = '".$prod."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $descr_prod=$linha['nm_produto']; // Resultado Pesquisa
           $um_prod=$linha['um_produto']; 
        }
   }
   // Busca Preco do Produto
   //fazendo a seleção da tabela
   $sql = "SELECT p2_preco FROM pv2 WHERE p2_prod = '".$prod."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $preco=$linha['p2_preco']; // Resultado Pesquisa
        }
   }
   //Calcula Qtde.pelo Preco (Valor Total)
   $total=$qtde*$preco;
   $vl_total=$vl_total+$total;
   // Situacao Ficha
   $sit_ficha="2-Em-Consumo";

//parametros para imagem
$pasta='uploads';
$permitido=array('image/jpg','image/jpeg','image/pjpeg'); //extensões permitidas$img=$_FILES['img'];
$tmp=$img['tmp_name'];
$name=$img['name']; //nome da imagem;
$type=$img['type']; //tipo nativo do arquivo;
    include("conexao.php");
    mysqli_select_db($conexao,"padoca");
    require('funcao.php');
        $sql = "INSERT INTO pv3 VALUES (DEFAULT, '$tipo', '$ficha', '$prod', '$descr_prod', '$um_prod', '$qtde', '$preco', '$total', '$cadastro', '$hora')";
        $salvar = mysqli_query($conexao,$sql);
        // Atualiza Movimento de Consumo
        $sql = "INSERT INTO pv5 VALUES (DEFAULT, '$tipo', '$ficha', '$prod', '$descr_prod', '$um_prod', '$qtde', '$preco', '$total', '$cadastro', '$hora')";
        $salvar = mysqli_query($conexao,$sql);
        // Atualiza Situacao Ficha de Consumo
        $sql = "UPDATE pv1 SET p1_situacao='".$sit_ficha."', p1_vl_total='".$vl_total."' WHERE p1_ficha='".$ficha."' ";
        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-consumo.php");
mysqli_close($conexao);
?>