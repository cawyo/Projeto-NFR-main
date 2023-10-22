<?php
include 'conexao.php';

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT nome_usuario, senha FROM usuarios WHERE nome_usuario = ?";
$stmt = $conectar->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($dbUsername, $dbPassword);
$stmt->fetch();

if (password_verify($password, $dbPassword)) {
    header('location: home.php');
} else {
    echo "Usuário não cadastrado ou senha incorreta.";
}

$stmt->close();
$conectar->close();