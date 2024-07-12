<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    
<div class="w3-container">
    <form class="w3-container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label class="w3-text-blue"><b>Email</b></label>
            <input class="w3-input w3-border" type="email" name="email" required>

            <label class="w3-text-blue"><b>Senha</b></label>
            <input class="w3-input w3-border" type="password" name="senha" required>

            <button type="submit" class="w3-btn w3-blue w3-margin-top">Entrar</button>
            <button type="enter" class="w3-btn w3-blue w3-margin-top">Ainda nao tem uma conta? <a href="register.php">Cadastre-se aqui</a></button>

    </form>
</div>
    <p class="w3-text-red"><?php echo $login_err ?? ''; ?></p>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = 'localhost';
    $username = "root";
    $password = "#Runeterra.7894@!";
    $dbname = "arte_com_carinho";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["nome"] = $row["nome"];
            header("Location: perfil.php");
        } else {
            echo "<p>Senha incorreta. Tente Novamente</p>";
        }
} else {
    echo "<p>Usuario não encontrado.</p>";
}

$conn->close();
}
?>

</body>
</html>