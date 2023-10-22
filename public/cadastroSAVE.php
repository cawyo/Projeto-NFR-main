<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome_usuario, senha, email) VALUES (?, ?, ?)";
    $stmt = $conectar->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Registro com sucesso!');</script>";
        echo "<script> location.href='login.php';</script>";
    } else {
        echo "<script>alert('Erro: " . $conectar->error . "');</script>";
    }
    $stmt->close();
}

$conectar->close();