<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo '<script>alert("Você precisa efetuar o login de ADMINISTRADOR para continuar!");</script>';
    echo '<script>window.location.href = "login_admin.php";</script>';
    exit;
}

$servername = "localhost";
$username = "root";
$password = "#Runeterra.7894@!";
$dbname = "arte_com_carinho";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"])) {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    $imagem = $_FILES["imagem"]["name"];

    $target_dir = "img/";
    $target_file = $target_dir . basename($imagem);
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

    $sql = "INSERT INTO produtos (nome, descricao, preco, categoria, imagem) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdss", $nome, $descricao, $preco, $categoria, $imagem);

    if ($stmt->execute()) {
        echo "Produto adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar produto: " . $conn->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Produtos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="style.css">
</head>
<style>

</style>
<body>

<div class="w3-container">
    <h2>Administração de Produtos</h2>

    <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>!</p>
    <p><a href="logout_admin.php" class="w3-btn w3-red">Sair</a></p>

    <!-- Formulário para adicionar produto -->
    <form class="w3-container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label class="w3-text-blue"><b>Nome do Produto</b></label>
        <input class="w3-input w3-border" type="text" name="nome" required>

        <label class="w3-text-blue"><b>Descrição</b></label>
        <textarea class="w3-input w3-border" name="descricao" rows="4" required></textarea>

        <label class="w3-text-blue"><b>Preço</b></label>
        <input class="w3-input w3-border" type="number" name="preco" step="0.01" required>

        <label class="w3-text-blue"><b>Imagem do Produto</b></label>
        <input class="w3-input w3-border" type="file" name="imagem" accept="image/*" required>
        
        <label class="w3-text-blue"><b>Categoria</b></label>
        <select class="w3-select w3-border" name="categoria" required>
            <option value="" disabled selected>Escolha uma categoria</option>
            <option value="Toalha de Banho">Toalha de Banho</option>
            <option value="Toalha de Rosto">Toalha de Rosto</option>
            <option value="Toalha de Capuz">Toalha de Capuz</option>
            <option value="Manta">Manta</option>
            <option value="Fralda de Boca">Fralda de Boca</option>
            <option value="Necessaire">Necessaire</option>
            <option value="Toalha Fralda">Toalha Fralda</option>
            <option value="Pano de Prato">Pano de Prato</option>
            <option value="Bolsa Maternidade">Bolsa Maternidade</option>
            <option value="Saquino Maternidade">Saquino Maternidade</option>
            <option value="Porta Lenco Umedecido">Porta Lenço Umedecido</option>
            <option value="Estojo">Estojo</option>
            <option value="Cardeneta Vacinação">Cardeneta Vacinação</option>
            <option value="Naninhas">Naninhas</option>
            <option value="Mochila">Mochila</option>
            <option value="Ninho">Ninho</option>
            <option value="Bolsas">Bolsas Maternidade</option>
        </select>

        <button type="submit" class="w3-btn w3-blue w3-margin-top">Adicionar Produto</button>
    </form>

    <hr>

    <h3>Produtos existentes</h3>
    <div class="w3-row-padding">
        <?php
        $sql = "SELECT categoria, id, nome, descricao, preco, imagem FROM produtos ORDER BY categoria";
        $result = $conn->query($sql);

        $current_category = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["categoria"] != $current_category) {
                    if ($current_category != "") {
                        echo '</div>';
                    }
                    $current_category = $row["categoria"];
                    echo '<h4>' . $current_category . '</h4>';
                    echo '<div class="w3-row-padding">';
                }
                echo '<div class="w3-third w3-margin-bottom product-card">
                        <div class="w3-card-4">
                            <img src="img/' . $row["imagem"] . '" alt="' . $row["nome"] . '">
                            <div class="w3-container">
                                <h3>' . $row["nome"] . '</h3>';
                                echo '<p>' . $row["descricao"] . '</p>';
                                echo '<p>R$ ' . number_format($row["preco"], 2, ',', '.') . '</p>';
                                echo '<p><a href="edit_produto.php?id=' . $row["id"] . '" class="w3-btn w3-green">Editar</a> <a href="remove_produto.php?id=' . $row["id"] . '" class="w3-btn w3-red">Remover</a></p>';
                            echo '</div>
                        </div>
                      </div>';
            }
            echo '</div>'; // Fecha a última categoria
        } else {
            echo '<p>Nenhum produto encontrado.</p>';
        }

        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
