<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "padoca";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM USU WHERE US_CPF = :cpf AND US_SENHA = :senha";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location: login.php?success=Login bem-sucedido!");
        exit();
    } else {
        header("Location: login.php?error=CPF ou senha incorretos!");
        exit();
    }
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
?>
