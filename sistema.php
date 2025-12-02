<?php
session_start();

if ((!isset($_SESSION["email"]) == true) and (isset($_SESSION[""]) == true)) {
    header('Location: tela-de-login.php');
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: tela-de-login.php');
}

$logado = $_SESSION['email'];
$sql = 'SELECT * FROM usuarios ORDER BY id DESC';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema | Cadastro</title>

    <!-- Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        body{
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }

        header{
            text-align: center;
            padding: 25px 0 5px;
            font-size: 28px;
            font-weight: bold;
        }

        .logout{
            position: absolute;
            top: 20px;
            right: 25px;
            background: #e63946;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        .logout:hover{
            background: #b71c1c;
        }

        .welcome{
            text-align: center;
            font-size: 26px;
            margin-top: 10px;
        }

        .left-menu{
            position: absolute;
            top: 160px;
            left: 25px;
            width: 240px;
        }

        .left-menu a{
            display: block;
            background: rgba(255,255,255,0.15);
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            text-align: center;
        }

        .left-menu a:hover{
            background: rgba(255,255,255,0.3);
        }

        .right-menu{
            position: absolute;
            top: 160px;
            right: 25px;
            width: 240px;
        }

        .right-menu a{
            display: block;
            background: rgba(255,255,255,0.15);
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            text-align: center;
        }

        .right-menu a:hover{
            background: rgba(255,255,255,0.3);
        }

        /* Botão de perfil */
        .perfil-btn{
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            font-size: 28px;
            color: white;
            text-decoration: none;
            transition: 0.2s;
        }

        .perfil-btn:hover{
            background: rgba(255,255,255,0.35);
        }

        .footer-message{
            position: absolute;
            bottom: 40px;
            width: 100%;
            text-align: center;
            font-size: 20px;
            font-style: italic;
        }

    </style>

</head>

<body>

<header>Sistema de Cadastro</header>

<a href="sair.php" class="logout">Sair</a>

<div class="welcome">
    Bem vindo <u><?php echo $logado; ?></u>
</div>

<!-- MENU ESQUERDO -->
<div class="left-menu">
    <!-- AQUI ESTÁ A ALTERAÇÃO QUE VOCÊ PRECISAVA! -->
    <a href="novo-cadastro.php">Gerar novo cadastro</a>
    
    <a href="#">Visualizar fichas enviadas</a>
</div>

<!-- MENU DIREITO -->
<div class="right-menu">
    <a href="#" class="perfil-btn"><i class="fa-solid fa-user"></i></a>
    <a href="#">Cadastros pendentes</a>
    <a href="#">Cadastro finalizado</a>
</div>

<div class="footer-message">
    Nos siga nas redes sociais @egtech_t.i.
</div>

</body>
</html>
