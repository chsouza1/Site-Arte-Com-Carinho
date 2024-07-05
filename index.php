<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arte Com Carinho</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="w3.css">
</head>
<body>
    <header class="cabecalho">
        <div class="container"> 
            <input type="checkbox" id="menu" class="container__botao">
            <label for="menu" class="container__rotulo">
                <span class="cabecalho__menu-hamburguer container__imagem"></span>
            </label>
            <img src="img/logoarte.jpg" alt="logo ArteComCarinho" width="80" height="80" class="container__imagem" >
            <h1 class="container__titulo"><b class="container__titulo--negrito">Arte</b> <span class="titulo__books">Com Carinho</span></h1>
        </div>
    </header>

    <section class="banner">
        <h2 class="banner__titulo">Já sabe por onde começar?</h2>
        <form method="GET" action="" class="banner__formulario">
            <input type="search" name="search" class="banner__pesquisa" placeholder="O que você deseja achar?">
            <button type="submit" class="banner__botao-pesquisa"></button>
        </form>
    </section>

    <section class="catalogo">
        <h2 class="catalogo__titulo">Nosso Catálogo de Produtos</h2>
        <div class="catalogo__botoes">
            <a href="?categoria=Toalha%20de%20Boca" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Toalha de Boca</a>
            <a href="?categoria=Toalha%20de%20Banho" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Toalha de Banho</a>
            <a href="?categoria=Toalha%20de%20Rosto" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Toalha de Rosto</a>
            <a href="?categoria=Toalha%20de%20Capuz" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Toalha de Capuz</a>
            <a href="?categoria=Manta" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Manta</a>
            <a href="?categoria=fralda%20%de%20boca" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Fralda de Boca</a>
            <a href="?categoria=Necessaire" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Necessaire</a>
            <a href="?categoria=Toalha%20Fralda" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Toalha Fralda</a>
            <a href="?categoria=Pano%20de%20Prato" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Pano de Prato</a>
            <a href="?categoria=Bolsa%20Maternidade" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Bolsa Maternidade</a>
            <a href="?categoria=Saquino%20Maternidade" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Saquino Maternidade</a>
            <a href="?categoria=Porta%20lenco%20umedecido" class="w3-btn botao__cor" style="background-color:rgb(255, 99, 71, 0.5)">Porta Lenço Umedecido</a>
        </div>
        <div class="catalogo__produtos">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "arte_com_carinho";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM produtos WHERE 1=0";

            if (isset($_GET['categoria'])) {
                $categoria = $_GET['categoria'];
                $sql = "SELECT * FROM produtos WHERE categoria = '$categoria'";
            } elseif (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM produtos WHERE nome LIKE '%$search%'";
            }

            if (isset($_GET['categoria']) || (isset($_GET['search']) && !empty($_GET['search']))) {
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="produto">';
                        echo '<img src="img/' . $row['imagem'] . '" alt="' . $row['nome'] . '" class="produto__imagem">';
                        echo '<h3 class="produto__titulo">' . $row['nome'] . '</h3>';
                        echo '<p class="produto__descricao">' . $row['descricao'] . '</p>';
                        echo '<p class="produto__preco">R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "Nenhum produto encontrado.";
                }
            } else {
                echo "Por favor, selecione uma categoria ou realize uma busca.";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <section class="contato">
        <div class="contato__descrição">
            <h2 class="contato__titulo">Fique por dentro das novidades!</h2>
            <p class="contato__texto">Atualizações de novos .......</p>
        </div>
        <input type="email" placeholder="Cadastre seu e-mail" class="contato__email"> 
    </section>

    <hr />

    <footer class="rodape">
        <h2 class="rodape__titulo">Arte Com Carinho &copf; <br> <p class="desenvolvedor">DEV. Por Carlos</p></h2>
    </footer>
    <script src="script.js"></script>
</body>
</html>
