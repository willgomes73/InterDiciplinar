-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Abr-2020 às 19:32
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escola`
--
CREATE DATABASE IF NOT EXISTS `escola` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `escola`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE `aluno` (
  `RA` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`RA`, `nome`, `nascimento`, `rg`, `cpf`, `sexo`) VALUES
('1234567890', 'Fulano de Tal', '1980-08-31', '12.345.678-0', '123.456.789-12', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE `disciplinas` (
  `Cod_disc` varchar(10) NOT NULL,
  `Cod_prof` varchar(5) DEFAULT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Carga_hora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`Cod_disc`, `Cod_prof`, `Nome`, `Carga_hora`) VALUES
('ALGI', 'P2', 'Algoritmos', 80),
('LPIV', 'P1', 'Linguagem de Programação IV', 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculado`
--

DROP TABLE IF EXISTS `matriculado`;
CREATE TABLE `matriculado` (
  `Ano` int(11) NOT NULL,
  `Semestre` int(11) NOT NULL,
  `Cod_disc` varchar(10) NOT NULL,
  `RA` varchar(20) NOT NULL,
  `Nota` decimal(3,1) DEFAULT NULL,
  `Faltas` int(11) DEFAULT NULL,
  `Situacao` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `matriculado`
--

INSERT INTO `matriculado` (`Ano`, `Semestre`, `Cod_disc`, `RA`, `Nota`, `Faltas`, `Situacao`) VALUES
(2020, 1, 'ALGI', '1234567890', '0.0', 0, 'cursando'),
(2020, 1, 'LPIV', '1234567890', '0.0', 0, 'cursando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE `professores` (
  `Cod_prof` varchar(5) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `RG` varchar(18) DEFAULT NULL,
  `Nascimento` date DEFAULT NULL,
  `CPF` varchar(18) DEFAULT NULL,
  `Salario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`Cod_prof`, `Nome`, `Sexo`, `RG`, `Nascimento`, `CPF`, `Salario`) VALUES
('P1', 'Luciano', 'M', '22.222.222-2', '1970-01-01', '123.123.123-45', '23.00'),
('P2', 'Maria', 'F', '33.333.333-3', '1980-02-15', '987.654.321-00', '23.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`RA`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`Cod_disc`),
  ADD KEY `Cod_prof` (`Cod_prof`);

--
-- Indexes for table `matriculado`
--
ALTER TABLE `matriculado`
  ADD PRIMARY KEY (`Ano`,`Semestre`,`Cod_disc`,`RA`),
  ADD KEY `fk_disciplina` (`Cod_disc`),
  ADD KEY `fk_aluno` (`RA`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`Cod_prof`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`Cod_prof`) REFERENCES `professores` (`Cod_prof`);

--
-- Limitadores para a tabela `matriculado`
--
ALTER TABLE `matriculado`
  ADD CONSTRAINT `fk_aluno` FOREIGN KEY (`RA`) REFERENCES `aluno` (`RA`),
  ADD CONSTRAINT `fk_disciplina` FOREIGN KEY (`Cod_disc`) REFERENCES `disciplinas` (`Cod_disc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
