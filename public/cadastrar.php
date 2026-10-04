<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$quantidade_estoque = $_POST["quantidade_estoque"];
$data_validade = $_POST["data_validade"];

$sql = "INSERT INTO produto (nome, categoria, descricao, preco, quantidade_estoque, data_validade) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssdis", $nome, $categoria, $descricao, $preco, $quantidade_estoque, $data_validade);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

}

header("Location: ../index.php");
exit();
?>