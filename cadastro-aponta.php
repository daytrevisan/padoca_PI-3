<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");
// entrada de formulário
$ordem = $_POST['c_ordem'];
$oper = $_POST['c_oper'];
$c_data_ini = $_POST['c_data_ini'];
$c_data_fim = $_POST['c_data_fim'];
$hora_ini = $_POST['c_hora_ini'];
$hora_fim = $_POST['c_hora_fim'];
$boas = $_POST['c_boas'];
$refugo = $_POST['c_refugo'];
$sucata = $_POST['c_sucata'];

// Converter as Datas
$data_ini = date('Y-m-d', strtotime($c_data_ini));
$data_fim = date('Y-m-d', strtotime($c_data_fim));

//Chamando banco de dados
   include("conexao.php");
   //selecionando o banco de dados
   $bd = mysqli_select_db($conexao, "padoca");

   // Busca Ordem Producao
   //fazendo a seleção da tabela
   $sql = "SELECT g5_prod FROM sg5 WHERE g5_ordem = '".$ordem."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $prod=$linha['g5_prod']; // Resultado Pesquisa
       }
   }
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
   // Busca Qtde.Ordem Producao (Boas, Refugo e Sucata)
   //fazendo a seleção da tabela
   $sql = "SELECT g5_qtd_planej, g5_qtd_boas, g5_qtd_refugo, g5_qtd_sucata FROM sg5 WHERE g5_ordem = '".$ordem."' ";
   //pegando os dados da tabela. Executando query
   $resultado = mysqli_query($conexao, $sql);
   // Verificar se existem resultados
   if ($resultado->num_rows > 0) {
       while ($linha = $resultado->fetch_assoc()) {
           $c_planej=$linha['g5_qtd_planej']; // Resultado Pesquisa
           $c_boas=$linha['g5_qtd_boas'];
           $c_refugo=$linha['g5_qtd_refugo'];
           $c_sucata=$linha['g5_qtd_sucata'];
       }
   }
//Calcula Qtde.apontamento (Boas, Refugo e Sucata)
$c_boas=$boas+$c_boas;
$c_refugo=$refugo+$c_refugo;
$c_sucata=$sucata+$c_sucata;
$c_saldo=$c_planej-($c_boas+$c_refugo+$c_sucata);

// Finalizar Ordem Producao
    if($c_saldo > 0){
        $c_situacao="3-Produção";
    }else{
        $c_situacao="5-Finalizada";
        $c_saldo=0;
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
        $sql = "INSERT INTO sg6 VALUES (DEFAULT, '$ordem', '$oper', '$descr_oper','$prod', '$descr_prod', '$data_ini', '$hora_ini', '$data_fim', '$hora_fim', '$boas', '$refugo', '$sucata')";
        $salvar = mysqli_query($conexao,$sql);
        // Atualiza Qtde(s) Ordem de Producao
        $sql = "UPDATE sg5 SET g5_situacao='".$c_situacao."', g5_qtd_boas='".$c_boas."', g5_qtd_refugo='".$c_refugo."', g5_qtd_sucata='".$c_sucata."', g5_qtd_saldo='".$c_saldo."' WHERE g5_ordem='".$ordem."' ";
        $salvar = mysqli_query($conexao,$sql);
        // Atualiza Saldo da Ordem de Producao
//        $sql = "UPDATE sg5 SET g5_qtd_saldo=g5_qtd_planej-(g5_qtd_boas+g5_qtd_refugo+g5_qtd_sucata) WHERE g5_ordem='".$ordem."' ";
//        $salvar = mysqli_query($conexao,$sql);
        header("Location:listar-aponta.php");
mysqli_close($conexao);
?>