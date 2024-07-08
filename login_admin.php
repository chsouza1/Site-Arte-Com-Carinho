<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, usuario, senha FROM usuarios WHERE usuario = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $usuario, $hashed_password);
            if ($stmt->fetch()) {
                if (password_verify($senha, $hashed_password)) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $id;
                    $_SESSION['usuario'] = $usuario;
                    header("location: admin.php");
                } else {
                    echo "A senha que você inseriu não é válida.";
                }
            }
        } else {
            echo "Nenhuma conta encontrada com esse nome de usuário.";
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-container">
<h2>Login Administrador</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label class="w3-text-blue"><b>Usuário</b></label>
        <input class="w3-input w3-border" type="text" name="usuario" required>

        <label class="w3-text-blue"><b>Senha</b></label>
        <input class="w3-input w3-border" type="password" name="senha" required>

        <button type="submit" class="w3-btn w3-blue w3-margin-top">Login</button>
    </form>
    <p>Voltar ao menu Principal <a href="index.php">Voltar</a></p>
</div>
</body>
</html>
