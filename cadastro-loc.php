<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");

//entrada de formulário
$nm_local = $_POST['c_local'];
$st_local = $_POST['c_setor'];
$ds_local = $_POST['c_desc'];

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

        $sql = "INSERT INTO tb_local VALUES (DEFAULT, '$nm_local', '$st_local', '$ds_local')";

        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-locais.php");
//    }else{
 //       echo "Extensão de arquivo não suportada";
 //   }
    
mysqli_close($conexao);
?>