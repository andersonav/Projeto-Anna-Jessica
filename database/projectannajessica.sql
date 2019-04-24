-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Abr-2019 às 04:09
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
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apoio`
--

CREATE TABLE `apoio` (
  `id_apoio` int(11) NOT NULL,
  `nome_apoio` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nome_evento` varchar(45) NOT NULL,
  `data` datetime NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_fim` varchar(45) NOT NULL,
  `informacao_adicional` varchar(255) NOT NULL,
  `percurso` varchar(255) NOT NULL,
  `distancia` varchar(45) NOT NULL,
  `apoio_id_apoio` int(11) NOT NULL,
  `patrocinio_id_patrocinio` int(11) NOT NULL,
  `realizacao_id_realizacao` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `id_parceiro` int(11) NOT NULL,
  `imagem_parceiro` varchar(255) NOT NULL,
  `descricao_parceiro` varchar(45) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrocinio`
--

CREATE TABLE `patrocinio` (
  `id_patrocinio` int(11) NOT NULL,
  `nome_patrocinio` varchar(255) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `id_permissao` int(11) NOT NULL,
  `nome_permissao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `realizacao`
--

CREATE TABLE `realizacao` (
  `id_realizacao` int(11) NOT NULL,
  `nome_realizacao` varchar(45) NOT NULL,
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `nome_submenu` varchar(255) NOT NULL,
  `ativo_submenu` int(11) DEFAULT '1',
  `menu_id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `telefone_usuario` varchar(45) NOT NULL,
  `nascimento_usuario` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `ativo_usuario` int(11) NOT NULL DEFAULT '1',
  `data_de_criacao` datetime NOT NULL,
  `data_de_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `telefone_usuario`, `nascimento_usuario`, `email`, `password`, `token`, `remember_token`, `ativo_usuario`, `data_de_criacao`, `data_de_atualizacao`) VALUES
(1, 'Anderson Alves', '(85) 98835-5751', '2000-02-03 00:00:00', 'anderson.alvesprogrammer@gmail.com', '$2a$10$jjzLJXxKS/5qqylz5GHWjOvOabE/Ske6uFToaCCJtl8xEpAD5KRZ6', 'f9HdNLLqgMjxWdQVPihb2pTRvUJ5ybWjZYtgKrur', 'zNWWuVFVs4RvEwx0mGHa3X9qQMtqUmps4ezKo4OhSHrilsqhLD6qeXNOkQut', 1, '2019-04-23 22:54:35', '2019-04-23 22:54:35');

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
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `fk_evento_apoio1` (`apoio_id_apoio`),
  ADD KEY `fk_evento_patrocinio1` (`patrocinio_id_patrocinio`),
  ADD KEY `fk_evento_realizacao1` (`realizacao_id_realizacao`);

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
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apoio`
--
ALTER TABLE `apoio`
  MODIFY `id_apoio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_patrocinio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realizacao`
--
ALTER TABLE `realizacao`
  MODIFY `id_realizacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario_evento`
--
ALTER TABLE `usuario_evento`
  MODIFY `id_usuario_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario_permissao_menu`
--
ALTER TABLE `usuario_permissao_menu`
  MODIFY `id_usuario_permissao_menu` int(11) NOT NULL AUTO_INCREMENT;

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
