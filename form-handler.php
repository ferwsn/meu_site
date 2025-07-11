<?php
$host = "localhost";
$db = "meu_site";
$user = "consulta";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$data = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO formulario (nome, sobrenome, email, mensagem, data) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $sobrenome, $email, $mensagem, $data);

if ($stmt->execute()) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro ao enviar dados:" . $stmt->error;
}

$stmt->close();
$conn->close();
?>