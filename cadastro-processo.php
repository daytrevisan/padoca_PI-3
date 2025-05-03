<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");
// entrada de formulário
$prod = $_POST['c_prod'];
$roteiro = $_POST['c_roteiro'];
$oper = $_POST['c_oper'];
$tempo = $_POST['c_tempo'];
$valor = $_POST['c_valor'];
// Custo Operacao no Processo Fabricacao
$custo = $tempo * $valor;

//Chamando banco de dados
   include("conexao.php");
   //selecionando o banco de dados
   $bd = mysqli_select_db($conexao, "padoca");

// Busca Descricao Produto
   //fazendo a seleção da tabela
   $sql = "SELECT nm_produto FROM tb_produto WHERE cc_cod = '".$prod."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $descr_prod=$linha['nm_produto']; // Resultado Pesquisa
       }
   }
// Busca Descricao Operacao
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
        $sql = "INSERT INTO sg4 VALUES (DEFAULT, '$prod', '$descr_prod', '$roteiro', '$oper', '$descr_oper', '$tempo', '$valor', '$custo')";
        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-processo.php");
mysqli_close($conexao);
?>