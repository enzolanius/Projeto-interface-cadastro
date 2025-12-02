<?php
if (isset($_POST['submit'])) {

    include_once('config.php');

    $razao_social = $_POST['razao_social'];
    $cnpj         = $_POST['cnpj'];
    $email        = $_POST['email'];
    $telefone     = $_POST['telefone'];
    $endereco     = $_POST['endereco'];
    $senha        = $_POST['senha'];

    // 🔥 1. Verifica se o e-mail já existe
    $checkEmail = mysqli_query($conexao, "SELECT id FROM usuarios WHERE email = '$email' LIMIT 1");

    if (mysqli_num_rows($checkEmail) > 0) {
        echo "<script>alert('E-mail já cadastrado!'); window.history.back();</script>";
        exit;
    }

    // 🔥 2. Verifica se o CNPJ já existe
    $checkCnpj = mysqli_query($conexao, "SELECT id FROM usuarios WHERE cnpj = '$cnpj' LIMIT 1");

    if (mysqli_num_rows($checkCnpj) > 0) {
        echo "<script>alert('CNPJ já cadastrado!'); window.history.back();</script>";
        exit;
    }

    // 🔥 3. Faz o INSERT com segurança básica
    $sql = "INSERT INTO usuarios 
            (razao_social, cnpj, email, telefone, endereco, senha)
            VALUES 
            ('$razao_social', '$cnpj', '$email', '$telefone', '$endereco', '$senha')";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location='tela-de-login.php';</script>";
        exit;
    } else {
        echo "Erro ao inserir: " . mysqli_error($conexao);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulário | GN</title>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    height: 100vh;
    margin: 0;
}
.box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.8);
    padding: 24px;
    border-radius: 8px;
}
fieldset {
    border: 3px solid dodgerblue;
    border-radius: 10px;
    padding: 20px;
    color: white;
}
/* input container */
.inputBox {
    position: relative;
    width: 320px;
    margin-bottom: 1.25rem;
}
.inputUser {
    background: none;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    color: white;
    font-size: 15px;
    width: 100%;
    padding: 12px 0 6px 0;
    letter-spacing: 0.5px;
}
.labelInput {
    position: absolute;
    left: 0;
    top: 12px;
    color: #ddd;
    pointer-events: none;
    transition: top .18s ease, font-size .18s ease, color .18s ease;
}
/* When the input is focused OR has content (valid), move label up 20px */
.inputUser:focus + .labelInput,
.inputUser:valid + .labelInput {
    top: -8px;
    font-size: 12px;
    color: dodgerblue;
}
/* submit button styling (optional) */
input[type="submit"] {
    background: dodgerblue;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 4px;
    cursor: pointer;
}
#submit {
    background-image: linear-gradient(to right, rgb(0, 147, 220), rgb(17, 54, 71));
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;
}
#submit:hover {
    background-image: linear-gradient(to right, rgb(0, 87, 130), rgb(7, 24, 34));
}
</style>
</head>
<body>
<a href="home.php">Voltar</a>

<div class="box">
    <form action="Formulario.php" method="post">
        <fieldset>
            <legend><b>Formulário de Cadastro</b></legend>

            <div class="inputBox">
                <input type="text" name="razao_social" class="inputUser" required>
                <label class="labelInput">Razão social</label>
            </div>

            <div class="inputBox">
                <input type="text" name="cnpj" class="inputUser" required>
                <label class="labelInput">CNPJ</label>
            </div>

            <div class="inputBox">
                <input type="email" name="email" class="inputUser" required>
                <label class="labelInput">E-mail</label>
            </div>

            <div class="inputBox">
                <input type="tel" name="telefone" class="inputUser" required>
                <label class="labelInput">Telefone</label>
            </div>

            <div class="inputBox">
                <input type="text" name="endereco" class="inputUser" required>
                <label class="labelInput">Endereço</label>
            </div>

            <div class="inputBox">
                <input type="password" name="senha" class="inputUser" required>
                <label class="labelInput">Senha</label>
            </div>

            <input type="submit" name="submit" id="submit" value="Enviar">
        </fieldset>
    </form>
</div>

</body>
</html>
