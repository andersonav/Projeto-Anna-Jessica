-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Maio-2019 às 05:18
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `data` datetime NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_fim` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `data_de_criacao` date NOT NULL,
  `data_de_atualizacao` date NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id_anuncio`, `imagem`, `data_de_criacao`, `data_de_atualizacao`, `status`) VALUES
(1, 'Captura de tela de 2019-05-11 22-56-43.png', '2019-05-12 01:30:00', '2019-05-18 18:53:30', 0),
(2, 'Captura de tela de 2019-05-06 23-27-34.png', '2019-05-18 19:00:34', '2019-05-18 19:16:20', 0),
(3, 'img1.jpeg', '2019-05-21 17:58:17', '2019-05-21 17:58:34', 0);

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
  `data` date NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_fim` varchar(45) NOT NULL,
  `informacao_adicional` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `percurso` varchar(255) NOT NULL,
  `distancia` varchar(45) NOT NULL,
  `status` int(11) DEFAULT '1',
  `imagem` varchar(255) DEFAULT NULL,
  `prazo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modo` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `apoio_id_apoio` int(11) NOT NULL,
  `patrocinio_id_patrocinio` int(11) NOT NULL,
  `realizacao_id_realizacao` int(11) NOT NULL,
  `data_de_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nome_evento`, `data`, `hora_inicio`, `hora_fim`, `informacao_adicional`, `endereco`, `percurso`, `distancia`, `status`, `imagem`, `prazo`, `modo`, `tipo`, `apoio_id_apoio`, `patrocinio_id_patrocinio`, `realizacao_id_realizacao`, `data_de_atualizacao`, `data_de_criacao`) VALUES
(31, 'Teste 1', '2019-10-12', '21:00', '21:00', 'Teste 1', 'Rua Mundica Paula', '20', '1515', 1, 'imageEvento/Teste 1.jpeg', '2019-10-12 00:00:00', 'Fique por dentro!', 'Destaque', 3, 2, 1, '2019-05-22 02:56:01', '2019-05-22 02:56:01'),
(32, 'Teste 2', '2019-10-12', '21:00', '21:00', 'Teste', 'Rua Mundica Paula', '20', '1515', 1, 'imageEvento/Teste 2.jpeg', '2019-10-12 00:00:00', 'Fique por dentro!', 'Destaque', 2, 1, 2, '2019-05-22 02:59:30', '2019-05-22 02:59:30');

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
(9, 'Kit1 2', 'imageKit/Kit1 2.jpeg', '20.00000', '0b1a022925e9050310df0c5da3b324df', 'Teste1 2', 31, '2019-05-22 02:56:01', '2019-05-22 02:56:01'),
(10, 'Kit1 1', 'imageKit/Kit1 1.jpeg', '20.00000', 'e8833e592d38df88fbad370896cf9d55', 'Teste1 1', 31, '2019-05-22 02:56:02', '2019-05-22 02:56:02'),
(11, 'Kit2 2', 'imageKit/Kit2 2.jpeg', '20.00000', 'd1f90e7765c2cf95f26921edaa4871c2', 'Teste2 2', 32, '2019-05-22 02:59:30', '2019-05-22 02:59:30'),
(12, 'Kit2 1', 'imageKit/Kit2 1.jpeg', '20.00000', 'be5873e4b2a815d9e813c48c9688e8c9', 'Teste2 1', 32, '2019-05-22 02:59:31', '2019-05-22 02:59:31');

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
(5, 'Teste', 'etfdsfdgfdwq', 32, '2019-05-22 02:59:30', '2019-05-22 02:59:30'),
(6, 'Teste 2', 'etfdsfdgfdwq', 32, '2019-05-22 02:59:30', '2019-05-22 02:59:30');

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
(2, 'Captura de tela de 2019-04-15 23-01-45.png', 'ergerg', '2019-05-18 19:17:36', '2019-05-18 19:17:50', 0);

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
('0b1a022925e9050310df0c5da3b324df', 'PP', '2019-05-22 02:56:01', '2019-05-22 02:56:01'),
('0b1a022925e9050310df0c5da3b324df', 'P', '2019-05-22 02:56:01', '2019-05-22 02:56:01'),
('e8833e592d38df88fbad370896cf9d55', 'G', '2019-05-22 02:56:02', '2019-05-22 02:56:02'),
('e8833e592d38df88fbad370896cf9d55', 'GG', '2019-05-22 02:56:02', '2019-05-22 02:56:02'),
('d1f90e7765c2cf95f26921edaa4871c2', 'P', '2019-05-22 02:59:30', '2019-05-22 02:59:30'),
('d1f90e7765c2cf95f26921edaa4871c2', 'M', '2019-05-22 02:59:30', '2019-05-22 02:59:30'),
('d1f90e7765c2cf95f26921edaa4871c2', 'G', '2019-05-22 02:59:30', '2019-05-22 02:59:30'),
('be5873e4b2a815d9e813c48c9688e8c9', 'P', '2019-05-22 02:59:31', '2019-05-22 02:59:31'),
('be5873e4b2a815d9e813c48c9688e8c9', 'G', '2019-05-22 02:59:31', '2019-05-22 02:59:31'),
('be5873e4b2a815d9e813c48c9688e8c9', 'GG', '2019-05-22 02:59:31', '2019-05-22 02:59:31');

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
(1, 'Anderson Alves', '(85) 98835-5751', 'Maranguape', 'adm@gmail.com', '$2a$10$jjzLJXxKS/5qqylz5GHWjOvOabE/Ske6uFToaCCJtl8xEpAD5KRZ6', 'f9HdNLLqgMjxWdQVPihb2pTRvUJ5ybWjZYtgKrur', 'Lx328Ddif6onJLwUhsep4MdEzPWzKRBgtyRyB2qewJTPKQIMXMeJ0VPc13pe', 1, '2019-04-23 22:54:35', '2019-04-23 22:54:35', 1),
(2, 'Mauricio Abreu', '(85) 9883-55751', 'Maranguape', 'mauricio@gmail.com', '$2y$10$oNXTVKl2Y6V2v8I042h34.QVcvdq2McEqTsARjgxnyRhYACGFKmz.', 'f9HdNLLqgMjxWdQVPihb2pTRvUJ5ybWjZYtgKrur', 'Px5eJWeqXrzhmwjfIG6y1MXa80eaUGo2CHOCKCiOHWFNIxLfi3cSMzRiLzut', 1, '2019-04-23 22:54:35', '2019-04-23 22:54:35', 1),
(3, 'José', '(85) 6545-56454', 'Maranguape', 'test@gmail.com', '$2y$10$R.sjbuWFv7xnAud0g1I3GOAz9jIo4xgH46q8qs7uQhQv29cHpaZEi', NULL, 'yyfB2AkpwXEl8GSzBrfAsd2lijZrLSmyC0dqwrvqyCDXzRb8gxoWcXdFn1Mp', 1, '2019-05-14 21:28:14', '2019-05-14 21:28:14', 2),
(4, 'Teste banco', '(65) 6556-56565', 'Maranguape', 'mauricio123@gmail.com', '$2y$10$peSwmusxOrgot3f8pOFgxOyYXx.dDGfPG2Ln7XAwdqJzdOlt/3ijq', NULL, 'uWHQLmsSaxUE3PI933FkRQdqIQF3XqzpT6N7j9Qma5CiAAOuhwwY8waMb26W', 1, '2019-05-23 01:04:08', '2019-05-23 01:04:08', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_evento`
--

CREATE TABLE `usuario_evento` (
  `id_usuario_evento` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `evento_id_evento` int(11) NOT NULL
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
  ADD KEY `fk_usuario_evento_usuario` (`usuario_id_usuario`),
  ADD KEY `fk_usuario_evento_evento1` (`evento_id_evento`);

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
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apoio`
--
ALTER TABLE `apoio`
  MODIFY `id_apoio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comp_evento`
--
ALTER TABLE `comp_evento`
  MODIFY `id_comp_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kit_evento`
--
ALTER TABLE `kit_evento`
  MODIFY `id_kit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `link_evento`
--
ALTER TABLE `link_evento`
  MODIFY `id_link_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `fk_usuario_evento_evento1` FOREIGN KEY (`evento_id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_evento_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_permissao_menu`
--
ALTER TABLE `usuario_permissao_menu`
  ADD CONSTRAINT `fk_usuario_permissao_menu_menu1` FOREIGN KEY (`menu_id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permissao_menu_permissao1` FOREIGN KEY (`permissao_id_permissao`) REFERENCES `permissao` (`id_permissao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permissao_menu_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
