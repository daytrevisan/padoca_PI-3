<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");
// entrada de formulário
$prod = $_POST['c_prod'];
$preco = $_POST['c_preco'];
$familia = $_POST['c_familia'];
$c_validade = $_POST['c_validade'];

// Converter as Datas
$validade = date('Y-m-d', strtotime($c_validade));
$cadastro = date('Y-m-d');

//Chamando banco de dados
   include("conexao.php");
   //selecionando o banco de dados
   $bd = mysqli_select_db($conexao, "padoca");

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
   //parametros para imagem
$pasta='uploads';
$permitido=array('image/jpg','image/jpeg','image/pjpeg'); //extensões permitidas$img=$_FILES['img'];
$tmp=$img['tmp_name'];
$name=$img['name']; //nome da imagem;
$type=$img['type']; //tipo nativo do arquivo;
    include("conexao.php");
    mysqli_select_db($conexao,"padoca");
    require('funcao.php');
        $sql = "INSERT INTO pv2 VALUES (DEFAULT, '$prod', '$descr_prod', '$um_prod', '$preco', '$familia', '$validade', '$cadastro')";
        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-preco.php");
mysqli_close($conexao);
?>