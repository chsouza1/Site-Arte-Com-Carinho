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
        <p class="banner__texto">ll</p>
        <input type="search" class="banner__pesquisa" placeholder="O que você desejar achar?">
    </section>

    <section class="catalogo">
        <h2 class="catalogo__titulo">Nosso Catálogo de Produtos</h2>
        <div class="catalogo__botoes">
        <button onclick="showCategory('toalha-de-boca')" class="w3-btn w3-blue">Toalha de Boca</button>
        <button onclick="showCategory('toalha-de-banho')" class="w3-btn w3-blue">Toalha de Banho</button>
        <button onclick="showCategory('toalha-de-rosto')" class="w3-btn w3-blue">Toalha de Rosto</button>
        <button onclick="showCategory('toalha-capus')" class="w3-btn w3-blue">Toalha de Capuz</button>
        <button onclick="showCategory('manta')" class="w3-btn w3-blue">Manta</button>
        <button onclick="showCategory('ninho')" class="w3-btn w3-blue">Ninho</button>
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
            $sql = "SELECT * FROM produtos";
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
</html>
