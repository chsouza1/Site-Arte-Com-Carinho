<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container">
    <h2>Bem-vindo, <?php echo $_SESSION["nome"]; ?></h2>
    <p><a href="logout.php">Sair</a></p> 
    </div>
</body>
</html>