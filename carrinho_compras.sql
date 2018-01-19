-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jan-2018 às 19:16
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrinho_compras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristica`
--

CREATE TABLE `caracteristica` (
  `id_carac` int(11) NOT NULL,
  `descricao` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caracteristica`
--

INSERT INTO `caracteristica` (`id_carac`, `descricao`) VALUES
(1, 'Altura'),
(2, 'Largura'),
(3, 'Profundidade'),
(4, 'Peso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_car` int(11) NOT NULL,
  `data_criacao` date NOT NULL,
  `horario_criacao` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_car`, `data_criacao`, `horario_criacao`) VALUES
(25920, '2018-01-19', '17:05:42'),
(20347, '2018-01-19', '15:36:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `car_item`
--

CREATE TABLE `car_item` (
  `id_car` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `car_item`
--

INSERT INTO `car_item` (`id_car`, `id_item`) VALUES
(9900, 85),
(9900, 86);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_cat`, `descricao`) VALUES
(1, 'Moveis'),
(2, 'Decoração'),
(3, 'Infantil'),
(4, 'Iluminação'),
(5, 'Utilidade Domésticas'),
(6, 'Jardim e Lazer'),
(7, 'Reforma e Garagem'),
(8, 'Eletro'),
(9, 'Cama, Mesa e Banho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `quantidade`, `id_produto`) VALUES
(85, 2, 1),
(86, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `total_compra` float NOT NULL,
  `forma_pagamento` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `horario_pedido` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_car`, `total_compra`, `forma_pagamento`, `data_pedido`, `horario_pedido`) VALUES
(26940, 9900, 2294.94, 1, '2018-01-19', '15:36:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `preco` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `imagem`, `preco`) VALUES
(1, 'Guarda-Roupa', 'A largura de 2,40 metros do Guarda-Roupa Bartira Curitiba garante espaço e compartimentos ideais para organizar roupas e acessórios de um casal ou para os solteiros que têm muitas peças, porque o espaço disponibilizado atende perfeitamente para guardar roupas variadas, lençóis, fronhas, bolsas e até mesmo calçados.', 'https://c.mlcdn.com.br//guarda-roupa-casal-3-portas-de-correr-poliman-moveis-madri-com-espelho/v/210x210/217132200.jpg', 768.9),
(2, 'Mesa', 'A mesa de jantar é um ponto de encontro de famílias e amigos onde acontecem momentos únicos e inesquecíveis! Por isso, escolher a mesa certa faz toda a diferença.', 'https://images.etna.com.br/produtos/13/412613/412613_ampliada.jpg', 299),
(3, 'Sofá de Canto 4 Lugares Alaska Chenille Marrom', 'Olha só que encanto! O Sofá Alaska é o móvel perfeito para o seu lar. Com ele a sua sala de estar vai ficar muito mais confortável e aconchegante! Seu modelo de canto não ocupa muito espaço, suas almofadas do encosto são soltas, garantindo assim mais conforto para você e suas visitas. Seu design moderno é ideal para proporcionar um ambiente mais elegante. Aproveite!', 'https://staticmobly.akamaized.net/p/American-Comfort-SofC3A1-de-Canto-4-Lugares-Alaska-Chenille-Marrom-3455-713862-1-zoom.jpg', 757.14),
(4, 'Caixa Térmica 32 Litros Vermelha', 'Única no mercado com sobretampa para acesso rápido e fácil às latas e alimentos;\r\nSistema prático de abertura e tampa com porta-copos numerados;\r\nPossui alça lateral embutida e alça tiracolo, mais prática para transportar;\r\nIsolamento térmico em EPS;\r\nBoa eficiência térmica;\r\nCom capacidade para 32 litros.', 'https://staticmobly.akamaized.net/p/Soprano-Caixa-TC3A9rmica-32-Litros-Vermelha-9953-622004-1-zoom.jpg', 200.3),
(5, 'Pendente Cupula 15" Alumínio Preta', 'A iluminação certa pode salvar ou arruinar tudo. Pensando nisso, foi desenvolvido este Pendente. Com ele, seu lar vai ficar muito mais estiloso e cheio de atitude. Um item indispensável para dar aquela repaginada na decoração sua casa.', 'https://staticmobly.akamaized.net/p/Skylux-Pendente-Cupula-1522-AlumC3ADnio-Preta-9158-991183-1-zoom.jpg', 208.99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod_carac`
--

CREATE TABLE `prod_carac` (
  `id_produto` int(11) NOT NULL,
  `id_carac` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prod_carac`
--

INSERT INTO `prod_carac` (`id_produto`, `id_carac`, `descricao`) VALUES
(1, 1, '280 cm'),
(1, 2, '180 cm'),
(1, 3, '48 cm'),
(1, 4, '115,900 kg'),
(2, 1, '80 cm'),
(2, 2, '160 cm'),
(2, 3, '90 cm'),
(2, 4, '32,800 kg'),
(3, 1, '76 cm'),
(3, 2, '200 cm'),
(3, 3, '160 cm'),
(3, 4, '47,000 kg'),
(5, 4, '1,280 kg'),
(5, 3, '39 cm'),
(5, 2, '39 cm'),
(4, 1, '32 cm'),
(4, 2, '49 cm'),
(4, 3, '33 cm'),
(4, 4, '2700,000 kg'),
(5, 1, '27 cm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod_cat`
--

CREATE TABLE `prod_cat` (
  `id_produto` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prod_cat`
--

INSERT INTO `prod_cat` (`id_produto`, `id_cat`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 6),
(5, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`id_carac`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_car`),
  ADD UNIQUE KEY `id_car` (`id_car`);

--
-- Indexes for table `car_item`
--
ALTER TABLE `car_item`
  ADD PRIMARY KEY (`id_car`,`id_item`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `prod_carac`
--
ALTER TABLE `prod_carac`
  ADD PRIMARY KEY (`id_produto`,`id_carac`),
  ADD KEY `id_carac` (`id_carac`);

--
-- Indexes for table `prod_cat`
--
ALTER TABLE `prod_cat`
  ADD PRIMARY KEY (`id_produto`,`id_cat`),
  ADD KEY `id_cat` (`id_cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `id_carac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31689;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26941;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
