<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="cabecalho">
        <div class="container">
            <h1 class="container__titulo"> Área do Administrador</h1>
        </div>
    </header>
    <section class="admin">
        <h2 class="admin__titulo">Adicionar novo produto</h2>
        <form action="add_product.php" method="post" enctype="multipart/form-data" class="admin__formulario">
            <div class="admin__campo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="admin__campo">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" required></textarea>
            </div>
            <div class="admin__campo">
                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" step="0.01" required>
                </div>
                <div class="admin__campo">
                    <label for="imagem">Imagem:</label>
                    <input type="file" id="imagem" name="imagem" accept="image/*" required>
                </div>
                <button type="submit" class="admin__botao">Adicionar Produto</button>
        </form>
    </section>
</body>
</html>