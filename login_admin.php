<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administração</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-container">
    <h2>Login - Administração</h2>

    <form class="w3-container" method="post" action="admin.php">
        <label class="w3-text-blue"><b>Usuário</b></label>
        <input class="w3-input w3-border" type="text" name="usuario" required>

        <label class="w3-text-blue"><b>Senha</b></label>
        <input class="w3-input w3-border" type="password" name="senha" required>

        <button type="submit" class="w3-btn w3-blue w3-margin-top">Entrar</button>
    </form>
</div>

</body>
</html>
