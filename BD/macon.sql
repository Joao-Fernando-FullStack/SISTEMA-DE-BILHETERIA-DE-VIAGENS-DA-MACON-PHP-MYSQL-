-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jan-2024 às 14:34
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `macon`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Idade` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Destino` varchar(45) NOT NULL,
  `Telefone` varchar(45) DEFAULT NULL,
  `Preco` varchar(255) DEFAULT NULL,
  `Hora_Atual` varchar(45) DEFAULT NULL,
  `Hora_Chegada` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`Id`, `Nome`, `Idade`, `Data`, `Email`, `Destino`, `Telefone`, `Preco`, `Hora_Atual`, `Hora_Chegada`) VALUES
(3, 'Artur Paulo1', 29, '2022-01-31', 'arturpaulo17@gmail.com', 'Luanda', '+244939390070', '16.700.00', '12:50:0', '22:14'),
(9, 'Henriques Freitas', 25, '2022-02-08', 'henriques@gnail.co', 'Luanda', '933456555', '18.888', '21:0:53', '22:18'),
(11, 'Chivela Mande', 29, '2022-07-07', 'mande@gmail.com', 'Huambo', '933354456', '7000', '21:3:59', '14:14'),
(12, 'JoÃ£o Fernando', 25, '2022-07-08', 'joaofernandomatias17@gmail.com', 'Luanda', '+244 939 390 070', '16.000.00', '21:4:58', '03:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `palavra_passe` varchar(45) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `palavra_passe`, `categoria`) VALUES
(1, 'admin', '2022', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
