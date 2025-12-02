<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site / EL</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20,147,220), rgb(17, 54, 71));
            text-align: center;
            color: white;
        }

        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
        }

        a {
            text-decoration: none;
            color: white;
            border: 2px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
            margin: 5px;
            display: inline-block;
        }

        a:hover {
            background-color: dodgerblue;
        }
    </style>
</head>
<body>

    <h1>Seja bem vindo</h1>
    <h2>Projeto by Enzo Lanius</h2>

    <div class="box">
        <a href="tela-de-login.php">Login</a>
        <a href="formulario.php">Cadastre-se</a>
    </div>

</body>
</html>
