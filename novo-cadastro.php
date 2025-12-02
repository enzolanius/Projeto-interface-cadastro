<?php
session_start();
if(!isset($_SESSION["email"])){
    header("Location: tela-de-login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Novo Cadastro de Item</title>

<style>
    body{
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
        font-family: Arial, Helvetica, sans-serif;
        color: white;
    }

    .container{
        width: 500px;
        margin: 40px auto;
        background: rgba(0,0,0,0.25);
        padding: 25px;
        border-radius: 15px;
    }

    h2{
        text-align: center;
        margin-bottom: 20px;
    }

    label{
        font-size: 18px;
    }

    input, select{
        width: 100%;
        padding: 10px;
        margin: 8px 0 15px 0;
        border-radius: 8px;
        border: none;
    }

    button{
        width: 100%;
        padding: 12px;
        background: #1f6feb;
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 18px;
        cursor: pointer;
        margin-top: 10px;
        font-weight: bold;
    }

    button:hover{
        background: #124fbd;
    }

    .back{
        display: block;
        text-align: center;
        margin-top: 15px;
        text-decoration: none;
        color: white;
        font-size: 18px;
    }
</style>
</head>

<body>

<div class="container">
    <h2>Novo Cadastro de Item</h2>

    <form action="salvar_item.php" method="POST">

        <label>Descrição:</label>
        <input type="text" name="descricao" required>

        <label>EAN (8 a 13 dígitos):</label>
        <input type="text" name="ean" pattern="\d{8,13}" required>

        <label>NCM:</label>
        <input type="text" name="ncm" required>

        <label>CEST:</label>
        <input type="text" name="cest" required>

        <label>Caixa/FD (1 a 48):</label>
        <select name="tipo_caixa" required>
            <?php for($i=1; $i<=48; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select>

        <label>Código Interno:</label>
        <input type="text" name="codigo_interno" required>

        <label>Custo Unitário:</label>
        <input type="number" name="custo" step="0.01" required>

        <button type="submit">Salvar Cadastro</button>
    </form>

    <a href="home.php" class="back">⬅ Voltar ao menu</a>
</div>

</body>
</html>
