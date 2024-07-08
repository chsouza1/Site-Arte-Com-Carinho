<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo '<script>alert("Você precisa efetuar o login de ADMINISTRADOR para continuar!");</script>';
    echo '<script>window.location.href = "login_admin.php";</script>';
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arte_com_carinho";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_produto"])) {
    $id_produto = $_POST["id_produto"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    $imagem = $_FILES["imagem"]["name"];

    if (!empty($imagem)) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($imagem);
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

        $sql = "UPDATE produtos SET nome=?, descricao=?, preco=?, categoria=?, imagem=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdssi", $nome, $descricao, $preco, $categoria, $imagem, $id_produto);
    } else {
        $sql = "UPDATE produtos SET nome=?, descricao=?, preco=?, categoria=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsi", $nome, $descricao, $preco, $categoria, $id_produto);
    }

    if ($stmt->execute()) {
        echo '<script>alert("Produto atualizado com sucesso."); window.location.href = "admin.php";</script>';
    } else {
        echo "Erro ao atualizar produto: " . $conn->error;
    }

    $stmt->close();
} else {
    if (!isset($_GET["id"])) {
        echo "Form not submitted or ID not set.";
        exit;
    }

    $id_produto = $_GET["id"];
    $sql = "SELECT nome, descricao, preco, categoria, imagem FROM produtos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produto);
    $stmt->execute();
    $stmt->bind_result($nome, $descricao, $preco, $categoria, $imagem);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-container">
    <h2>Editar Produto</h2>

    <form class="w3-container" method="post" action="edit_produto.php" enctype="multipart/form-data">
        <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">

        <label class="w3-text-blue"><b>Nome do Produto</b></label>
        <input class="w3-input w3-border" type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>

        <label class="w3-text-blue"><b>Descrição</b></label>
        <textarea class="w3-input w3-border" name="descricao" rows="4" required><?php echo htmlspecialchars($descricao); ?></textarea>

        <label class="w3-text-blue"><b>Preço</b></label>
        <input class="w3-input w3-border" type="number" name="preco" step="0.01" value="<?php echo htmlspecialchars($preco); ?>" required>

        <label class="w3-text-blue"><b>Imagem do Produto</b></label>
        <input class="w3-input w3-border" type="file" name="imagem" accept="image/*">
        <p>Imagem atual: <img src="img/<?php echo htmlspecialchars($imagem); ?>" alt="<?php echo htmlspecialchars($nome); ?>" style="max-width: 100px; height: auto;"></p>

        <label class="w3-text-blue"><b>Categoria</b></label>
        <select class="w3-select w3-border" name="categoria" required>
            <option value="" disabled>Escolha uma categoria</option>
            <option value="Toalha de Banho" <?php if ($categoria == "Toalha de Banho") echo "selected"; ?>>Toalha de Banho</option>
            <option value="Toalha de Rosto" <?php if ($categoria == "Toalha de Rosto") echo "selected"; ?>>Toalha de Rosto</option>
            <option value="Toalha de Capuz" <?php if ($categoria == "Toalha de Capuz") echo "selected"; ?>>Toalha de Capuz</option>
            <option value="Manta" <?php if ($categoria == "Manta") echo "selected"; ?>>Manta</option>
            <option value="Fralda de Boca" <?php if ($categoria == "Fralda de Boca") echo "selected"; ?>>Fralda de Boca</option>
            <option value="Necessaire" <?php if ($categoria == "Necessaire") echo "selected"; ?>>Necessaire</option>
            <option value="Toalha Fralda" <?php if ($categoria == "Toalha Fralda") echo "selected"; ?>>Toalha Fralda</option>
            <option value="Pano de Prato" <?php if ($categoria == "Pano de Prato") echo "selected"; ?>>Pano de Prato</option>
            <option value="Bolsa Maternidade" <?php if ($categoria == "Bolsa Maternidade") echo "selected"; ?>>Bolsa Maternidade</option>
            <option value="Saquino Maternidade" <?php if ($categoria == "Saquino Maternidade") echo "selected"; ?>>Saquino Maternidade</option>
            <option value="Porta Lenco Umedecido" <?php if ($categoria == "Porta Lenço Umedecido") echo "selected"; ?>>Porta Lenço Umedecido</option>
            <option value="Estojo" <?php if ($categoria == "Estojo") echo "selected"; ?>>Estojo</option>
            <option value="Cardeneta Vacinação" <?php if ($categoria == "Cardeneta Vacinação") echo "selected"; ?>>Cardeneta Vacinação</option>
            <option value="Naninhas" <?php if ($categoria == "Naninhas") echo "selected"; ?>>Naninhas</option>
            <option value="Mochila" <?php if ($categoria == "Mochila") echo "selected"; ?>>Mochila</option>
            <option value="Ninho" <?php if ($categoria == "Ninho") echo "selected"; ?>>Ninho</option>
            <option value="Bolsas" <?php if ($categoria == "Bolsas") echo "selected"; ?>>Bolsas Maternidade</option>
        </select>
        <button type="submit" class="w3-btn w3-blue w3-margin-top">Atualizar Produto</button>
    </form>
</div>
</body>
</html>
