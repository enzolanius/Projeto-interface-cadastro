<?php

$dbhost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "formulario-enzo";

$conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_error) {
    die("❌ Erro ao conectar: " . $conexao->connect_error);
}


?>
