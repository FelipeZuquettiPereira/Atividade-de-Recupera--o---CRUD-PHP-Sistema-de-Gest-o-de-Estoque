<?php

include "infra/conexao.php";
$result = mysqli_query($conexao, "SELECT * FROM produto");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Estoque</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Estoque</h1>
    </header>
    <main>
        <h2>Adicione um novo Produto!</h2>
        <form action="public/cadastrar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br>

            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" required>
                <option value="">Selecione uma categoria</option>
                <option value="limpeza">Limpeza</option>
                <option value="brinquedo">Brinquedo</option>
                <option value="esportivo">Esportivo</option>
            </select>
            <br>

            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
            <br>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>
            <br>

            <label for="quantidade_estoque">Quantidade no Estoque:</label>
            <input type="number" id="quantidade_estoque" name="quantidade_estoque" required>
            <br>

            <label for="data_validade">Data de Validade:</label>
            <input type="date" id="data_validade" name="data_validade" required>
            <br>

            <button type="submit">Cadastrar</button>
            
        </form>
            <a href="public/listar.php"><Button>Listar Produtos</Button></a>
    </main>
    <footer></footer>
</body>

</html>