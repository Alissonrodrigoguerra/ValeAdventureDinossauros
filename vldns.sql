-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Maio-2020 às 05:50
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vldns`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao`
--

CREATE TABLE `acao` (
  `idAcao` bigint(20) UNSIGNED NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acao`
--

INSERT INTO `acao` (`idAcao`, `ip`, `path`, `status`, `nome`, `user_agent`, `created_at`) VALUES
(1, '::1', 'Cadastrar', 0, 'cadastrar', '1', '0000-00-00 00:00:00'),
(2, '::1', 'Editar', 0, 'editar', '1', '0000-00-00 00:00:00'),
(3, '::1', 'Listar', 0, 'index', '1', '0000-00-00 00:00:00'),
(4, '::1', 'Deletar', 0, 'deletar', '1', '0000-00-00 00:00:00'),
(5, '::1', 'Desativar', 0, 'desativar', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

CREATE TABLE `areas` (
  `idAreas` bigint(20) UNSIGNED NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `areas`
--

INSERT INTO `areas` (`idAreas`, `ip`, `path`, `status`, `nome`, `user_agent`, `created_at`) VALUES
(1, '::1', 'painel', 0, 'Painel', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `idCargos` bigint(20) UNSIGNED NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`idCargos`, `ip`, `path`, `status`, `nome`, `user_agent`, `created_at`) VALUES
(1, '1', 'root_root', '1', 'root', '0', '0000-00-00 00:00:00'),
(2, '::1', 'Cliente', NULL, 'cliente', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos_areas`
--

CREATE TABLE `cargos_areas` (
  `idCargos_areas` bigint(20) UNSIGNED NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idCargos` bigint(20) DEFAULT NULL,
  `idAreas` bigint(20) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos_areas`
--

INSERT INTO `cargos_areas` (`idCargos_areas`, `ip`, `path`, `status`, `nome`, `idCargos`, `idAreas`, `user_agent`, `created_at`) VALUES
(1, '1', 'global', 0, 'Global', 1, 1, '1', NULL),
(2, '::1', '', 0, NULL, 2, 1, '1', '0000-00-00 00:00:00'),
(3, '::1', '', 0, NULL, 2, 1, '1', '0000-00-00 00:00:00'),
(4, '::1', '', NULL, NULL, 2, 1, '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `idEventos` int(11) NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `idPermissoes` bigint(20) UNSIGNED NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `idCargos` bigint(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idTabela` bigint(20) DEFAULT NULL,
  `idAcao` bigint(20) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`idPermissoes`, `ip`, `path`, `idCargos`, `status`, `nome`, `idTabela`, `idAcao`, `user_agent`, `created_at`) VALUES
(1, '::1', '', 2, NULL, NULL, 11, 1, '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelas`
--

CREATE TABLE `tabelas` (
  `idTabelas` bigint(20) UNSIGNED NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `icone` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `visivelNoMenu` int(11) DEFAULT NULL,
  `posicao` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idTabelas_grupos` bigint(20) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tabelas`
--

INSERT INTO `tabelas` (`idTabelas`, `ip`, `path`, `icone`, `status`, `visivelNoMenu`, `posicao`, `alias`, `nome`, `idTabelas_grupos`, `user_agent`, `created_at`) VALUES
(11, '::1', 'eventos', 'mdi-action-done-all', 0, 0, 1, 'eventos', 'Eventos', 4, '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelas_grupos`
--

CREATE TABLE `tabelas_grupos` (
  `idTabelas_grupos` bigint(20) UNSIGNED NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `visivelNoMenu` int(11) DEFAULT NULL,
  `posicao` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tabelas_grupos`
--

INSERT INTO `tabelas_grupos` (`idTabelas_grupos`, `ip`, `path`, `status`, `visivelNoMenu`, `posicao`, `nome`, `user_agent`, `created_at`) VALUES
(1, '', 'geral', 0, NULL, 1, 'Geral', '', NULL),
(3, '::1', 'site', 1, NULL, 1, 'Site', '1', '0000-00-00 00:00:00'),
(4, '::1', 'dashboard', 0, NULL, 1, 'Dashboard', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `idUsers` bigint(20) UNSIGNED NOT NULL,
  `ip` char(15) NOT NULL COMMENT 'IP header',
  `path` varchar(255) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idCargo` bigint(20) DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL COMMENT 'User-Agent header',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idUsers`, `ip`, `path`, `senha`, `email`, `nome`, `idCargo`, `user_agent`, `created_at`) VALUES
(1, '', 'alisson_guerra', '577dac6a99b89969a9f13e9c60677461d54addbd', 'arodrigoguerra@gmail.com', 'Alisson', 1, '', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acao`
--
ALTER TABLE `acao`
  ADD PRIMARY KEY (`idAcao`);

--
-- Índices para tabela `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`idAreas`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idCargos`);

--
-- Índices para tabela `cargos_areas`
--
ALTER TABLE `cargos_areas`
  ADD PRIMARY KEY (`idCargos_areas`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEventos`);

--
-- Índices para tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`idPermissoes`);

--
-- Índices para tabela `tabelas`
--
ALTER TABLE `tabelas`
  ADD PRIMARY KEY (`idTabelas`);

--
-- Índices para tabela `tabelas_grupos`
--
ALTER TABLE `tabelas_grupos`
  ADD PRIMARY KEY (`idTabelas_grupos`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acao`
--
ALTER TABLE `acao`
  MODIFY `idAcao` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `areas`
--
ALTER TABLE `areas`
  MODIFY `idAreas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idCargos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cargos_areas`
--
ALTER TABLE `cargos_areas`
  MODIFY `idCargos_areas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `idPermissoes` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tabelas`
--
ALTER TABLE `tabelas`
  MODIFY `idTabelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tabelas_grupos`
--
ALTER TABLE `tabelas_grupos`
  MODIFY `idTabelas_grupos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
