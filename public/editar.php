<?php

include "../infra/conexao.php";

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

$stmt = mysqli_prepare($conexao, "SELECT * FROM produto WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$result = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Estoque</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Estoque</h1>
    </header>
    <main>
        <h2>Editando o Produto: <?php echo htmlspecialchars($result["nome"] ?? ""); ?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($result["id"] ?? ""); ?>" required>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($result["nome"] ?? ""); ?>">
            <br>

            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" required>
                <option value="<?php echo htmlspecialchars($result["categoria"] ?? ""); ?>"><?php echo htmlspecialchars($result["categoria"] ?? ""); ?></option>
                <option value="limpeza">Limpeza</option>
                <option value="brinquedo">Brinquedo</option>
                <option value="esportivo">Esportivo</option>
            </select>
            <br>

            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" value="<?php echo htmlspecialchars($result["descricao"] ?? ""); ?>">
            <br>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" value="<?php echo htmlspecialchars($result["preco"] ?? ""); ?>">
            <br>

            <label for="quantidade_estoque">Quantidade no Estoque:</label>
            <input type="number" id="quantidade_estoque" name="quantidade_estoque" value="<?php echo htmlspecialchars($result["quantidade_estoque"] ?? ""); ?>">
            <br>

            <label for="data_validade">Data de Validade:</label>
            <input type="date" id="data_validade" name="data_validade" value="<?php echo (!empty($result['data_validade'])) ? htmlspecialchars((new DateTime($result['data_validade']))->format('Y-m-d')) : ''; ?>">
            <br>

            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>

</body>

</html>