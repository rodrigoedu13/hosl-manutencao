-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jan-2019 às 04:10
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosl_manutencao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `cd_chamado` int(11) NOT NULL,
  `dt_solicitacao` datetime DEFAULT NULL,
  `dt_resolucao` datetime DEFAULT NULL,
  `ds_descricao_chamado` blob,
  `ds_observacao` blob,
  `ds_nome_solicitante` varchar(255) DEFAULT NULL,
  `tp_status` tinyint(1) DEFAULT NULL,
  `tp_prioridade` int(11) DEFAULT NULL,
  `setores_cd_setor` int(11) NOT NULL,
  `usuarios_cd_usuario` varchar(100) NOT NULL,
  `colaboradores_cd_colaborador` int(11) NOT NULL,
  `empresas_cd_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `cd_colaborador` int(11) NOT NULL,
  `ds_colaborador` varchar(255) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `cd_empresa` int(11) NOT NULL,
  `ds_empresa` varchar(255) DEFAULT NULL,
  `ds_localidade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `cd_setor` int(11) NOT NULL,
  `ds_setor` varchar(255) DEFAULT NULL,
  `empresas_cd_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cd_usuario` varchar(100) NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `ds_nome` varchar(255) DEFAULT NULL,
  `sn_ativo` int(11) DEFAULT NULL,
  `tp_permissao` int(11) DEFAULT NULL,
  `dt_criacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`cd_chamado`,`setores_cd_setor`,`usuarios_cd_usuario`,`colaboradores_cd_colaborador`,`empresas_cd_empresa`);

--
-- Indexes for table `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`cd_colaborador`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`cd_empresa`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`cd_setor`,`empresas_cd_empresa`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cd_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
