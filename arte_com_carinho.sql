-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/07/2024 às 03:13
-- Versão do servidor: 8.0.37
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `arte_com_carinho`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Toalha de Boca'),
(2, 'Toalha de Banho'),
(3, 'Toalha de Rosto'),
(4, 'Toalha Capuz'),
(5, 'Manta'),
(6, 'Ninho'),
(7, 'Fralda de Boca'),
(8, 'Necessaire'),
(9, 'Toalha Fralda'),
(10, 'Pano de Prato'),
(11, 'Bolsa Maternidade'),
(12, 'Saquinho Maternidade'),
(13, 'Porta Lenco Umedecido'),
(14, 'Estojo'),
(15, 'Cardeneta Vacinacao'),
(16, 'Naninhas'),
(17, 'Mochila'),
(18, 'Bolsas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `manta`
--

CREATE TABLE `manta` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ninho`
--

CREATE TABLE `ninho` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `categoria_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `categoria`, `categoria_id`) VALUES
(12, 'Porta Caderneta de Vacinação Abelhinha', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Porta vacina.jpg', 'Cardeneta Vacinação', NULL),
(13, 'Naninha Ursinhos', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0017.jpg', 'Naninhas', NULL),
(14, 'Naninha Elefantinho', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0018.jpg', 'Naninhas', NULL),
(17, 'Naninha Vaquinha', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Captura de tela 2024-07-09 150544.png', 'Naninhas', NULL),
(18, 'Toalha Capuz de Bebê Leão', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0015.jpg', 'Toalha de Capuz', NULL),
(19, 'Toalha Capuz de Bebê Sereia Do Mar.', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0014.jpg', 'Toalha de Capuz', NULL),
(20, 'Porta Caderneta de Vacinação Trator', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0011.jpg', 'Cardeneta Vacinação', NULL),
(21, 'Fralda de boca', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0009.jpg', 'Fralda de Boca', NULL),
(22, 'Fralda de Boca Raposa Astronauta', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0005.jpg', 'Fralda de Boca', NULL),
(23, 'Necessaire Enfermeiras', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0025.jpg', 'Necessaire', NULL),
(24, 'Porta Caderneta de Vacinação Ursinho', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Captura de tela 2024-07-09 152341.png', 'Cardeneta Vacinação', NULL),
(26, 'Fralda de Boca Bichinhos', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0008.jpg', 'Fralda de Boca', NULL),
(28, 'Bolsa Maternidade Bebê Leão', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0026.jpg', 'Bolsas', NULL),
(29, 'Pano de Prato Natalino', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0028.jpg', 'Pano de Prato', NULL),
(30, 'Necessaire Da Mamãe e do Bebê', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Necessarie Mamae.png', 'Necessaire', NULL),
(31, 'Fralda de Boca Girafas', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Fralda de Boca Girafas.png', 'Fralda de Boca', NULL),
(32, 'Fralda de Boca Carrinhos', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Fralda de Boca Carros.png', 'Fralda de Boca', NULL),
(33, 'Porta Caderneta de Vacinação Baby Dino', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Caderneta Bebe Dino.png', 'Cardeneta Vacinação', NULL),
(34, 'Toalha de Banho Personalizada', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Toalha de Banho.png', 'Toalha de Banho', NULL),
(35, 'Toalha de Banho Personalizada', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Toalha de Banho1.png', 'Toalha de Banho', NULL),
(36, 'Manta de Bebê Personalizada', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0009.jpg', 'Manta', NULL),
(37, 'Porta Caderneta de Vacinação Astronauta', 'A personalização do produto fica a sua escolha!!', 0.00, 'Caderneta Vacinação.png', 'Cardeneta Vacinação', NULL),
(38, 'Toalha de Banho Personalizado', 'A personalização do produto fica a sua escolha!!', 0.00, 'Toalha de Banho 2.png', 'Toalha de Banho', NULL),
(39, 'Toalha de Banho Personalizada Preta', 'A personalização do produto fica a sua escolha!!', 0.00, 'Toalha de Banho pre.png', 'Toalha de Banho', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `toalha_capus`
--

CREATE TABLE `toalha_capus` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `toalha_de_banho`
--

CREATE TABLE `toalha_de_banho` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `toalha_de_boca`
--

CREATE TABLE `toalha_de_boca` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$/8qmOBp0bWp/Gp1XNJIREe8ylk0m9J6Ffh6eTmVQRIciLvUlRTH6G', 'carloshenrique.souza88@hotmail.com', '2024-07-06 00:33:18'),
(2, 'simone', '$2y$10$PrkEdda4FvBpxYcXJ9yNWO3TIoI.tfDYRJav8CxvZAFXLv3wQ3XTy', 'carloshenrique.souza88@hotmail.com', '2024-07-06 01:21:41'),
(3, 'teste', '$2y$10$lm5rO6oq4eb62VKYIo.MB.N19LNTYVAmsDikilijIUvsj/JFQsC2m', 'teste@email.com', '2024-07-08 13:48:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `manta`
--
ALTER TABLE `manta`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ninho`
--
ALTER TABLE `ninho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`categoria_id`);

--
-- Índices de tabela `toalha_capus`
--
ALTER TABLE `toalha_capus`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `toalha_de_banho`
--
ALTER TABLE `toalha_de_banho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `toalha_de_boca`
--
ALTER TABLE `toalha_de_boca`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `manta`
--
ALTER TABLE `manta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ninho`
--
ALTER TABLE `ninho`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `toalha_capus`
--
ALTER TABLE `toalha_capus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `toalha_de_banho`
--
ALTER TABLE `toalha_de_banho`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `toalha_de_boca`
--
ALTER TABLE `toalha_de_boca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
