<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "nfr";


$conectar = mysqli_connect($server,$user,$password,$database);

if ($conectar->connect_error) {
    die("Falha na conexão: " . $conectar->connect_error);
}
