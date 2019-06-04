-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04-Jun-2019 às 17:56
-- Versão do servidor: 5.7.26-0ubuntu0.18.10.1
-- PHP Version: 7.2.17-0ubuntu0.18.10.1

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
(1, 'Night Bar', 'Descrital e tal e o de Teste para o evento', 'time-placeholder.png', '2019-05-29', '2019-05-29', '14:54', '18:53', 'Maranguape', '2019-06-02 18:05:53', '2019-06-02 21:05:53', 1),
(2, 'Evento de Teste', 'Ola', 'super mega coraçoes.png', '2019-05-29', '2019-05-29', '08:00', '10:00', 'Maranguape', '2019-05-30 04:46:26', '2019-05-30 07:46:26', 1),
(3, 'Anderson', 'dfdfdfdf', 'super mega coraçoes.png', '2019-05-30', '2019-05-30', '09:00:00', '12:30:00', 'Maranguaps', '2019-05-30 07:09:11', '2019-05-30 07:09:11', 1),
(4, 'Anderson Alves', 'ghgh', 'time-placeholder.png', '2019-05-29', '2019-05-29', '55:45', '65:46', 'Maranguaps', '2019-06-02 18:04:43', '2019-06-02 21:04:43', 1),
(5, 'Agenda', 'dfdfdf', 'super mega coraçoes.png', '2019-05-27', '2019-05-27', '07:30:00', '11:00:00', 'Maranguape', '2019-05-30 07:48:25', '2019-05-30 07:48:25', 1),
(6, 'Teste', 'Nada', 'twitter.png', '2019-06-03', '2019-06-03', '07:00:00', '10:00:00', 'Maranguape', '2019-06-04 00:55:03', '2019-06-04 00:55:03', 1),
(7, 'Teste', 'Nada', 'subscribe-bg.jpg', '2019-06-11', '2019-06-11', '07:00:00', '13:30:00', 'Maranguape', '2019-06-04 00:55:32', '2019-06-04 00:55:32', 1);

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
(4, 'Entrar-no-Reino-de-Deus.png', '2019-05-26 04:02:59', '2019-05-26 04:02:59', 1, 1),
(5, 'Entrar-no-Reino-de-Deus.png', '2019-05-26 04:04:14', '2019-05-26 04:04:14', 1, 1),
(6, 'Celula.jpeg', '2019-05-26 04:04:24', '2019-06-02 15:22:45', 0, 1),
(7, 'venue-info-bg.jpg', '2019-05-26 04:04:24', '2019-06-02 16:12:24', 1, 1),
(8, 'Celula.jpeg', '2019-05-26 04:04:24', '2019-05-26 04:24:20', 0, 1),
(9, 'celulaconvite-oficial.jpg', '2019-05-26 04:25:04', '2019-05-26 17:55:03', 0, 1),
(10, 'Celula.jpeg', '2019-05-26 04:25:14', '2019-05-26 04:25:50', 0, 2),
(11, 'CelulaNew.jpeg', '2019-05-26 16:11:53', '2019-05-26 17:54:58', 0, 2),
(12, 'intro-bg.jpg', '2019-05-26 17:56:57', '2019-06-02 17:16:24', 1, 1),
(13, 'password_icon_ok(0).jpg', '2019-05-26 18:02:24', '2019-06-02 14:34:53', 1, 2),
(14, 'WhatsApp Image 2019-04-15 at 16.01.13.jpeg', '2019-05-28 23:50:12', '2019-05-28 23:51:36', 0, 2),
(15, 'WhatsApp Image 2019-04-20 at 11.35.55.jpeg', '2019-05-28 23:50:29', '2019-05-28 23:51:11', 0, 2);

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
(1, 'Teste', '2019-05-12 01:30:00', '2019-05-14 00:23:02', 1),
(2, 'Opa', '2019-05-14 00:19:06', '2019-05-18 19:00:48', 0),
(3, 'Hello', '2019-05-14 00:22:05', '2019-05-18 18:53:40', 0),
(4, 'sadasdawefwefw', '2019-05-14 00:28:23', '2019-05-18 19:16:31', 0),
(5, 'teste', '2019-05-14 00:32:15', '2019-05-14 21:41:41', 1),
(6, 'testando 3', '2019-05-14 21:35:52', '2019-05-14 21:38:51', 1),
(7, 'ewfefew', '2019-05-18 19:16:37', '2019-05-21 18:33:11', 0),
(8, 'werwe', '2019-05-21 17:54:26', '2019-05-21 17:54:26', 1),
(9, 'trhyrt', '2019-05-21 18:17:50', '2019-05-21 18:17:50', 1);

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
  `modo` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `apoio_id_apoio` int(11) NOT NULL,
  `patrocinio_id_patrocinio` int(11) NOT NULL,
  `realizacao_id_realizacao` int(11) NOT NULL,
  `data_de_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_de_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nome_evento`, `data`, `hora_inicio`, `hora_fim`, `informacao_adicional`, `endereco`, `percurso`, `distancia`, `status`, `imagem`, `prazo`, `modo`, `tipo`, `apoio_id_apoio`, `patrocinio_id_patrocinio`, `realizacao_id_realizacao`, `data_de_atualizacao`, `data_de_criacao`) VALUES
