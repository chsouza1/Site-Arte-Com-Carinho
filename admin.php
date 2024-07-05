<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "arte_com_carinho";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
    $conn->close();
}

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo '<script>alert("Você precisa efetuar o login de ADMINISTRADOR para continuar!");</script>';
    echo '<script>window.location.href = "login_admin.php";</script>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Produtos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
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
            <option value="Toalha de Boca">Toalha de Boca</option>
            <option value="Toalha de Banho">Toalha de Banho</option>
            <option value="Toalha de Rosto">Toalha de Rosto</option>
            <option value="Toalha de Capuz">Toalha de Capuz</option>
            <option value="Manta">Manta</option>
            <option value="Ninho">Ninho</option>
        </select>

        <button type="submit" class="w3-btn w3-blue w3-margin-top">Adicionar Produto</button>
    </form>

    <hr>

    <h3>Produtos existentes</h3>
    <div class="w3-row-padding">
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "arte_com_carinho";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        $sql = "SELECT id, nome, descricao, preco, categoria, imagem FROM produtos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="w3-third w3-margin-bottom">
                        <div class="w3-card-4">
                            <img src="img/' . $row["imagem"] . '" alt="' . $row["nome"] . '" style="max-width: 100%; height: auto;">
                            <div class="w3-container">
                                <h3>' . $row["nome"] . '</h3>';
                                echo '<p>' . $row["descricao"] . '</p>';
                                echo '<p>R$ ' . number_format($row["preco"], 2, ',', '.') . '</p>';
                                echo '<p>Categoria: ' . $row["categoria"] . '</p>';
                                echo '<p><a href="remove_produto.php?id=' . $row["id"] . '" class="w3-btn w3-red">Remover</a></p>';
                            echo '</div>
                        </div>
                      </div>';
            }
        } else {
            echo '<p>Nenhum produto encontrado.</p>';
        }

        $conn->close();
    }   
        ?>
    </div>
</div>
</body>
</html>
