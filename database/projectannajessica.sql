-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 20-Jun-2019 às 22:39
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
(1, '5.jpg', '2019-06-20 19:29:24', '2019-06-20 19:29:24', 1, 1),
(2, '4.png', '2019-06-20 19:29:39', '2019-06-20 19:29:39', 1, 1),
(3, '2.jpeg', '2019-06-20 19:30:05', '2019-06-20 19:30:05', 1, 2),
(4, '1.png', '2019-06-20 19:30:39', '2019-06-20 19:30:39', 1, 2),
(5, '3.png', '2019-06-20 19:31:37', '2019-06-20 19:31:37', 1, 3),
(6, 'WhatsApp Image 2019-06-14 at 15.13.44.jpeg', '2019-06-20 19:31:58', '2019-06-20 19:31:58', 1, 3);

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
(1, 'Anna Jéssica', '2019-06-20 19:42:14', '2019-06-20 19:42:14', 1);

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
(1, '9º cervejada de Boa Viagem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'cervejadabv.png', NULL, 'Fique por dentro!', 'Quadro', 1, 1, '2019-06-20 22:44:53', '2019-06-20 22:44:53'),
(2, 'Cobertura oficial do Bloco Fantastico 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'fantastico.png', NULL, 'Fique por dentro!', 'Quadro', 1, 1, '2019-06-20 22:46:26', '2019-06-20 22:46:26'),
(3, '1º Night Bike Maranguape', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'WhatsApp Image 2019-06-08 at 12.04.57.jpeg', NULL, 'Fique por dentro!', 'Quadro', 1, 1, '2019-06-20 22:48:54', '2019-06-20 22:48:54'),
(4, 'Vaquejada de Boa Viagem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'vaquejadabv.png', NULL, 'Em breve!', 'Quadro', 1, 1, '2019-06-20 22:51:24', '2019-06-20 22:51:24'),
(5, '2º Nigth Bike Maranguape-CE', '2019-10-04', '19:30', '22:00', 'Retirada do Kit no dia do evento das 09:00 ás 12:00 e das 14:00 ás 19:20.', 'Epitacio Society Maranguape - CE', 'Passeio Ciclistico', '20', 1, '033.jpg', '2019-09-30', 'Fique por dentro!', 'Destaque', 1, 1, '2019-06-20 23:06:01', '2019-06-20 23:06:01');

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
  `tamanho` varchar(255) DEFAULT NULL,
  `id_kit` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Kit do Atleta', '053.jpg', '35,00', '7f6880013cadc86e743c59ed45592601', 'Camisa, Sinalizador de Led, Copo Personalizado, Degustação de Picolés Gelitto, Hidratação.', 5, '2019-06-20 23:06:01', '2019-06-20 23:06:01');

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
(1, 'Fotos', 'https://drive.google.com/drive/u/0/folders/1xjco_FZ3QgckoiPCYWcCIDfLrk3HB_jN', 1, '2019-06-20 22:44:53', '2019-06-20 22:44:53'),
(2, 'Vídeo', 'https://www.youtube.com/watch?v=vBRxEBZFBeI', 1, '2019-06-20 22:44:53', '2019-06-20 22:44:53'),
(3, 'Vídeo', 'https://www.youtube.com/watch?v=mn8kKVxolbE&t=381s', 2, '2019-06-20 22:46:26', '2019-06-20 22:46:26'),
(4, 'Vídeo', 'https://www.youtube.com/watch?v=2uqBWfDikAQ', 2, '2019-06-20 22:46:26', '2019-06-20 22:46:26'),
(5, 'Vídeo', 'https://www.youtube.com/watch?v=B7vMlgMl9cw&feature=youtu.be', 3, '2019-06-20 22:48:54', '2019-06-20 22:48:54');

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
(1, 'Anna Jéssica', '2019-06-20 19:41:43', '2019-06-20 19:41:43', 1);

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
(1, 1, 1, '2019-06-20 22:44:53', '2019-06-20 22:44:53'),
(2, 2, 1, '2019-06-20 22:46:26', '2019-06-20 22:46:26'),
(3, 3, 1, '2019-06-20 22:48:54', '2019-06-20 22:48:54'),
(4, 4, 1, '2019-06-20 22:51:25', '2019-06-20 22:51:25'),
(10, 5, 1, '2019-06-20 23:14:05', '2019-06-20 23:14:05');

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
(1, 'Anna Jéssica', '2019-06-20 19:41:52', '2019-06-20 19:41:52', 1);

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
(1, 'JBFJIBJDFKDJKFBDJ.jpg', '2019-06-20 19:27:36', '2019-06-20 19:27:36', 1),
(2, 'img2.JPG', '2019-06-20 19:27:51', '2019-06-20 19:27:51', 1),
(3, 'img1.JPG', '2019-06-20 19:28:02', '2019-06-20 19:28:02', 1);

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
('7f6880013cadc86e743c59ed45592601', 'Infantil', '2019-06-20 23:14:06', '2019-06-20 23:14:06'),
('7f6880013cadc86e743c59ed45592601', 'PP', '2019-06-20 23:14:06', '2019-06-20 23:14:06'),
('7f6880013cadc86e743c59ed45592601', 'P', '2019-06-20 23:14:06', '2019-06-20 23:14:06'),
('7f6880013cadc86e743c59ed45592601', 'M', '2019-06-20 23:14:06', '2019-06-20 23:14:06'),
('7f6880013cadc86e743c59ed45592601', 'G', '2019-06-20 23:14:06', '2019-06-20 23:14:06'),
('7f6880013cadc86e743c59ed45592601', 'GG', '2019-06-20 23:14:06', '2019-06-20 23:14:06'),
('7f6880013cadc86e743c59ed45592601', 'XG', '2019-06-20 23:14:06', '2019-06-20 23:14:06');

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
(2, 'Mauricio Abreu', '(85) 98835-5751', 'Maranguape', 'mauricio@gmail.com', '$2y$10$oNXTVKl2Y6V2v8I042h34.QVcvdq2McEqTsARjgxnyRhYACGFKmz.', 'f9HdNLLqgMjxWdQVPihb2pTRvUJ5ybWjZYtgKrur', '7gfX7PJ7LL36BhcmlGR00qK2KQwpgH18sWronFBQ7T6hph0OsXZVvptArBcD', 1, '2019-04-23 22:54:35', '2019-04-23 22:54:35', 1),
(3, 'José almeida neves', '(85) 65455-6454', 'Maranguape', 'test@gmail.com', '$2y$10$R.sjbuWFv7xnAud0g1I3GOAz9jIo4xgH46q8qs7uQhQv29cHpaZEi', NULL, 'cF6OmC5NZK1j6GUdKQjMtdTHekdborZg6DXc0y2gjfRbzq6TaEqU8EuWkoOH', 1, '2019-05-14 21:28:14', '2019-05-14 21:28:14', 2),
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
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `apoio`
--
ALTER TABLE `apoio`
  MODIFY `id_apoio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kit_evento`
--
ALTER TABLE `kit_evento`
  MODIFY `id_kit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `link_evento`
--
ALTER TABLE `link_evento`
  MODIFY `id_link_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patrocinio`
--
ALTER TABLE `patrocinio`
  MODIFY `id_patrocinio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_realizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Limitadores para a tabela `usuario_evento`
--
ALTER TABLE `usuario_evento`
  ADD CONSTRAINT `fk_usuario_evento_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
