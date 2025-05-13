<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "padoca";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Check connection
    // if (!$conn) {
    // die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully";

    // Dados a serem inseridos no banco de dados

    // Dados a serem inseridos no banco de dados
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    
    $sql = "INSERT INTO USU (US_NOME, US_EMAIL, US_CPF, US_SENHA) VALUES (:nome, :email, :cpf, :senha)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':senha', $senha);

    $stmt->execute();
    // aqui em baixo ser para mostar se foi cadastrado com sucesso ou falar que deu erro
    // na pare echo "falha na conexão: " . $e->getMessage();" apartir de " . $e->getMessage();"  mostra qual o tipo de erro na execução do codigo, 
    //não é legal o usuario saber mas para resolver isso é apenas remover essa linha ". $e->getMessage();"
    header("Location: cadastre-se.php?success=Cadastro bem-sucedido!");
    exit();
} catch (PDOException $e) {
    header("Location: cadastre-se.php?error=Falha ao cadastrar: " . $e->getMessage());
    exit();
}
?>