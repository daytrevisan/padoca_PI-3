<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");
// entrada de formulário
$ficha = $_POST['c_ficha'];
$desc = $_POST['c_desc'];
$tipo = $_POST['c_tipo'];
$situacao = $_POST['c_situacao'];
// Valores Ficha
$vl_total=0;
$vl_acumulado=0;
$vl_acumulado = $vl_acumulado + $vl_total;

//Chamando banco de dados
   include("conexao.php");
   //selecionando o banco de dados
   $bd = mysqli_select_db($conexao, "padoca");

//parametros para imagem
$pasta='uploads';
$permitido=array('image/jpg','image/jpeg','image/pjpeg'); //extensões permitidas$img=$_FILES['img'];
$tmp=$img['tmp_name'];
$name=$img['name']; //nome da imagem;
$type=$img['type']; //tipo nativo do arquivo;
    include("conexao.php");
    mysqli_select_db($conexao,"padoca");
    require('funcao.php');
        $sql = "INSERT INTO pv1 VALUES (DEFAULT, '$ficha', '$desc', '$tipo', '$situacao', '$vl_total', '$vl_acumulado')";
        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-fichas.php");
mysqli_close($conexao);
?>