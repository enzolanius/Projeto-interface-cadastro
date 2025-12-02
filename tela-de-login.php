<?php
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se existe email cadastrado
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        // Confere senha (sem hash, igual seu cadastro atual)
        if ($user['senha'] === $senha) {

            // cria sessão
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_email'] = $user['email'];
            $_SESSION['usuario_nome'] = $user['razao_social'];

            // redireciona para painel
            header("Location: painel.php");
            exit;

        } else {
            echo "<script>alert('Senha incorreta!');</script>";
        }

    } else {
        echo "<script>alert('Usuário não encontrado!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(45deg, cyan, yellow) ;
        }
        div {
            background-color: rgba(0,0,0, 0.8 );
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white
        }
        input {
            padding: 15px;
            border: none
        }
        .inputSubmit {
            background-color: deepskyblue;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div>
        <h1>Login</h1>

        <form action="testeLogin.php" method="post">

            <input type="text" name="email" placeholder="Email" required>
            <br><br>

            <input type="password" name="senha" placeholder="Senha" required>   
            <br><br>

            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
