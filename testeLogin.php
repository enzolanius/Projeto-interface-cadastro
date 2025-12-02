<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    include_once('config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta no banco
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' LIMIT 1";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        // Login correto
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        header('Location: sistema.php');
        exit();
    } else {
        // Login falhou
        header('Location: tela-de-login.php?erro=1');
        exit();
    }

} else {
    // Se os campos vierem vazios
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: tela-de-login.php?erro=campos_vazios');
    exit();
}
?>