(34, 'Teste 1', '1990-12-10', '32:42', '23:42', 'Nada', 'Rua Mundica Paula', '20', '1515', 1, 'parede.jpg', '2019-06-04', 'Fique por dentro!', 'Destaque', 1, 1, 2, '2019-06-02 18:07:52', '2019-06-02 18:07:52'),
(36, 'Teste 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'logoteste.png', NULL, 'Em breve!', 'Quadro', 1, 2, 2, '2019-06-02 18:09:48', '2019-06-02 18:09:48'),
(37, 'Teste 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'favicon.png', NULL, 'Em breve!', 'Armazenamento', 1, 2, 2, '2019-06-02 18:10:22', '2019-06-02 18:10:22'),
(38, 'teste 5', '2019-06-20', '15:00', '18:00', 'Teste', 'Rua Mundica Paula', 'Teste', '20', 1, 'parede.jpg', '2019-06-06', 'Em breve!', 'Destaque', 6, 2, 2, '2019-06-02 18:13:28', '2019-06-02 18:13:28'),
(40, 'Teste ok ok', '2019-10-12', '54:54', '45:45', 'Nada', 'Rua Mundica Paula', 'Teste', '1515', 1, 'twitter.png', '2019-06-20', 'Fique por dentro!', 'Destaque', 1, 1, 2, '2019-06-04 23:33:09', '2019-06-04 23:33:09'),
(49, 'Teste 32632', '2019-10-20', '54:15', '45:45', 'Nada', 'Rua Mundica Paula', 'Teste', '1515', 1, 'favicon.png', '2019-10-20', 'Fique por dentro!', 'Destaque', 5, 1, 2, '2019-06-04 23:45:28', '2019-06-04 23:45:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `kit_evento`
--

CREATE TABLE `kit_evento` (
  `id_kit` int(11) NOT NULL,
  `nome_kit` varchar(255) NOT NULL,
  `imagem_kit` varchar(255) NOT NULL,
  `valor` decimal(10,5) NOT NULL,
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
(38, 'Kit1 563565', 'logo.png', '20.00000', 'de456a67ddfe38417dccbb8651cd0fa0', 'Teste2222', 38, '2019-06-04 23:31:34', '2019-06-04 23:31:34'),
(39, 'Kit2 1', 'subscribe-bg.jpg', '152.00000', 'be5873e4b2a815d9e813c48c9688e8c9', 'Teste2 2', 40, '2019-06-04 23:43:27', '2019-06-04 23:43:27'),
(40, 'Kit1 5635651', 'parede.jpg', '20.00000', '53ec6b78fb9bca0b18faa5d62b138053', 'Teste2 2', 49, '2019-06-04 23:45:28', '2019-06-04 23:45:28'),
(42, 'Kit222223323', 'password_icon_ok(0).jpg', '20.00000', '26d9f66d75c3bd436798cc1f5ef32013', 'Teste2222', 34, '2019-06-04 23:51:07', '2019-06-04 23:51:07');

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
(1, 'Captura de tela de 2019-05-11 22-56-43.png', 'Oltrtrthrthrt', '2019-05-12 01:30:00', '2019-05-18 19:02:13', 0),
(2, 'Captura de tela de 2019-04-15 23-01-45.png', 'ergerg', '2019-05-18 19:17:36', '2019-05-18 19:17:50', 0),
(3, 'CelulaNew.jpeg', 'Anderson', '2019-05-26 19:30:04', '2019-05-26 19:30:04', 1);

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
(1, 'ergergerg', '2019-05-12 01:30:00', '2019-05-18 19:17:58', 1),
(2, 'redthrhjrth', '2019-05-18 19:02:43', '2019-05-18 19:18:02', 0),
(3, 'ergerg', '2019-05-18 19:18:08', '2019-05-18 19:18:08', 1);

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
(1, 'er', '2019-05-12 01:30:00', '2019-05-18 19:18:20', 0),
(2, 'tjhruyrt', '2019-05-18 19:02:36', '2019-05-18 19:02:36', 1),
(3, 'egrerge', '2019-05-18 19:18:25', '2019-05-18 19:18:25', 1);

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
(1, '5.jpg', '2019-05-23 04:08:36', '2019-05-23 04:08:49', 0),
(2, 'bizpage-preview.png', '2019-05-23 04:08:55', '2019-05-26 17:14:00', 0),
(3, 'Entrar-no-Reino-de-Deus.png', '2019-05-26 16:47:13', '2019-05-26 17:14:05', 0),
(4, 'CelulaNew.jpeg', '2019-05-26 16:49:57', '2019-05-26 17:14:15', 0),
(5, 'Entrar-no-Reino-de-Deus.png', '2019-05-26 17:17:21', '2019-05-26 17:17:21', 1),
(6, 'CelulaNew.jpeg', '2019-05-26 17:19:25', '2019-05-26 17:19:25', 1),
(7, 'CelulaNew.jpeg', '2019-05-26 19:11:57', '2019-05-26 19:12:27', 0),
(8, 'WhatsApp Image 2019-05-26 at 13.15.35.jpeg', '2019-05-28 23:46:44', '2019-05-28 23:46:50', 0);

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
('86872143b655e7a8d1d1f86d626c5d24', 'P', '2019-06-04 23:29:18', '2019-06-04 23:29:18'),
('86872143b655e7a8d1d1f86d626c5d24', 'M', '2019-06-04 23:29:18', '2019-06-04 23:29:18'),
('86872143b655e7a8d1d1f86d626c5d24', 'G', '2019-06-04 23:29:19', '2019-06-04 23:29:19'),
('de456a67ddfe38417dccbb8651cd0fa0', 'PP', '2019-06-04 23:31:34', '2019-06-04 23:31:34'),
('de456a67ddfe38417dccbb8651cd0fa0', 'M', '2019-06-04 23:31:34', '2019-06-04 23:31:34'),
('de456a67ddfe38417dccbb8651cd0fa0', 'GG', '2019-06-04 23:31:34', '2019-06-04 23:31:34'),
('be5873e4b2a815d9e813c48c9688e8c9', 'GG', '2019-06-04 23:43:27', '2019-06-04 23:43:27'),
('53ec6b78fb9bca0b18faa5d62b138053', 'M', '2019-06-04 23:45:28', '2019-06-04 23:45:28'),
('53ec6b78fb9bca0b18faa5d62b138053', 'GG', '2019-06-04 23:45:28', '2019-06-04 23:45:28'),
('26d9f66d75c3bd436798cc1f5ef32013', 'M', '2019-06-04 23:51:07', '2019-06-04 23:51:07'),
('26d9f66d75c3bd436798cc1f5ef32013', 'G', '2019-06-04 23:51:07', '2019-06-04 23:51:07'),
('26d9f66d75c3bd436798cc1f5ef32013', 'GG', '2019-06-04 23:51:07', '2019-06-04 23:51:07');

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
(1, 'Anderson Alves', '(85) 98835-5751', 'Maranguape', 'anderson.alvesprogrammer@gmail.com', '$2y$10$I.FU65R/Z1ux.E8Kyyzr..TI.aESVIq9uv4bTTqglaJ3IACWvEqQK', 'f9HdNLLqgMjxWdQVPihb2pTRvUJ5ybWjZYtgKrur', 'HK9VnyqNkS3fkaqOWm5HQ9Vma6kYPcmtnOcOaOMfuG261jLvz88EIDT8qT0s', 1, '2019-04-23 22:54:35', '2019-05-26 18:33:02', 1),
(2, 'Mauricio Abreu', '(85) 9883-55751', 'Maranguape', 'mauricio@gmail.com', '$2y$10$oNXTVKl2Y6V2v8I042h34.QVcvdq2McEqTsARjgxnyRhYACGFKmz.', 'f9HdNLLqgMjxWdQVPihb2pTRvUJ5ybWjZYtgKrur', '7PAUzK1qyZZJWkte8EeMkI4FLlpAlWNAoJ8Vgy9bNVlHPqp7TlnSizh52Q6H', 1, '2019-04-23 22:54:35', '2019-04-23 22:54:35', 1),
(3, 'José almeida', '(85) 65455-6454', 'Maranguape', 'test@gmail.com', '$2y$10$R.sjbuWFv7xnAud0g1I3GOAz9jIo4xgH46q8qs7uQhQv29cHpaZEi', NULL, 'PhTQsJZhuk2dX2NZfUs55gP5zG42oUmGPaTIS7gijOU0iZTnuYHKUXURAR3w', 1, '2019-05-14 21:28:14', '2019-05-14 21:28:14', 2),
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
  ADD KEY `fk_evento_patrocinio1` (`patrocinio_id_patrocinio`),
  ADD KEY `fk_evento_realizacao1` (`realizacao_id_realizacao`);

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
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `apoio`
--
ALTER TABLE `apoio`
  MODIFY `id_apoio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `kit_evento`
--
ALTER TABLE `kit_evento`
  MODIFY `id_kit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `link_evento`
--
ALTER TABLE `link_evento`
  MODIFY `id_link_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patrocinio`
--
ALTER TABLE `patrocinio`
  MODIFY `id_patrocinio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `realizacao`
--
ALTER TABLE `realizacao`
  MODIFY `id_realizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  ADD CONSTRAINT `fk_evento_patrocinio1` FOREIGN KEY (`patrocinio_id_patrocinio`) REFERENCES `patrocinio` (`id_patrocinio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_realizacao1` FOREIGN KEY (`realizacao_id_realizacao`) REFERENCES `realizacao` (`id_realizacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
