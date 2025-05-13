<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");
// entrada de formulário
$roteiro = $_POST['c_roteiro'];
$descr = $_POST['c_descr'];
$oper = $_POST['c_oper'];
$trab = $_POST['c_trab'];
$arranjo = $_POST['c_arranjo'];
$custo = $_POST['c_custo'];

// Busca Descricao Operacao
   //Chamando banco de dados
   include("conexao.php");
   //selecionando o banco de dados
   $bd = mysqli_select_db($conexao, "padoca");
   //fazendo a seleção da tabela
   $sql = "SELECT g2_descricao FROM sg2 WHERE g2_cod = '".$oper."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $descr_oper=$linha['g2_descricao']; // Resultado Pesquisa
       }
   }

//parametros para imagem
$pasta='uploads';
$permitido=array('image/jpg','image/jpeg','image/pjpeg'); //extensões permitidas$img=$_FILES['img'];
$tmp=$img['tmp_name'];
$name=$img['name']; //nome da imagem;
$type=$img['type']; //tipo nativo do arquivo;
    include("conexao.php");
    mysqli_select_db($conexao,"padoca");
    require('funcao.php');
        $sql = "INSERT INTO sg3 VALUES (DEFAULT, '$roteiro', '$descr', '$oper', '$descr_oper', '$trab', '$arranjo', '$custo')";
        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-roteiro.php");
mysqli_close($conexao);
?>