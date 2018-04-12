-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Abr-2018 às 23:38
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
(1, '2018-04-09', '30.00', '30.00', '30.00', 1),
(2, '2018-04-09', '5.00', '5.00', '5.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `representante` varchar(100) DEFAULT 'Nao possui',
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cidade` varchar(100) NOT NULL,
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
(39, 'ArtWeb', 'Rodrigo Rodrigues e Thailan Higor', 'Av. Almirante Adalberto de Barros Nunes', 'Vila Mury', '1326', 'Volta Redonda', 'RJ', 'Apt 202', '27281800', '15585876759', '15585876759', '24999713157', '24999084826', 'artwebvr@hotmail.com'),
(40, 'Rodrigo wquhdiuwqhf 1 soihdsaihfsuafhsa4 fioasoj 5', 'oijdasoifhsahf6 doisajdiosajdoa 9 jdsoijdoaisdas 8', 'jsdaljdaskldsad 0 dasiodjsaidjas 8', 'kldjksajkldjs 0 idhasiudhsa1 daishdsuiahd 2', '256', 'kjhdjshsajdkhsjkas ashdadsakdkj2', 'rj', 'apt 20265', '275866523266', '2132156465765132134646542133', '1312465498723132', '21343465498721', '21321564489765', 'ohdqwidhwqfjqw@fsjoifjasiofhasekmgads.com.brr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota_fiscal`
--

CREATE TABLE `nota_fiscal` (
  `id_NF` int(11) NOT NULL,
  `cod_NF` varchar(20) NOT NULL,
  `fornecedor` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(50) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantidade` int(50) NOT NULL,
  `precoCompra` decimal(5,2) NOT NULL,
  `precoVenda` decimal(5,2) NOT NULL,
  `idforn` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `nome`, `quantidade`, `precoCompra`, `precoVenda`, `idforn`) VALUES
(1, '7895421154235', 'Smart Phone 4G 16GB de Ram e Memoria', 0, '25.00', '650.00', 39),
(2, '7895465898756', 'Notebook 123 Dell Samsung Fonte de Vida', 0, '25.00', '265.00', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_nf`
--

CREATE TABLE `produtos_nf` (
  `id_produtos_nf` int(50) NOT NULL,
  `produto_NF` int(50) NOT NULL,
  `quantidade` int(50) NOT NULL,
  `id_NF` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_venda`
--

CREATE TABLE `produtos_venda` (
  `id_prod_venda` int(50) NOT NULL,
  `prod_venda` int(50) NOT NULL,
  `qtd_venda` int(50) NOT NULL,
  `id_Venda` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id_caixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  MODIFY `id_NF` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produtos_nf`
--
ALTER TABLE `produtos_nf`
  MODIFY `id_produtos_nf` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos_venda`
--
ALTER TABLE `produtos_venda`
  MODIFY `id_prod_venda` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_Venda` int(11) NOT NULL AUTO_INCREMENT;

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
