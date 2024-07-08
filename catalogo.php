<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "arte_bd";
$password = "";
$dbname = "arte_com_carinho";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$categoria = $_GET['categoria'];

// Consulta SQL para obter produtos da categoria selecionada
$sql = "SELECT * FROM produtos WHERE categoria = '$categoria'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="produto">
            <img src="img/<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>" class="produto__imagem">
            <h3 class="produto__titulo"><?php echo $row['nome']; ?></h3>
            <p class="produto__descricao"><?php echo $row['descricao']; ?></p>
        </div>
        <?php
    }
} else {
    echo "Nenhum produto encontrado.";
}
$conn->close();
?>
