-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17-Jun-2019 às 14:36
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contatos`
--

CREATE TABLE `tb_contatos` (
  `id_contatos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_enderecos`
--

CREATE TABLE `tb_enderecos` (
  `id_endereco` int(11) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `logradouro` varchar(500) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `bairro` varchar(500) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `pessoa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_enderecos`
--

INSERT INTO `tb_enderecos` (`id_endereco`, `titulo`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `pessoa_id`) VALUES
(1, 'casa', 'a', '1', 'a', 'a', 'a', 'a', '1', 0),
(9, 'trab1', 'horacio raccanello1', '3931', 'loja 31', 'centro1', 'mga1', 'p1', '8700001', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoas`
--

CREATE TABLE `tb_pessoas` (
  `id_pessoa` int(11) NOT NULL,
  `nome` text NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome_mae` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pessoas`
--

INSERT INTO `tb_pessoas` (`id_pessoa`, `nome`, `rg`, `cpf`, `nome_mae`) VALUES
(1, 'Vitor', '123456', '12345678910', 'Ana Angelica'),
(5, 'Ivone', '913987', '34567889012', 'Dionina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_contatos`
--
ALTER TABLE `tb_contatos`
  ADD PRIMARY KEY (`id_contatos`);

--
-- Indexes for table `tb_enderecos`
--
ALTER TABLE `tb_enderecos`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `pessoa_id` (`pessoa_id`);

--
-- Indexes for table `tb_pessoas`
--
ALTER TABLE `tb_pessoas`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_contatos`
--
ALTER TABLE `tb_contatos`
  MODIFY `id_contatos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_enderecos`
--
ALTER TABLE `tb_enderecos`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pessoas`
--
ALTER TABLE `tb_pessoas`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
