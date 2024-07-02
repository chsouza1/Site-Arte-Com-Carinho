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
            <h1 class="container__titulo">Login Administrador</h1>
        </div>
    </header>

    <section class="Login">
        <h2 class="login__titulo">Faça login para acessar</h2>
        <form action="admin.html" method="post" class="login__formulario">
            <div class="login__campo">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="login__campo">
                <label for="senha">Senha:</label>
                <label for="password" id="senha" name="senha" required></label>
            </div>
            <button type="submit" class="login__botao">Entrar</button>
        </form>
    </section>
</body>
</html>