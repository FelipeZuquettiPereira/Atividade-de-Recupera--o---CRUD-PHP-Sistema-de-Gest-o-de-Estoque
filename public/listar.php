<?php

include "../infra/conexao.php";
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
        <div>
            <h2>Produtos Cadastrados</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Descirção</th>
                        <th>Preço</th>
                        <th>Quantidade no Estoque</th>
                        <th>Data de Validade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($produto = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto["id"]); ?></td>
                            <td><?php echo htmlspecialchars($produto["nome"]); ?></td>
                            <td><?php echo htmlspecialchars($produto["categoria"]); ?></td>
                            <td><?php echo htmlspecialchars($produto["descricao"]); ?></td>
                            <td>R$ <?php echo number_format($produto["preco"], 2, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($produto["quantidade_estoque"]); ?></td>
                            <td><?php echo htmlspecialchars((new DateTime($produto["data_validade"]))->format('d/m/Y')); ?></td>


                            <td>
                                <a href="editar.php?id=<?php echo $produto["id"]; ?>">Editar</a>
                                <a href="excluir.php?id=<?php echo $produto["id"]; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="../index.php"><button>Voltar</button></a>

        </div>
    </main>
    <footer></footer>
</body>

</html>