-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jun-2021 às 17:38
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `project`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `ID` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `coment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`ID`, `name`, `phone`, `email`, `coment`) VALUES
(1, 'Francisco Laranjeira', 222222, 'user@user.com', 'aaaaa'),
(5, 'Francisco Laranjeira', 222222, 'user@user.com', 'aa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `courses`
--

CREATE TABLE `courses` (
  `ID` int(50) NOT NULL,
  `Modules` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `Grade` int(50) NOT NULL,
  `UFCD` int(50) NOT NULL,
  `INFO` varchar(80) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `courses`
--

INSERT INTO `courses` (`ID`, `Modules`, `Grade`, `UFCD`, `INFO`) VALUES
(1, 'Arquitetura interna do computador', 0, 769, 'Link UFCD'),
(3, 'Dispositivos e periféricos', 0, 770, 'Link UFCD'),
(4, 'Processadores de Texto', 0, 754, 'Link UFCD'),
(5, 'Conexões de Rede', 0, 0, 'Link UFCD'),
(6, 'Sistemas Operativos', 0, 772, 'Link UFCD'),
(7, 'Folha de Cálculo', 0, 778, 'Link UFCD'),
(8, 'Utilitários Apresentação Gráfica', 0, 779, 'Link UFCD'),
(9, 'Criação páginas Web', 0, 779, 'Link UFCD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginusers`
--

CREATE TABLE `loginusers` (
  `ID` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loginusers`
--

INSERT INTO `loginusers` (`ID`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Francisco', 'laranjeira', 'user@user.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE `projects` (
  `IDp` int(50) NOT NULL,
  `IDmodule` int(50) NOT NULL,
  `module` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `project` varchar(60) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`IDp`, `IDmodule`, `module`, `project`) VALUES
(1, 4, 'Processadores de Texto', 'Interfaces'),
(2, 4, 'Processadores de Texto', 'Neve'),
(5, 1, 'Arquitetura interna do computador', 'RISC e CISC'),
(6, 3, 'Dispositivos e Periféricos', 'Lei de OHM'),
(7, 3, 'Dispositivos e Periféricos', 'Fundamentos da Eletricidade'),
(8, 5, 'Conexões de Rede', 'Cablagem CAP'),
(9, 5, 'Conexões de Rede', 'Topologias de Redes'),
(10, 6, 'Sistemas Operativos', 'Windows 10'),
(11, 7, 'Folha de Cálculo', 'Funções e Estatísticas'),
(12, 7, 'Folha de Cálculo', 'Formatação Condicional'),
(13, 7, 'Folha de Cálculo', 'Gráficos'),
(14, 7, 'Folha de Cálculo', 'Tabelas Dinâmicas'),
(15, 8, 'Utilitários Apresentação Gráfica', 'Modelo Powerpoint'),
(16, 8, 'Utilitários Apresentação Gráfica', '7 Maravilhas'),
(17, 9, 'Criação páginas Web', 'Receita');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `loginusers`
--
ALTER TABLE `loginusers`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`IDp`),
  ADD KEY `IDmodule` (`IDmodule`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `loginusers`
--
ALTER TABLE `loginusers`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `IDp` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`IDmodule`) REFERENCES `courses` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
