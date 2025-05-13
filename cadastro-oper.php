<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");

//entrada de formulário
$c_cod = $_POST['c_cod'];
$c_descr = $_POST['c_descr'];
$c_compl = $_POST['c_compl'];

//parametros para imagem
$pasta='uploads';
$permitido=array('image/jpg','image/jpeg','image/pjpeg'); //extensões permitidas
$img=$_FILES['img'];
$tmp=$img['tmp_name'];
$name=$img['name']; //nome da imagem;
$type=$img['type']; //tipo nativo do arquivo;
    include("conexao.php");
    mysqli_select_db($conexao,"padoca");
    require('funcao.php');
//    if(!empty($name) && in_array($type, $permitido)){
//        $nome='img-'.'jpg';
//        upload($tmp,$nome,500,$pasta); //upload + conversão da img com 500px;

        $sql = "INSERT INTO sg2 VALUES (DEFAULT, '$c_cod', '$c_descr', '$c_compl')";

        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-operac.php");
//    }else{
 //       echo "Extensão de arquivo não suportada";
 //   }
    
mysqli_close($conexao);
?>