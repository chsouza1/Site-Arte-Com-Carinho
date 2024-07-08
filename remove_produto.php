<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "arte_bd";
$password = "";
$dbname = "arte_com_carinho";

// Verificar se foi enviado um ID via GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obter o ID do produto a ser removido
    $id = $_GET['id'];

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Preparar SQL para remover o produto
    $sql = "DELETE FROM produtos WHERE id = $id";

    // Executar SQL
    if ($conn->query($sql) === TRUE) {
        // Redirecionar de volta para a página admin.php após a remoção
        header("Location: admin.php");
        exit; // Certifique-se de sair após o redirecionamento
    } else {
        echo "Erro ao remover o produto: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID do produto não especificado.";
}
?>
