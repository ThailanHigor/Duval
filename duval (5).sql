-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Abr-2018 às 04:30
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
  `valor_abertura` decimal(5,2) NOT NULL,
  `valor_atual` decimal(5,2) NOT NULL,
  `valor_fechamento` decimal(5,2) NOT NULL,
  `caixa_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`id_caixa`, `caixa_data`, `valor_abertura`, `valor_atual`, `valor_fechamento`, `caixa_status`) VALUES
(7, '2018-04-11', '100.00', '700.00', '700.00', 1),
(8, '2018-04-11', '100.00', '100.00', '100.00', 1),
(9, '2018-04-11', '100.00', '220.00', '0.00', 0);

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
(31, '340', 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantidade` int(11) NOT NULL,
  `precoCompra` decimal(5,2) NOT NULL,
  `precoVenda` decimal(5,2) NOT NULL,
  `idforn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `nome`, `quantidade`, `precoCompra`, `precoVenda`, `idforn`) VALUES
(62, '1234567891234', 'Carvao', -31, '30.00', '40.00', 34);

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
(10, 62, 3, 31);

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
(14, 62, 1, 21),
(15, 62, 1, 22),
(16, 62, 1, 23),
(17, 62, 1, 24),
(18, 62, 1, 25),
(19, 62, 2, 26),
(20, 62, 1, 27),
(21, 62, 4, 28),
(22, 62, 1, 29),
(23, 62, 5, 30),
(24, 62, 1, 31),
(25, 62, 3, 32),
(26, 62, 3, 33),
(27, 62, 1, 34),
(28, 62, 4, 35),
(29, 62, 1, 36),
(30, 62, 1, 37),
(31, 62, 2, 37),
(32, 62, 3, 38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_Venda` int(11) NOT NULL,
  `data_Venda` datetime NOT NULL,
  `valor_total_venda` varchar(30) NOT NULL,
  `form_pgmto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_Venda`, `data_Venda`, `valor_total_venda`, `form_pgmto`) VALUES
(21, '2018-04-08 19:47:00', '40.00', 'Outro'),
(22, '2018-04-08 19:51:00', '40.00', 'Cartao'),
(23, '2018-04-08 21:29:00', '40.00', 'Cartao'),
(24, '2018-04-08 22:00:00', '40.00', 'Cartao'),
(25, '2018-04-08 22:13:00', '40.00', 'Cartao'),
(26, '2018-04-08 22:13:00', '80.00', 'Dinheiro'),
(27, '2018-04-08 22:36:00', '40.00', 'Outro'),
(28, '2018-04-08 22:46:00', '160.00', 'Cartao'),
(29, '2018-04-08 22:47:00', '40.00', 'Cartao'),
(30, '2018-04-08 22:48:00', '200.00', 'Cartao'),
(31, '2018-04-08 22:49:00', '40.00', 'Cartao'),
(32, '2018-04-11 21:46:00', '120.00', 'Cartao'),
(33, '2018-04-11 21:56:00', '120.00', 'Cartao'),
(34, '2018-04-11 21:56:00', '40.00', 'Outro'),
(35, '2018-04-11 21:58:00', '160.00', 'Outro'),
(36, '2018-04-11 22:06:00', '40.00', 'Cartao'),
(37, '2018-04-11 22:11:00', '120.00', 'Cartao'),
(38, '2018-04-11 22:37:00', '120.00', 'Cartao');

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
  ADD KEY `FK_ProdutosVenda_Venda` (`id_Venda`);

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
  MODIFY `id_caixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  MODIFY `id_NF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `produtos_nf`
--
ALTER TABLE `produtos_nf`
  MODIFY `id_produtos_nf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produtos_venda`
--
ALTER TABLE `produtos_venda`
  MODIFY `id_prod_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_Venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  ADD CONSTRAINT `FK_ProdutosVenda_Venda` FOREIGN KEY (`id_Venda`) REFERENCES `venda` (`id_Venda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
