<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuarios</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    
<div class="w3-container">
    <h2>Cadastro de Usuários</h2>
    <form class="w3-container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label class="w3-text-blue"><b>Nome</b></label>
        <input class="w3-input w3-border" type="text" name="nome" required>

        <label class="w3-text-blue"><b>Email</b></label>
        <input class="w3-input w3-border" type="email" name="email" required>

        <label class="w3-text-blue"><b>Senha</b></label>
        <input class="w3-input w3-border" type="password" name="senha" required>

        <button type="submit" class="w3-btn w3-blue w3-margin-top">Registrar</button>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = 'localhost';
    $username = "root";
    $password = "#Runeterra.7894@!";
    $dbname = "arte_com_carinho";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Usuário cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar usuário: " . $conn->error;
        }

        $conn->close();
    }
?>
</body>
</html>