-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Abr-2018 às 02:06
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duval`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `id_caixa` int(11) NOT NULL,
  `caixa_data` date NOT NULL,
  `valor_abertura` decimal(10,2) NOT NULL,
  `valor_atual` decimal(10,2) NOT NULL,
  `valor_fechamento` decimal(10,2) NOT NULL,
  `caixa_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`id_caixa`, `caixa_data`, `valor_abertura`, `valor_atual`, `valor_fechamento`, `caixa_status`) VALUES
(7, '2018-04-11', '100.00', '700.00', '700.00', 1),
(8, '2018-04-11', '100.00', '100.00', '100.00', 1),
(9, '2018-04-11', '100.00', '220.00', '0.00', 0),
(10, '2018-04-12', '200.00', '999.99', '999.99', 1),
(11, '2018-04-12', '100.30', '4940.30', '0.00', 0),
(12, '2018-04-13', '100.00', '180.00', '0.00', 0),
(13, '2018-04-14', '200.00', '2400.00', '2400.00', 1),
(14, '2018-04-14', '40.00', '40.00', '40.00', 1),
(15, '2018-04-14', '40.00', '40.00', '40.00', 1),
(16, '2018-04-14', '30.00', '70.00', '70.00', 1),
(17, '2018-04-14', '30.00', '30.00', '30.00', 1),
(18, '2018-04-14', '300.00', '340.00', '340.00', 1),
(19, '2018-04-14', '300.00', '300.00', '0.00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `representante` varchar(100) DEFAULT 'Nao possui',
  `rua` varchar(20) NOT NULL,
  `bairro` varchar(70) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `inscricaoEstadual` varchar(30) NOT NULL,
  `telefone1` varchar(30) NOT NULL DEFAULT 'Nao Informado',
  `telefone2` varchar(30) NOT NULL DEFAULT 'Nao Informado',
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `representante`, `rua`, `bairro`, `numero`, `cidade`, `uf`, `complemento`, `cep`, `cnpj`, `inscricaoEstadual`, `telefone1`, `telefone2`, `email`) VALUES
(34, 'GenerososA', 'ninguemA', 'leilaA', 'pjA', '30', 'vr', 'RA', 'cada da ruaA', '2831-A', '123123.432A', '34324.23423A', '24 9993492A', '24 3343489A', 'thailan@hotmil.comA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota_fiscal`
--

CREATE TABLE `nota_fiscal` (
  `id_NF` int(11) NOT NULL,
  `cod_NF` varchar(20) NOT NULL,
  `fornecedor` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nota_fiscal`
--

INSERT INTO `nota_fiscal` (`id_NF`, `cod_NF`, `fornecedor`) VALUES
(31, '340', 34),
(32, '8979789', 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantidade` int(11) NOT NULL,
  `precoCompra` decimal(10,2) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `idforn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `nome`, `quantidade`, `precoCompra`, `precoVenda`, `idforn`) VALUES
(63, '2930423234', 'teste', 19, '30.00', '40.00', 34),
(64, 'teste1234', 'Carvao', 12, '50.00', '100.00', 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_nf`
--

CREATE TABLE `produtos_nf` (
  `id_produtos_nf` int(11) NOT NULL,
  `produto_NF` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_NF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_nf`
--

INSERT INTO `produtos_nf` (`id_produtos_nf`, `produto_NF`, `quantidade`, `id_NF`) VALUES
(10, 62, 3, 31),
(11, 63, 2, 32),
(12, 63, 5, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_venda`
--

CREATE TABLE `produtos_venda` (
  `id_prod_venda` int(11) NOT NULL,
  `prod_venda` int(11) NOT NULL,
  `qtd_venda` int(11) NOT NULL,
  `id_Venda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_venda`
--

INSERT INTO `produtos_venda` (`id_prod_venda`, `prod_venda`, `qtd_venda`, `id_Venda`) VALUES
(44, 63, 5, 47),
(45, 64, 2, 47),
(46, 63, 4, 48),
(47, 64, 3, 48),
(48, 63, 4, 48),
(49, 64, 3, 48),
(50, 63, 1, 49),
(51, 63, 1, 50),
(52, 63, 1, 51),
(53, 63, 1, 52),
(54, 63, 1, 53),
(55, 63, 1, 54),
(56, 63, 1, 55),
(57, 63, 1, 56),
(58, 63, 1, 57),
(59, 63, 1, 58),
(60, 63, 2, 59),
(61, 63, 1, 60),
(62, 63, 1, 61),
(63, 63, 1, 62),
(64, 63, 1, 62),
(65, 63, 1, 64),
(66, 63, 1, 65),
(67, 63, 1, 66),
(68, 63, 1, 67);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_Venda` int(11) NOT NULL,
  `data_Venda` datetime NOT NULL,
  `valor_total_venda` varchar(30) NOT NULL,
  `form_pgmto` varchar(30) NOT NULL,
  `devolvido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_Venda`, `data_Venda`, `valor_total_venda`, `form_pgmto`, `devolvido`) VALUES
(47, '2018-04-14 14:28:00', '400.00', 'Cartao', 0),
(48, '2018-04-14 15:02:00', '920.00', 'Cartao', 1),
(49, '2018-04-14 15:41:00', '40.00', 'Cartao', 0),
(50, '2018-04-14 15:47:00', '40.00', 'Cartao', 1),
(51, '2018-04-14 15:48:00', '40.00', 'Outro', 0),
(52, '2018-04-14 15:48:00', '40.00', 'Cartao', 0),
(53, '2018-04-14 15:49:00', '40.00', 'Cartao', 0),
(54, '2018-04-14 15:52:00', '40.00', 'Outro', 0),
(55, '2018-04-14 15:56:00', '40.00', 'Cartao', 0),
(56, '2018-04-14 15:57:00', '40.00', 'Cartao', 0),
(57, '2018-04-14 15:57:00', '40.00', 'Outro', 1),
(58, '2018-04-14 15:58:00', '40.00', 'Cartao', 1),
(59, '2018-04-14 15:58:00', '80.00', 'Cartao', 1),
(60, '2018-04-14 15:59:00', '40.00', 'Cartao', 1),
(61, '2018-04-14 16:00:00', '40.00', 'Outro', 1),
(62, '2018-04-14 16:02:00', '40.00', 'Outro', 1),
(63, '2018-04-14 16:02:00', '40.00', 'Outro', 1),
(64, '2018-04-14 16:03:00', '40.00', 'Cartao', 1),
(65, '2018-04-14 16:04:00', '40.00', 'Cartao', 1),
(66, '2018-04-14 16:12:00', '40.00', 'Dinheiro', 1),
(67, '2018-04-14 16:19:00', '40.00', 'Cartao', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`id_caixa`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  ADD PRIMARY KEY (`id_NF`),
  ADD KEY `FK_NF_Fornecedor` (`fornecedor`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Produto_Fornecedor` (`idforn`);

--
-- Indexes for table `produtos_nf`
--
ALTER TABLE `produtos_nf`
  ADD PRIMARY KEY (`id_produtos_nf`),
  ADD KEY `FK_ProdutosNF_NF` (`id_NF`);

--
-- Indexes for table `produtos_venda`
--
ALTER TABLE `produtos_venda`
  ADD PRIMARY KEY (`id_prod_venda`),
  ADD KEY `FK_ProdutosVenda_Venda` (`id_Venda`),
  ADD KEY `FK_ProdVenda_Produtos` (`prod_venda`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_Venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id_caixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  MODIFY `id_NF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `produtos_nf`
--
ALTER TABLE `produtos_nf`
  MODIFY `id_produtos_nf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produtos_venda`
--
ALTER TABLE `produtos_venda`
  MODIFY `id_prod_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_Venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  ADD CONSTRAINT `FK_NF_Fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedores` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `FK_Produto_Fornecedor` FOREIGN KEY (`idforn`) REFERENCES `fornecedores` (`id`);

--
-- Limitadores para a tabela `produtos_nf`
--
ALTER TABLE `produtos_nf`
  ADD CONSTRAINT `FK_ProdutosNF_NF` FOREIGN KEY (`id_NF`) REFERENCES `nota_fiscal` (`id_NF`);

--
-- Limitadores para a tabela `produtos_venda`
--
ALTER TABLE `produtos_venda`
  ADD CONSTRAINT `FK_ProdVenda_Produtos` FOREIGN KEY (`prod_venda`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `FK_ProdutosVenda_Venda` FOREIGN KEY (`id_Venda`) REFERENCES `venda` (`id_Venda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
