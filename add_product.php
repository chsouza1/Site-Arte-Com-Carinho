<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "arte_bd";
$password = "";
$dbname = "arte_com_carinho";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $imagem = $_FILES["imagem"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($imagem);

    // Verifica se o arquivo de imagem foi enviado corretamente
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
        // Move o arquivo de imagem para o diretório de uploads
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            // Insere os dados do produto no banco de dados
            $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES ('$nome', '$descricao', '$preco', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "Produto adicionado com sucesso!";
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Nenhum arquivo de imagem enviado ou houve um erro no envio.";
    }
}

$conn->close();
?>
