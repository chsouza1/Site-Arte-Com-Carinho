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
    <script>
        function toggleCategories() {
            var x = document.getElementById("catalogoBotoes");
            if (x.style.display === "none" || x.style.display === "") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <header class="cabecalho">
        <div class="container">
            <input type="checkbox" id="menu" class="container__botao">
            <label for="menu" class="container__rotulo">
                <span class="cabecalho__menu-hamburguer container__imagem"></span>
            </label>
            <a href="index.php">
                <img src="img/logoarte.jpg" alt="logo ArteComCarinho" width="80" height="80" class="container__imagem">
            </a>
            <h1 class="container__titulo"><b class="container__titulo--negrito">Arte</b> <span class="titulo__books">Com Carinho</span></h1>
        </div>
        <div class="container">
            <a href="login_admin.php" class="container__links">
                <img src="img/Usuário.svg" alt="Meu perfil" class="container__imagem">
                <p class="container__texto">Login</p>
            </a>
        </div>
    </header>

    <section class="banner">
        <h2 class="banner__titulo">Já sabe por onde começar?</h2>
        <form method="GET" action="" class="banner__formulario">
                <input type="search" name="search" class="banner__pesquisa" placeholder="O que você deseja achar?">
                <button type="submit" class="banner__botao-pesquisa">Buscar</button>
            </form>
    </section>
    <section class="catalogo">
        <div class="catalogo__container">
            <button class="w3-btn w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)" onclick="toggleCategories()">Mostrar Categorias</button>
        </div>
        <ul id="catalogoBotoes" class="catalogo__botoes">
            <li><a href="?categoria=Toalha%20de%20Boca" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Toalhas de Boca</a></li>
            <li><a href="?categoria=Toalha%20de%20Banho" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Toalhas de Banho</a></li>
            <li><a href="?categoria=Toalha%20de%20Rosto" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Toalhas de Rosto</a></li>
            <li><a href="?categoria=Toalha%20de%20Capuz" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Toalhas de Capuz</a></li>
            <li><a href="?categoria=Manta" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Manta</a></li>
            <li><a href="?categoria=fralda%20%de%20boca" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Fralda de Boca</a></li>
            <li><a href="?categoria=Necessaire" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Necessaires</a></li>
            <li><a href="?categoria=Toalha%20Fralda" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Toalhas Fralda</a></li>
            <li><a href="?categoria=Pano%20de%20Prato" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Panos de Prato</a></li>
            <li><a href="?categoria=Bolsa%20Maternidade" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Bolsas Maternidade</a></li>
            <li><a href="?categoria=Saquino%20Maternidade" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Saquinos Maternidade</a></li>
            <li><a href="?categoria=Porta%20lenco%20umedecido" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Porta Lenços Umedecido</a></li>
            <li><a href="?categoria=Estojo" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Estojos</a></li>
            <li><a href="?categoria=Cardeneta%20Vacinação" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Porta Documentos</a></li>
            <li><a href="?categoria=Naninhas" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Naninhas</a></li>
            <li><a href="?categoria=Mochila" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Mochilas</a></li>
            <li><a href="?categoria=Bolsas" class="w3-button w3-border w3-round-large" style="background-color:rgb(255, 99, 71, 0.5)">Bolsas</a></li>
        </ul>

        <section class="catalogo">
    <h2 class="container__titulo__produtos">Nossa Linha de Produtos</h2>
        <div class="catalogo__produtos">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "#Runeterra.7894@!";
            $dbname = "arte_com_carinho";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Número de produtos por página
            $produtosPorPagina = 15;

            // Página atual
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $offset = ($pagina - 1) * $produtosPorPagina;

            // Consulta principal
            $sql = "SELECT * FROM produtos LIMIT $offset, $produtosPorPagina";

            if (isset($_GET['categoria'])) {
                $categoria = $_GET['categoria'];
                $sql = "SELECT * FROM produtos WHERE categoria = '$categoria' LIMIT $offset, $produtosPorPagina";
            } elseif (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM produtos WHERE nome LIKE '%$search%' LIMIT $offset, $produtosPorPagina";
            }

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

            // Contagem total de produtos
            $sqlTotal = "SELECT COUNT(*) as total FROM produtos";
            if (isset($_GET['categoria'])) {
                $sqlTotal = "SELECT COUNT(*) as total FROM produtos WHERE categoria = '$categoria'";
            } elseif (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $sqlTotal = "SELECT COUNT(*) as total FROM produtos WHERE nome LIKE '%$search%'";
            }
            $resultTotal = $conn->query($sqlTotal);
            $rowTotal = $resultTotal->fetch_assoc();
            $totalProdutos = $rowTotal['total'];

            $conn->close();
            ?>
        </div>
    </section>

    <div class="pagination">
        <ul class="pagination">
            <?php
            $totalPaginas = ceil($totalProdutos / $produtosPorPagina);
            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($i == $pagina) {
                    echo '<li><strong>' . $i . '</strong></li>';
                } else {
                    echo '<li><a href="?pagina=' . $i;
                    if (isset($_GET['categoria'])) {
                        echo '&categoria=' . $_GET['categoria'];
                    } elseif (isset($_GET['search']) && !empty($_GET['search'])) {
                        echo '&search=' . $_GET['search'];
                    }
                    echo '">' . $i . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>

    <section class="contato">
        <div class="contato__descrição">
            <h2 class="contato__titulo">Fique por dentro das novidades!</h2>
            <p class="contato__texto">Atualizações de novos .......</p>
        </div>
        <input type="email" placeholder="Cadastre seu e-mail" class="contato__email"> 
    </section>

    <hr />

    <footer class="rodape">
        <h2 class="rodape__titulo">Arte Com Carinho By Simone.<br> <a href="https://github.com/chsouza1"><p class="desenvolvedor">DEV. Por Carlos</p></a></h2>
        <a href="https://www.instagram.com/artecomcarinho75" target="_blank">
            <img src="img/logotipo-do-instagram.png" alt="insta" width="30" height="30">
        </a>
        <a href="https://wa.me/+5541999932625" target="_blank">
            <img src="img/whatsapp.png" alt="whatsapp" width="30" height="30">
        </a>
        <a href="https://www.facebook.com/simone.armin.7" target="_blank">
            <img src="img/facebook.png" alt="facebook" width="30" height="30">
        </a>
        <p>© 2024 All rights reserved</p>
    </footer>
</body>
</html>

