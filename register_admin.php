<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    // Verifica se o usuário já existe
    $sql = "SELECT id FROM usuarios WHERE usuario = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            echo "Este usuário já está registrado.";
        } else {
            // Insere o novo usuário
            $sql = "INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
                $stmt->bind_param("sss", $usuario, $hashed_password, $email);

                if ($stmt->execute()) {
                    echo "Registro realizado com sucesso.";
                    header("location: login_admin.php");
                } else {
                    echo "Algo deu errado. Tente novamente mais tarde.";
                }
            }
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
    <title>Registro de Administrador</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-container">
    <h2>Registro de Administrador</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label class="w3-text-blue"><b>Usuário</b></label>
        <input class="w3-input w3-border" type="text" name="usuario" required>

        <label class="w3-text-blue"><b>Email</b></label>
        <input class="w3-input w3-border" type="email" name="email" required>

        <label class="w3-text-blue"><b>Senha</b></label>
        <input class="w3-input w3-border" type="password" name="senha" required>

        <button type="submit" class="w3-btn w3-blue w3-margin-top">Registrar</button>
    </form>
</div>
</body>
</html>
