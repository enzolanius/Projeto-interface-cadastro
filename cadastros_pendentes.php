<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: tela-de-login.php");
    exit;
}

require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastros Pendentes</title>

<style>
    body{
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
        font-family: Arial, Helvetica, sans-serif;
        color: white;
    }

    h2{
        text-align: center;
        margin-top: 25px;
        font-size: 32px;
    }

    table{
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        background: rgba(0,0,0,0.25);
        border-radius: 12px;
        overflow: hidden;
    }

    th, td{
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    th{
        background: rgba(0,0,0,0.35);
        font-size: 18px;
    }

    tr:hover{
        background: rgba(255,255,255,0.1);
    }

    .back-btn{
        display: block;
        width: 200px;
        margin: 20px auto;
        text-align: center;
        padding: 12px;
        background: #1f6feb;
        color: white;
        font-size: 18px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
    }

    .back-btn:hover{
        background: #124fbd;
    }
</style>
</head>

<body>

<h2>Cadastros Pendentes</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>EAN</th>
        <th>NCM</th>
        <th>CEST</th>
        <th>Caixa/FD</th>
        <th>Cód. Interno</th>
        <th>Custo</th>
        <th>Data Envio</th>
        <th>Status</th>
    </tr>

    <?php
    $sql = "SELECT * FROM cadastros_pendentes ORDER BY id DESC";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "
            <tr>
                <td>".$linha['id']."</td>
                <td>".$linha['descricao']."</td>
                <td>".$linha['ean']."</td>
                <td>".$linha['ncm']."</td>
                <td>".$linha['cest']."</td>
                <td>".$linha['tipo_caixa']."</td>
                <td>".$linha['codigo_interno']."</td>
                <td>R$ ".number_format($linha['custo'], 2, ',', '.')."</td>
                <td>".$linha['data_envio']."</td>
                <td>".$linha['status']."</td>
            </tr>
            ";
        }
    } else {
        echo "
        <tr>
            <td colspan='10'>Nenhum cadastro pendente encontrado.</td>
        </tr>
        ";
    }
    ?>

</table>

<a href="home.php" class="back-btn">⬅ Voltar ao Menu</a>

</body>
</html>
