<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");

//entrada de formulário
$cod = $_POST['c_cod'];
$comp = $_POST['c_comp'];
$seq = $_POST['c_seq'];
$qtde = $_POST['c_qtde'];
$perda = $_POST['c_perda'];
$lista = $_POST['c_lista'];
$qtde_horas = $_POST['c_qtde_horas'];

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

        $sql = "INSERT INTO sg1 VALUES (DEFAULT, '$cod', '$comp', '$seq', '$qtde', '$perda', '$lista', '$qtde_horas')";

        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-estr.php");
//    }else{
 //       echo "Extensão de arquivo não suportada";
 //   }
    
mysqli_close($conexao);
?>