<!--Criando segurança para não deixar que usuários entrem no sistema sem fazer login-->
<?php
// include("seguranca.php");

// INICIALIZAÇÃO DE VARIÁVEIS - IMPORTANTE!
// Inicializando todas as variáveis para evitar erros "undefined"
$tipo = "";
$situacao = "";
$vl_total = 0;
$vl_acumulado = 0;
$troco = 0;
$total = 0;
$sit_ficha = "1-Aberta";
$sit_pagto = "4-Pagamento";

// entrada de formulário
$ficha = isset($_POST['c_ficha']) ? $_POST['c_ficha'] : '';
$forma = isset($_POST['c_forma']) ? $_POST['c_forma'] : '';
$valor = isset($_POST['c_valor']) ? $_POST['c_valor'] : 0;

// Converter Data Atual
$cadastro = date('Y-m-d');

//Hora Atual
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
$hora = date("h:i:s", time());

//Chamando banco de dados - APENAS UMA VEZ
include("conexao.php");
//selecionando o banco de dados
$bd = mysqli_select_db($conexao, "padoca");

// Busca Tipo da Ficha
//fazendo a seleção da tabela
$sql = "SELECT p1_tipo, p1_situacao, p1_vl_total, p1_vl_acumulado FROM pv1 WHERE p1_ficha = '".$ficha."'";
//pegando os dados da tabela. Executando query
$resultado = mysqli_query($conexao, $sql);

// Verificar se existem resultados
if ($resultado && $resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $tipo = $linha['p1_tipo']; // Resultado Pesquisa
        $situacao = $linha['p1_situacao']; 
        $vl_total = $linha['p1_vl_total']; 
        $vl_acumulado = $linha['p1_vl_acumulado']; 
    }
}

//Calcula Valor Pagamento (Valor Total) com base forma de pagamento
if ($forma == "1-Dinheiro") {
    $troco = $valor - $vl_total;
} else {
    $troco = 0;
    $valor = $vl_total;
}

// REMOVER COMPLETAMENTE O CÓDIGO DE UPLOAD DE IMAGEM
// O código de upload de imagem foi completamente removido pois estava
// causando erros e não parece ser usado neste formulário

// NOTA: NÃO INCLUA novamente o arquivo conexao.php, pois já foi incluído acima
// require('funcao.php');  // Mantenha se realmente precisar desta funcionalidade

try {
    // Iniciar transação para garantir integridade dos dados
    mysqli_autocommit($conexao, FALSE);
    
    // 1. Inserir na tabela pv4
    $sql = "INSERT INTO pv4 VALUES (DEFAULT, '$ficha', '$tipo', '$sit_pagto', '$forma', '$vl_total', '$valor', '$troco', '$cadastro', '$hora')";
    $salvar = mysqli_query($conexao, $sql);
    
    if (!$salvar) {
        throw new Exception("Erro ao inserir na tabela pv4: " . mysqli_error($conexao));
    }
    
    // 2. Atualiza Situacao Ficha de Consumo
    $sql = "UPDATE pv1 SET p1_situacao = '$sit_ficha', p1_vl_total = '$total' WHERE p1_ficha = '$ficha'";
    $salvar = mysqli_query($conexao, $sql);
    
    if (!$salvar) {
        throw new Exception("Erro ao atualizar tabela pv1: " . mysqli_error($conexao));
    }
    
    // 3. Exclui Consumo da Ficha - CORREÇÃO DA SINTAXE SQL
    // IMPORTANTE: Verifique o nome correto da coluna que armazena o número da ficha
    // Substitua 'p3_ficha' pelo nome correto da coluna na tabela pv3
    $sql = "DELETE FROM pv3 WHERE p3_ficha = '$ficha'";
    $salvar = mysqli_query($conexao, $sql);
    
    if (!$salvar) {
        // Ao invés de lançar exceção, vamos debugar o erro
        echo "Erro ao excluir da tabela pv3: " . mysqli_error($conexao);
        // Se quiser ver a query que causou o erro:
        echo "<br>Query: " . $sql;
        mysqli_rollback($conexao);
        exit;
    }
    
    // Commit da transação se tudo ocorreu bem
    mysqli_commit($conexao);
    
    // Redirecionar para a página de listagem
    header("Location:listar-pagamentos.php");
    exit; // Sempre use exit após redirecionamentos
    
} catch (Exception $e) {
    // Em caso de erro, desfaz todas as operações
    mysqli_rollback($conexao);
    echo "Erro: " . $e->getMessage();
    exit;
}

mysqli_close($conexao);
?>