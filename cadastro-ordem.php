<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");
// entrada de formulário
$ordem = $_POST['c_ordem'];
$situacao = $_POST['c_situacao'];
$tipo = $_POST['c_tipo'];
$prod = $_POST['c_prod'];
$pai = $_POST['c_pai'];
$c_entrega = $_POST['c_entrega'];
$c_libera = $_POST['c_libera'];
$planejada = $_POST['c_planejada'];
$roteiro = $_POST['c_roteiro'];
$bx_comp = $_POST['c_bx_comp'];
$apon_oper = $_POST['c_apon_oper'];
// Saldo da Ordem Producao
$boas=0;
$refugo=0;
$sucata=0;
$saldo = $planejada - ($boas + $refugo + $sucata);

// Converter as Datas
$entrega = date('Y-m-d', strtotime($c_entrega));
$libera = date('Y-m-d', strtotime($c_libera));

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
// Busca Descricao Produto Pai
   //fazendo a seleção da tabela
   $sql = "SELECT nm_produto FROM tb_produto WHERE cc_cod = '".$pai."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $descr_pai=$linha['nm_produto']; // Resultado Pesquisa
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
        $sql = "INSERT INTO sg5 VALUES (DEFAULT, '$ordem', '$situacao', '$tipo', '$prod', '$descr_prod', '$pai', '$descr_pai', '$entrega', '$libera', '$planejada', '$boas', '$refugo', '$sucata', '$saldo', '$roteiro', '$bx_comp', '$apon_oper')";
        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-ordem.php");
mysqli_close($conexao);
?>