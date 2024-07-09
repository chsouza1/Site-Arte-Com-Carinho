-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jul-2024 às 22:35
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
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
-- Estrutura da tabela `manta`
--

CREATE TABLE `manta` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ninho`
--

CREATE TABLE `ninho` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `categoria`, `categoria_id`) VALUES
(12, 'Porta Cardeneta de Vacinação Abelhinha', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Porta vacina.jpg', 'Cardeneta Vacinação', NULL),
(13, 'Naninha Ursinhos', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0017.jpg', 'Naninhas', NULL),
(14, 'Naninha Elefantinho', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0018.jpg', 'Naninhas', NULL),
(17, 'Naninha Vaquinha', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Captura de tela 2024-07-09 150544.png', 'Naninhas', NULL),
(18, 'Toalha Capuz de Bebê Leão', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0015.jpg', 'Toalha de Capuz', NULL),
(19, 'Toalha Capuz de Bebê Sereia Do Mar.', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0014.jpg', 'Toalha de Capuz', NULL),
(20, 'Porta Cardeneta de Vacinação Trator', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0011.jpg', 'Cardeneta Vacinação', NULL),
(21, 'Fralda de boca', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0009.jpg', 'Fralda de Boca', NULL),
(22, 'Fralda de Boca Raposa Astronauta', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0005.jpg', 'Fralda de Boca', NULL),
(23, 'Necessaire Enfermeiras', 'A personalização do produto fica a sua escolha!!.', 0.00, 'IMG-20240708-WA0025.jpg', 'Necessaire', NULL),
(24, 'Porta Cardeneta de Vacinação Ursinho', 'A personalização do produto fica a sua escolha!!.', 0.00, 'Captura de tela 2024-07-09 152341.png', 'Cardeneta Vacinação', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `toalha_capus`
--

CREATE TABLE `toalha_capus` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `toalha_de_banho`
--

CREATE TABLE `toalha_de_banho` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `toalha_de_boca`
--

CREATE TABLE `toalha_de_boca` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$/8qmOBp0bWp/Gp1XNJIREe8ylk0m9J6Ffh6eTmVQRIciLvUlRTH6G', 'carloshenrique.souza88@hotmail.com', '2024-07-06 00:33:18'),
(2, 'simone', '$2y$10$PrkEdda4FvBpxYcXJ9yNWO3TIoI.tfDYRJav8CxvZAFXLv3wQ3XTy', 'carloshenrique.souza88@hotmail.com', '2024-07-06 01:21:41'),
(3, 'teste', '$2y$10$lm5rO6oq4eb62VKYIo.MB.N19LNTYVAmsDikilijIUvsj/JFQsC2m', 'teste@email.com', '2024-07-08 13:48:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `manta`
--
ALTER TABLE `manta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ninho`
--
ALTER TABLE `ninho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`categoria_id`);

--
-- Índices para tabela `toalha_capus`
--
ALTER TABLE `toalha_capus`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `toalha_de_banho`
--
ALTER TABLE `toalha_de_banho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `toalha_de_boca`
--
ALTER TABLE `toalha_de_boca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `manta`
--
ALTER TABLE `manta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ninho`
--
ALTER TABLE `ninho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `toalha_capus`
--
ALTER TABLE `toalha_capus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `toalha_de_banho`
--
ALTER TABLE `toalha_de_banho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `toalha_de_boca`
--
ALTER TABLE `toalha_de_boca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
