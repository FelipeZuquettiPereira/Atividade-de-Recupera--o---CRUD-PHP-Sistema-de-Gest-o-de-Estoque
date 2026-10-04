<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = (int)($_POST["id"] ?? 0);
    $nome = $_POST["nome"] ?? "";
    $categoria = $_POST["categoria"] ?? "";
    $descricao = $_POST["descricao"] ?? "";
    $preco = (float)($_POST["preco"] ?? 0);
    $quantidade_estoque = (int)($_POST["quantidade_estoque"] ?? 0);
    $data_validade = $_POST["data_validade"] ?? "";

    if ($id > 0) {
        $sql = "UPDATE produto SET nome = ?, categoria = ?, descricao = ?, preco = ?, quantidade_estoque = ?, data_validade = ? WHERE id = ?";
        $stmt = mysqli_prepare($conexao, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssdisi", $nome, $categoria, $descricao, $preco, $quantidade_estoque, $data_validade, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

header("Location: listar.php");
exit();
?>