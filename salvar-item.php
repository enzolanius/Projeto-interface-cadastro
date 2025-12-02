<?php
require_once("config.php");

// Verifica se foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $descricao       = $_POST["descricao"];
    $ean             = $_POST["ean"];
    $ncm             = $_POST["ncm"];
    $cest            = $_POST["cest"];
    $tipo_caixa      = $_POST["tipo_caixa"];
    $codigo_interno  = $_POST["codigo_interno"];
    $custo           = $_POST["custo"];

    // SQL com todos os campos correspondentes
    $sql = "INSERT INTO cadastros_pendentes 
            (descricao, ean, ncm, cest, tipo_caixa, codigo_interno, custo)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        die("Erro ao preparar SQL: " . $conexao->error);
    }

    $stmt->bind_param(
        "ssssisd",
        $descricao,
        $ean,
        $ncm,
        $cest,
        $tipo_caixa,
        $codigo_interno,
        $custo
    );

    if ($stmt->execute()) {
        header("Location: novo-cadastro.php?salvo=1");
        exit;
    } else {
        die("Erro ao executar: " . $stmt->error);
    }

} else {
    echo "Método inválido.";
}
?>
