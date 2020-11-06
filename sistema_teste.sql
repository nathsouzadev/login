-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/11/2020 às 15:17
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `post` text DEFAULT NULL,
  `tempo` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id_post`, `id_user`, `post`, `tempo`) VALUES
(1, 2, 'Olá mundo!', '2020-11-02 11:20:58'),
(2, 2, 'Uma nova rede social', '2020-11-02 11:20:58'),
(3, 2, 'Verificando ordenação', '2020-11-02 19:06:15'),
(4, 2, 'Uma vez Flamengo', '2020-11-02 19:46:31'),
(5, 2, 'Finalizando esquema de postagens', '2020-11-02 19:47:15'),
(6, 2, 'Destruindo variáveis na memória', '2020-11-02 19:48:50'),
(8, 3, 'Em dezembro de 81', '2020-11-02 20:09:51'),
(9, 3, 'O Flamengo acertou ao apostar na base', '2020-11-02 20:10:13'),
(10, 3, 'Campeão mundial', '2020-11-02 21:06:31'),
(11, 2, 'Tudo bem?', '2020-11-03 00:50:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(80) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `senha`, `email`, `image`) VALUES
(2, 'Nathally', '25d55ad283aa400af464c76d713c07ad', 'nathallyccd@gmail.com', './images/nathally.jpg'),
(3, 'Zico', 'b3b4d2dbedc99fe843fd3dedb02f086f', 'zico@fla.com.br', './images/zico.jpeg'),
(11, 'Alves', '12345678', 'alves@gmailcom', ''),
(12, 'Nathally', 'e10adc3949ba59abbe56e057f20f883e', 'nat@gmail.com', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
