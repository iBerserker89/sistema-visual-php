-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 15/07/2024 às 19:11
-- Versão do servidor: 10.11.7-MariaDB-1:10.11.7+maria~ubu2204
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `default`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sistema`
--

CREATE TABLE `sistema` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ordem` smallint(45) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sistema`
--

INSERT INTO `sistema` (`id`, `nome`, `url`, `ordem`) VALUES
(1, 'Luciano Farias de Barros', 'www.google.com', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
