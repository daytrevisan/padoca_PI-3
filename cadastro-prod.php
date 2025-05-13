<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");

//entrada de formulário
$nm_cod = $_POST['c_cod'];
$nm_produto = $_POST['c_nome'];
$unid_med = $_POST['c_um'];
$qtde_produto = $_POST['c_qtde'];
$valor_produto = $_POST['c_valor'];
$tipo_produto =$_POST['c_tipo']; 
$ds_produto = $_POST['c_desc'];
// Valor Unitario Produto
$vl_unit = $valor_produto/$qtde_produto;

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

        $sql = "INSERT INTO tb_produto VALUES (DEFAULT, '$nm_cod', '$nm_produto', '$ds_produto','$nome','$unid_med','$qtde_produto','$vl_unit','$valor_produto','$tipo_produto')";

        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-produtos.php");
//    }else{
 //       echo "Extensão de arquivo não suportada";
 //   }
    
mysqli_close($conexao);
?>