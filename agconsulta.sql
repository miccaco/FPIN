-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Jul-2015 às 00:55
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3
create database agconsulta;
use agconsulta;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agconsulta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`cod_clien` int(10) unsigned NOT NULL,
  `fone` decimal(12,0) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod_clien`, `fone`, `email`) VALUES
(1, '12345678', 'teste@teste.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `cod_clien` int(11) DEFAULT NULL,
  `cd_med` int(11) DEFAULT NULL,
  `cd_esp` int(11) DEFAULT NULL,
  `dt_consul` datetime DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL,
  `presente` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

CREATE TABLE IF NOT EXISTS `especialidade` (
`cod_espec` int(10) unsigned NOT NULL,
  `nom_espec` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `especialidade`
--

INSERT INTO `especialidade` (`cod_espec`, `nom_espec`) VALUES
(1, 'Clinico Geral'),
(2, 'Ortopedista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
`cod_medic` int(10) unsigned NOT NULL,
  `crm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico_agenda`
--

CREATE TABLE IF NOT EXISTS `medico_agenda` (
  `cd_med` int(11) NOT NULL DEFAULT '0',
  `cd_esp` int(11) NOT NULL DEFAULT '0',
  `data_disponivel` datetime NOT NULL,
  `vagas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico_especialidade`
--

CREATE TABLE IF NOT EXISTS `medico_especialidade` (
  `cod_medic` int(11) NOT NULL DEFAULT '0',
  `cod_espec` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`cod` int(10) unsigned NOT NULL,
  `cpf` char(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `senha` char(40) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`cod`, `cpf`, `name`, `senha`, `tipo`) VALUES
(1, '12345678911', 'teste', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_tipo`
--

CREATE TABLE IF NOT EXISTS `user_tipo` (
  `id_tipo` int(10) unsigned NOT NULL,
  `nome_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_tipo`
--

INSERT INTO `user_tipo` (`id_tipo`, `nome_tipo`) VALUES
(1, 'cliente'),
(2, 'medico'),
(3, 'funcionario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`cod_clien`);

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
 ADD UNIQUE KEY `todos_unicos` (`cod_clien`,`cd_med`,`cd_esp`,`dt_consul`);

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
 ADD PRIMARY KEY (`cod_espec`), ADD UNIQUE KEY `nom_espec` (`nom_espec`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
 ADD PRIMARY KEY (`cod_medic`);

--
-- Indexes for table `medico_agenda`
--
ALTER TABLE `medico_agenda`
 ADD UNIQUE KEY `med_esp_data` (`cd_med`,`cd_esp`,`data_disponivel`);

--
-- Indexes for table `medico_especialidade`
--
ALTER TABLE `medico_especialidade`
 ADD PRIMARY KEY (`cod_medic`,`cod_espec`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`cod`), ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `user_tipo`
--
ALTER TABLE `user_tipo`
 ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `cod_clien` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `especialidade`
--
ALTER TABLE `especialidade`
MODIFY `cod_espec` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
MODIFY `cod_medic` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `cod` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
