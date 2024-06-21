-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2024 às 04:25
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdveterinaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbanimal`
--

CREATE TABLE `tbanimal` (
  `codanimal` int(11) NOT NULL,
  `nomeanimal` varchar(100) NOT NULL,
  `fotoanimal` varchar(225) DEFAULT NULL,
  `codtipoanimal` int(11) DEFAULT NULL,
  `codcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbanimal`
--

INSERT INTO `tbanimal` (`codanimal`, `nomeanimal`, `fotoanimal`, `codtipoanimal`, `codcliente`) VALUES
(1, 'Gatito', 'gatito.avif', 1, 1),
(2, 'Pepe', 'pepegaio.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbatendimento`
--

CREATE TABLE `tbatendimento` (
  `codatendimento` int(11) NOT NULL,
  `dataatendimento` date NOT NULL,
  `horaatendimento` time NOT NULL,
  `codanimal` int(11) DEFAULT NULL,
  `codvet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbatendimento`
--

INSERT INTO `tbatendimento` (`codatendimento`, `dataatendimento`, `horaatendimento`, `codanimal`, `codvet`) VALUES
(1, '2024-06-12', '12:30:00', 1, 1),
(2, '2024-07-15', '13:40:00', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `codcliente` int(11) NOT NULL,
  `nomecliente` varchar(100) NOT NULL,
  `telefonecliente` varchar(20) DEFAULT NULL,
  `emailcliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`codcliente`, `nomecliente`, `telefonecliente`, `emailcliente`) VALUES
(1, 'Bruno Garcia', '11996677', 'brunno@gmail.com'),
(2, 'Gustavo', '11977883', 'gust@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipoanimal`
--

CREATE TABLE `tbtipoanimal` (
  `codtipoanimal` int(11) NOT NULL,
  `tipoanimal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbtipoanimal`
--

INSERT INTO `tbtipoanimal` (`codtipoanimal`, `tipoanimal`) VALUES
(1, 'Gato'),
(2, 'Papagaio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbveterinario`
--

CREATE TABLE `tbveterinario` (
  `codvet` int(11) NOT NULL,
  `nomevet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbveterinario`
--

INSERT INTO `tbveterinario` (`codvet`, `nomevet`) VALUES
(1, 'Giovanni Silva'),
(2, 'Bruna Pereira');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`codanimal`),
  ADD KEY `codtipoanimal` (`codtipoanimal`),
  ADD KEY `codcliente` (`codcliente`);

--
-- Índices para tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  ADD PRIMARY KEY (`codatendimento`),
  ADD KEY `codanimal` (`codanimal`),
  ADD KEY `codvet` (`codvet`);

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`codcliente`);

--
-- Índices para tabela `tbtipoanimal`
--
ALTER TABLE `tbtipoanimal`
  ADD PRIMARY KEY (`codtipoanimal`);

--
-- Índices para tabela `tbveterinario`
--
ALTER TABLE `tbveterinario`
  ADD PRIMARY KEY (`codvet`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  MODIFY `codanimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  MODIFY `codatendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `codcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbtipoanimal`
--
ALTER TABLE `tbtipoanimal`
  MODIFY `codtipoanimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbveterinario`
--
ALTER TABLE `tbveterinario`
  MODIFY `codvet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD CONSTRAINT `tbanimal_ibfk_1` FOREIGN KEY (`codtipoanimal`) REFERENCES `tbtipoanimal` (`codtipoanimal`),
  ADD CONSTRAINT `tbanimal_ibfk_2` FOREIGN KEY (`codcliente`) REFERENCES `tbcliente` (`codcliente`);

--
-- Limitadores para a tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  ADD CONSTRAINT `tbatendimento_ibfk_1` FOREIGN KEY (`codanimal`) REFERENCES `tbanimal` (`codanimal`),
  ADD CONSTRAINT `tbatendimento_ibfk_2` FOREIGN KEY (`codvet`) REFERENCES `tbveterinario` (`codvet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
