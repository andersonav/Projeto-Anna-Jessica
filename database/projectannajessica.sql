-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 20-Jun-2019 às 00:05
-- Versão do servidor: 5.7.26-0ubuntu0.18.10.1
-- PHP Version: 7.2.19-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectannajessica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `nome_evento` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_fim` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_de_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nome_evento`, `descricao`, `imagem`, `data_inicio`, `data_fim`, `hora_inicio`, `hora_fim`, `cidade`, `data_de_criacao`, `data_de_atualizacao`, `status`) VALUES
(1, 'Evento silcar', 'Teste', 'imgteste.jpg', '2019-06-12', '2019-06-12', '07:00:00', '10:00:00', 'Maranguape', '2019-06-14 19:34:48', '2019-06-14 19:34:48', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL,
  `status` int(11) DEFAULT '1',
  `classificacao_id_classificacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id_anuncio`, `imagem`, `data_de_criacao`, `data_de_atualizacao`, `status`, `classificacao_id_classificacao`) VALUES
(18, '1.png', '2019-06-13 22:24:07', '2019-06-13 22:27:30', 1, 1),
(19, '2.jpeg', '2019-06-13 22:24:24', '2019-06-13 22:28:00', 1, 1),
(20, '3.png', '2019-06-13 22:24:42', '2019-06-13 22:24:42', 1, 1),
(21, '5.jpg', '2019-06-13 22:25:05', '2019-06-13 22:25:05', 1, 1),
(22, '4.png', '2019-06-13 22:25:32', '2019-06-13 22:25:32', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `apoio`
--

CREATE TABLE `apoio` (
  `id_apoio` int(11) NOT NULL,
  `nome_apoio` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `apoio`
--

INSERT INTO `apoio` (`id_apoio`, `nome_apoio`, `data_de_criacao`, `data_de_atualizacao`, `status`) VALUES
(10, 'Anna Jessica', '2019-06-13 22:23:27', '2019-06-13 22:23:27', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao_anuncio`
--

CREATE TABLE `classificacao_anuncio` (
  `id_classificacao_anuncio` int(11) NOT NULL,
  `desc_classificacao_anuncio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classificacao_anuncio`
--

INSERT INTO `classificacao_anuncio` (`id_classificacao_anuncio`, `desc_classificacao_anuncio`) VALUES
(1, 'Primeira'),
(2, 'Segunda'),
(3, 'Terceira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comp_evento`
--

CREATE TABLE `comp_evento` (
  `id_comp_evento` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nome_evento` varchar(45) NOT NULL,
  `data` date DEFAULT NULL,
  `hora_inicio` varchar(45) DEFAULT NULL,
  `hora_fim` varchar(45) DEFAULT NULL,
  `informacao_adicional` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `percurso` varchar(255) DEFAULT NULL,
  `distancia` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `imagem` varchar(255) NOT NULL,
  `prazo` date DEFAULT NULL,
  `modo` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `apoio_id_apoio` int(11) NOT NULL,
  `realizacao_id_realizacao` int(11) NOT NULL,
  `data_de_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_de_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nome_evento`, `data`, `hora_inicio`, `hora_fim`, `informacao_adicional`, `endereco`, `percurso`, `distancia`, `status`, `imagem`, `prazo`, `modo`, `tipo`, `apoio_id_apoio`, `realizacao_id_realizacao`, `data_de_atualizacao`, `data_de_criacao`) VALUES
(50, '2ª Nigth Bike MPE', '2019-07-20', '10:00', '12:00', 'Retirada do kit no dia, local epitacio socity!', 'Rua Mundica Paula', 'Passeio Ciclistico', '24', 1, 'metas.jpg', '2019-06-17', 'Fique por dentro!', 'Destaque', 10, 5, '2019-06-14 01:46:34', '2019-06-14 01:46:34'),
(51, '9º cervejada de Boa Viagem imagem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'cervejadabv.png', NULL, 'Fique por dentro!', 'Quadro', 10, 5, '2019-06-14 02:01:20', '2019-06-14 02:01:20'),
(52, 'Cobertura oficial do Bloco Fantastico 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'fantastico.png', NULL, 'Fique por dentro!', 'Quadro', 10, 5, '2019-06-14 02:04:05', '2019-06-14 02:04:05'),
(53, '1º Night Bike Maranguape imagem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'imgteste.jpg', NULL, 'Fique por dentro!', 'Quadro', 10, 5, '2019-06-14 02:07:02', '2019-06-14 02:07:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `forma` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `valor` varchar(255) NOT NULL,
  `tamanho` varchar(4) DEFAULT NULL,
  `id_kit` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fatura`
--

INSERT INTO `fatura` (`id`, `id_usuario`, `referencia`, `forma`, `data`, `valor`, `tamanho`, `id_kit`, `status`, `data_de_criacao`, `data_de_atualizacao`) VALUES
(60, 2, '$2y$10$IpxaBCDx8QBtuL0WzXOyguj9LtsZSwC9lUbnkqAoGgLTYYezQiGWC', 'Mercado Pago', '2019-06-13 00:00:00', '150,00', 'P', 52, 'Pendente', '2019-06-13 22:53:30', '2019-06-13 22:53:30'),
(61, 2, '$2y$10$tmvnnmCO8LpGBt9G2jKrNeJw1asWOY8Pe/qbG0qkvchxJenZHVnoq', 'Mercado Pago', '2019-06-13 00:00:00', '120,00', 'M', 50, 'Pendente', '2019-06-13 22:53:47', '2019-06-13 22:53:47'),
(62, 3, '$2y$10$QYJSRAjotkF.fL1ob6hLMOQSwKls.s5XefdFQf1ifvvZZOhsHlXG6', 'Mercado Pago', '2019-06-14 00:00:00', '120,00', 'PP', 50, 'Pendente', '2019-06-14 16:50:45', '2019-06-14 16:50:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `kit_evento`
--

CREATE TABLE `kit_evento` (
  `id_kit` int(11) NOT NULL,
  `nome_kit` varchar(255) NOT NULL,
  `imagem_kit` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `id_tamanho` varchar(255) NOT NULL,
  `descricao_kit` varchar(255) NOT NULL,
  `id_evento_fk` int(11) NOT NULL,
  `data_de_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `kit_evento`
--

INSERT INTO `kit_evento` (`id_kit`, `nome_kit`, `imagem_kit`, `valor`, `id_tamanho`, `descricao_kit`, `id_evento_fk`, `data_de_atualizacao`, `data_de_criacao`) VALUES
(50, 'Kit Aventura', 'kits.jpg', '120,00', '838e0d931ad336db7de93f54c17512e8', 'Blusa + óculos + copo + toalha', 50, '2019-06-14 01:46:35', '2019-06-14 01:46:35'),
(52, 'Kit Desafio', 'kits.jpg', '150,00', '244c6e729a24c0a44a4fb190659587a0', 'Blusa + copo', 50, '2019-06-14 01:53:16', '2019-06-14 01:53:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `link_evento`
--

CREATE TABLE `link_evento` (
  `id_link_evento` int(11) NOT NULL,
  `nome_link` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `id_evento_fk` int(11) NOT NULL,
  `data_de_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `link_evento`
--

INSERT INTO `link_evento` (`id_link_evento`, `nome_link`, `link`, `id_evento_fk`, `data_de_atualizacao`, `data_de_criacao`) VALUES
(27, 'Video', 'https://www.youtube.com/watch?v=vBRxEBZFBeI', 51, '2019-06-15 00:52:33', '2019-06-15 00:52:33'),
(28, 'Fotos', 'https://drive.google.com/drive/u/0/folders/1xjco_FZ3QgckoiPCYWcCIDfLrk3HB_jN', 51, '2019-06-15 00:52:33', '2019-06-15 00:52:33'),
(29, 'Video', 'https://www.youtube.com/watch?v=B7vMlgMl9cw&feature=youtu.be', 53, '2019-06-20 05:58:13', '2019-06-20 05:58:13'),
(30, 'Video', 'https://www.youtube.com/watch?v=2uqBWfDikAQ', 52, '2019-06-20 06:04:41', '2019-06-20 06:04:41'),
(31, 'Video', 'https://www.youtube.com/watch?v=mn8kKVxolbE&t=381s', 52, '2019-06-20 06:04:41', '2019-06-20 06:04:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nome_menu` varchar(255) NOT NULL,
  `icone_menu` varchar(45) NOT NULL,
  `rota_menu` varchar(45) NOT NULL,
  `ativo_menu` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id_menu`, `nome_menu`, `icone_menu`, `rota_menu`, `ativo_menu`) VALUES
(1, 'Eventos', 'eventos-icone', 'eventos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `id_parceiro` int(11) NOT NULL,
  `imagem_parceiro` varchar(255) NOT NULL,
  `descricao_parceiro` varchar(45) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parceiro`, `imagem_parceiro`, `descricao_parceiro`, `data_de_criacao`, `data_de_atualizacao`, `status`) VALUES
(4, 'img2.JPG', 'Anna Jessica', '2019-06-13 22:22:59', '2019-06-13 22:22:59', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anderson.alvesprogrammer@gmail.com', '$2y$10$Wzx7AQZ2q066i2dXgt0prOGCNH9DS8RZDdFnyDIL2aGxuxoFxEBrq', '2019-05-29 02:56:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrocinio`
--

CREATE TABLE `patrocinio` (
  `id_patrocinio` int(11) NOT NULL,
  `nome_patrocinio` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `patrocinio`
--

INSERT INTO `patrocinio` (`id_patrocinio`, `nome_patrocinio`, `data_de_criacao`, `data_de_atualizacao`, `status`) VALUES
(4, 'Anna Jessica', '2019-06-13 22:22:42', '2019-06-13 22:22:42', 1),
(5, 'Anna Jessica 2', '2019-06-20 01:32:45', '2019-06-20 01:32:45', 1),
(6, 'Anna Jessica 3', '2019-06-20 01:32:52', '2019-06-20 01:32:52', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrocinio_evento`
--

CREATE TABLE `patrocinio_evento` (
  `patrocinio_evento_id` int(11) NOT NULL,
  `evento_id_fk` int(11) NOT NULL,
  `patrocinio_id_fk` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `patrocinio_evento`
--

INSERT INTO `patrocinio_evento` (`patrocinio_evento_id`, `evento_id_fk`, `patrocinio_id_fk`, `data_criacao`, `data_atualizacao`) VALUES
(5, 50, 4, '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
(6, 53, 4, '2019-06-20 05:58:13', '2019-06-20 05:58:13'),
(7, 53, 5, '2019-06-20 05:58:13', '2019-06-20 05:58:13'),
(8, 53, 6, '2019-06-20 05:58:13', '2019-06-20 05:58:13'),
(9, 52, 4, '2019-06-20 06:04:41', '2019-06-20 06:04:41'),
(10, 52, 5, '2019-06-20 06:04:41', '2019-06-20 06:04:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `id_permissao` int(11) NOT NULL,
  `nome_permissao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`id_permissao`, `nome_permissao`) VALUES
(1, 'Administrador'),
(2, 'Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `realizacao`
--

CREATE TABLE `realizacao` (
  `id_realizacao` int(11) NOT NULL,
  `nome_realizacao` varchar(45) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `realizacao`
--

INSERT INTO `realizacao` (`id_realizacao`, `nome_realizacao`, `data_de_criacao`, `data_de_atualizacao`, `status`) VALUES
(4, 'Anna Jessica', '2019-06-13 22:22:08', '2019-06-13 22:22:21', 0),
(5, 'Anna jessica', '2019-06-13 22:22:29', '2019-06-13 23:17:53', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `slideshow`
--

CREATE TABLE `slideshow` (
  `id_slideshow` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `slideshow`
--

INSERT INTO `slideshow` (`id_slideshow`, `imagem`, `data_de_criacao`, `data_de_atualizacao`, `status`) VALUES
(9, 'img1.JPG', '2019-06-13 22:19:29', '2019-06-13 22:20:21', 1),
(10, 'img2.JPG', '2019-06-13 22:19:46', '2019-06-13 22:20:30', 1),
(11, 'img1.JPG', '2019-06-13 22:19:56', '2019-06-13 22:49:44', 0),
(12, 'img1.JPG', '2019-06-13 22:49:56', '2019-06-13 22:49:56', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `nome_submenu` varchar(255) NOT NULL,
  `ativo_submenu` int(11) DEFAULT '1',
  `rota_submenu` varchar(255) NOT NULL,
  `menu_id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `nome_submenu`, `ativo_submenu`, `rota_submenu`, `menu_id_menu`) VALUES
(1, 'Cadastrar Eventos', 1, 'cadastrarEventos', 1),
(2, 'Editar Eventos', 1, 'editarEventos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `hash_tamanho` varchar(255) NOT NULL,
  `tamanho` varchar(11) NOT NULL,
  `data_de_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`hash_tamanho`, `tamanho`, `data_de_atualizacao`, `data_de_criacao`) VALUES
('1885d3fb2dbd90fd0c13d7270e73a5d8', 'PP', '2019-06-14 01:51:58', '2019-06-14 01:51:58'),
('1885d3fb2dbd90fd0c13d7270e73a5d8', 'P', '2019-06-14 01:51:58', '2019-06-14 01:51:58'),
('1885d3fb2dbd90fd0c13d7270e73a5d8', 'M', '2019-06-14 01:51:58', '2019-06-14 01:51:58'),
('1885d3fb2dbd90fd0c13d7270e73a5d8', 'G', '2019-06-14 01:51:58', '2019-06-14 01:51:58'),
('1885d3fb2dbd90fd0c13d7270e73a5d8', 'GG', '2019-06-14 01:51:58', '2019-06-14 01:51:58'),
('244c6e729a24c0a44a4fb190659587a0', 'P', '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
('244c6e729a24c0a44a4fb190659587a0', 'M', '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
('244c6e729a24c0a44a4fb190659587a0', 'G', '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
('244c6e729a24c0a44a4fb190659587a0', 'GG', '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
('838e0d931ad336db7de93f54c17512e8', 'PP', '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
('838e0d931ad336db7de93f54c17512e8', 'P', '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
('838e0d931ad336db7de93f54c17512e8', 'M', '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
('838e0d931ad336db7de93f54c17512e8', 'G', '2019-06-20 05:58:02', '2019-06-20 05:58:02'),
('838e0d931ad336db7de93f54c17512e8', 'GG', '2019-06-20 05:58:02', '2019-06-20 05:58:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `telefone_usuario` varchar(45) NOT NULL,
  `cidade_usuario` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `ativo_usuario` int(11) NOT NULL DEFAULT '1',
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `telefone_usuario`, `cidade_usuario`, `email`, `password`, `token`, `remember_token`, `ativo_usuario`, `data_de_criacao`, `data_de_atualizacao`, `id_tipo_usuario`) VALUES
(1, 'Anderson Alves', '(85) 98835-5751', 'Maranguape', 'anderson.alvesprogrammer@gmail.com', '$2y$10$I.FU65R/Z1ux.E8Kyyzr..TI.aESVIq9uv4bTTqglaJ3IACWvEqQK', 'f9HdNLLqgMjxWdQVPihb2pTRvUJ5ybWjZYtgKrur', '7DIfQlGxh5668e5DS6bOUyUf0wcj8Nm0WUkLWUe54tgu1BdsqPMR7ZxyIzFV', 1, '2019-04-23 22:54:35', '2019-05-26 18:33:02', 1),
(2, 'Mauricio Abreu', '(85) 9883-55751', 'Maranguape', 'mauricio@gmail.com', '$2y$10$oNXTVKl2Y6V2v8I042h34.QVcvdq2McEqTsARjgxnyRhYACGFKmz.', 'f9HdNLLqgMjxWdQVPihb2pTRvUJ5ybWjZYtgKrur', 'NdL1ZN1IC4bC2oNk9kz0PoIK4wlFyLWIeQxGjS1YonXDrpsdyR4wMC1YTWsH', 1, '2019-04-23 22:54:35', '2019-04-23 22:54:35', 1),
(3, 'José almeida', '(85) 65455-6454', 'Maranguape', 'test@gmail.com', '$2y$10$R.sjbuWFv7xnAud0g1I3GOAz9jIo4xgH46q8qs7uQhQv29cHpaZEi', NULL, 'Dr6jAOwIJ51eFqgQCOjYOnN5EPTbSlu2m2ZNjOelXXLPA1Kh8wdQMGQ4pNGF', 1, '2019-05-14 21:28:14', '2019-05-14 21:28:14', 2),
(4, 'Teste banco', '(65) 6556-56565', 'Maranguape', 'mauricio123@gmail.com', '$2y$10$peSwmusxOrgot3f8pOFgxOyYXx.dDGfPG2Ln7XAwdqJzdOlt/3ijq', NULL, 'uWHQLmsSaxUE3PI933FkRQdqIQF3XqzpT6N7j9Qma5CiAAOuhwwY8waMb26W', 1, '2019-05-23 01:04:08', '2019-05-23 01:04:08', 2),
(5, 'Mauricio Abreu', '(56) 4565-11631', 'Maranguape', 'mauricioabreu75@gmail.com', '$2y$10$6.Hf/lCvjizzvdLbRDPdP.C4W27NgLgSEWoqbNc53REm5x4kInrUy', NULL, 'RE2WBp8qRkDkNzscmpnVTxYGzswzfOtu5W2pIMPTWCmCbS6arXceEduAEELw', 1, '2019-05-30 18:32:29', '2019-05-30 18:32:29', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_evento`
--

CREATE TABLE `usuario_evento` (
  `id_usuario_evento` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `kit_id_kit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_permissao_menu`
--

CREATE TABLE `usuario_permissao_menu` (
  `id_usuario_permissao_menu` int(11) NOT NULL,
  `permissao_id_permissao` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `menu_id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_permissao_menu`
--

INSERT INTO `usuario_permissao_menu` (`id_usuario_permissao_menu`, `permissao_id_permissao`, `usuario_id_usuario`, `menu_id_menu`) VALUES
(1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id_anuncio`);

--
-- Indexes for table `apoio`
--
ALTER TABLE `apoio`
  ADD PRIMARY KEY (`id_apoio`);

--
-- Indexes for table `classificacao_anuncio`
--
ALTER TABLE `classificacao_anuncio`
  ADD PRIMARY KEY (`id_classificacao_anuncio`);

--
-- Indexes for table `comp_evento`
--
ALTER TABLE `comp_evento`
  ADD PRIMARY KEY (`id_comp_evento`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `fk_evento_apoio1` (`apoio_id_apoio`),
  ADD KEY `fk_evento_realizacao1` (`realizacao_id_realizacao`);

--
-- Indexes for table `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kit` (`id_kit`),
  ADD KEY `fk_user` (`id_usuario`);

--
-- Indexes for table `kit_evento`
--
ALTER TABLE `kit_evento`
  ADD PRIMARY KEY (`id_kit`);

--
-- Indexes for table `link_evento`
--
ALTER TABLE `link_evento`
  ADD PRIMARY KEY (`id_link_evento`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`id_parceiro`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `emailPass` (`email`);

--
-- Indexes for table `patrocinio`
--
ALTER TABLE `patrocinio`
  ADD PRIMARY KEY (`id_patrocinio`);

--
-- Indexes for table `patrocinio_evento`
--
ALTER TABLE `patrocinio_evento`
  ADD PRIMARY KEY (`patrocinio_evento_id`);

--
-- Indexes for table `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Indexes for table `realizacao`
--
ALTER TABLE `realizacao`
  ADD PRIMARY KEY (`id_realizacao`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id_slideshow`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `fk_submenu_menu1` (`menu_id_menu`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `usuario_evento`
--
ALTER TABLE `usuario_evento`
  ADD PRIMARY KEY (`id_usuario_evento`),
  ADD KEY `fk_usuario_evento_usuario` (`usuario_id_usuario`);

--
-- Indexes for table `usuario_permissao_menu`
--
ALTER TABLE `usuario_permissao_menu`
  ADD PRIMARY KEY (`id_usuario_permissao_menu`),
  ADD KEY `fk_usuario_permissao_menu_permissao1` (`permissao_id_permissao`),
  ADD KEY `fk_usuario_permissao_menu_usuario1` (`usuario_id_usuario`),
  ADD KEY `fk_usuario_permissao_menu_menu1` (`menu_id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `apoio`
--
ALTER TABLE `apoio`
  MODIFY `id_apoio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `classificacao_anuncio`
--
ALTER TABLE `classificacao_anuncio`
  MODIFY `id_classificacao_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comp_evento`
--
ALTER TABLE `comp_evento`
  MODIFY `id_comp_evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `kit_evento`
--
ALTER TABLE `kit_evento`
  MODIFY `id_kit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `link_evento`
--
ALTER TABLE `link_evento`
  MODIFY `id_link_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patrocinio`
--
ALTER TABLE `patrocinio`
  MODIFY `id_patrocinio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `patrocinio_evento`
--
ALTER TABLE `patrocinio_evento`
  MODIFY `patrocinio_evento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `realizacao`
--
ALTER TABLE `realizacao`
  MODIFY `id_realizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario_evento`
--
ALTER TABLE `usuario_evento`
  MODIFY `id_usuario_evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario_permissao_menu`
--
ALTER TABLE `usuario_permissao_menu`
  MODIFY `id_usuario_permissao_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_apoio1` FOREIGN KEY (`apoio_id_apoio`) REFERENCES `apoio` (`id_apoio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_realizacao1` FOREIGN KEY (`realizacao_id_realizacao`) REFERENCES `realizacao` (`id_realizacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fk_kit` FOREIGN KEY (`id_kit`) REFERENCES `kit_evento` (`id_kit`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `fk_submenu_menu1` FOREIGN KEY (`menu_id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_evento`
--
ALTER TABLE `usuario_evento`
  ADD CONSTRAINT `fk_usuario_evento_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_permissao_menu`
--
ALTER TABLE `usuario_permissao_menu`
  ADD CONSTRAINT `fk_usuario_permissao_menu_menu1` FOREIGN KEY (`menu_id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permissao_menu_permissao1` FOREIGN KEY (`permissao_id_permissao`) REFERENCES `permissao` (`id_permissao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permissao_menu_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
