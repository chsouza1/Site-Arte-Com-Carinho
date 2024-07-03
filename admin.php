<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_correto = 'administrador';
    $senha_correta = 'Bol@d&s@b@o.2024';

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario === $usuario_correto && $senha === $senha_correta) {
        $_SESSION["loggedin"] = true;
        $_SESSION["usuario"] = $usuario;

        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !==true) {
            header("location: admin.php");
            exit;
        }
    } else {
        echo '<div class="w3-container">';
        echo '<p class="w3-text-red">Usuário ou senha incorretos.</p>';
        echo '</div>';  
    }
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

    <!-- Formulário para adicionar produto -->
    <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>!</p>
    <p><a href="logout_admin.php" class="w3-btn w3-red">Sair</a></p>
    <form class="w3-container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label class="w3-text-blue"><b>Nome do Produto</b></label>
        <input class="w3-input w3-border" type="text" name="nome" required>

        <label class="w3-text-blue"><b>Descrição</b></label>
        <textarea class="w3-input w3-border" name="descricao" rows="4" required></textarea>

        <label class="w3-text-blue"><b>Preço</b></label>
        <input class="w3-input w3-border" type="number" name="preco" step="0.01" required>

        <label class="w3-text-blue"><b>Imagem do Produto</b></label>
        <input class="w3-input w3-border" type="file" name="imagem" accept="image/*" required>

        <button type="submit" class="w3-btn w3-blue w3-margin-top">Adicionar Produto</button>
    </form>

    <hr>

    <h3>Produtos existentes</h3>
    <div class="w3-row-padding">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "arte_com_carinho";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para obter produtos
        $sql = "SELECT id, nome, descricao, preco, imagem FROM produtos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir produtos em cards
            while ($row = $result->fetch_assoc()) {
                echo '<div class="w3-third w3-margin-bottom">
                        <div class="w3-card-4">
                            <img src="img/' . $row["imagem"] . '" alt="' . $row["nome"] . '" style="max-width: 100%; height: auto;">
                            <div class="w3-container">
                                <h3>' . $row["nome"] . '</h3>
                                <p>' . $row["descricao"] . '</p>
                                <p>R$ ' . number_format($row["preco"], 2, ',', '.') . '</p>
                                <p><a href="remove_produto.php?id=' . $row["id"] . '" class="w3-btn w3-red">Remover</a></p>
                            </div>
                        </div>
                      </div>';
            }
        } else {
            echo '<p>Nenhum produto encontrado.</p>';
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
