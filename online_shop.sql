-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- ����: localhost
-- ����� ��������: ��� 14 2015 �., 23:12
-- ������ �������: 5.6.23
-- ������ PHP: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES cp1251 */;

--
-- ���� ������: `online_shop`
--

-- --------------------------------------------------------

--
-- ��������� ������� `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `id_bask` int(5) NOT NULL,
  `id_piz` int(5) NOT NULL,
  `date_bask` date NOT NULL,
  `count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- ��������� ������� `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id_cust` int(5) NOT NULL,
  `login` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `subscribe` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `name_cust` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- ���� ������ ������� `customers`
--

INSERT INTO `customers` (`id_cust`, `login`, `pass`, `subscribe`, `email`, `phone`, `name_cust`, `address`) VALUES
(1, 'evro3101', '0r7h3jkGTR', 'bymail', 'evro3101@mail.ru', 2147483647, '�����', '���������,9'),
(2, 'lina_lina', 'k9eni^&9', 'bymail', 'lina@yandex.ru', 2147483647, '�����', '�����������,57'),
(3, 'alberto', 'alb9knhgd9@', 'byphone', 'albert@mail.ru', 2147483647, '�������', '����,45'),
(4, 'thebvog', '*b97654gd9@', 'byphone', 'thebvog@gmail.ru', 2147483647, '��������� ', '������,45'),
(5, 'redhead', 'read%d9@', 'bymail', 'redhead@mail.ru', 2147483647, '�����', '����������,45');

-- --------------------------------------------------------

--
-- ��������� ������� `ingreds`
--

CREATE TABLE IF NOT EXISTS `ingreds` (
  `id_ingr` int(5) NOT NULL,
  `name_ingr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ���� ������ ������� `ingreds`
--

INSERT INTO `ingreds` (`id_ingr`, `name_ingr`) VALUES
(1, '������'),
(2, '��� ���������'),
(3, '�����-����'),
(4, '�������'),
(5, '����������'),
(6, '������'),
(7, '��������� ����'),
(8, '����������� ���'),
(9, '������'),
(10, '�������'),
(11, '�����'),
(12, '������');

-- --------------------------------------------------------

--
-- ��������� ������� `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_ord` int(5) NOT NULL,
  `date_ord` date NOT NULL,
  `id_cust` int(5) NOT NULL,
  `delivery` varchar(40) NOT NULL,
  `bonus` double(7,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- ���� ������ ������� `order`
--

INSERT INTO `order` (`id_ord`, `date_ord`, `id_cust`, `delivery`, `bonus`) VALUES
(1, '2015-03-05', 4, '������', 54.00),
(2, '2015-03-10', 3, '�����', 32.20),
(3, '2015-03-11', 2, '�����', 64.57);

-- --------------------------------------------------------

--
-- ��������� ������� `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id_ord` int(5) NOT NULL,
  `id_piz` int(5) NOT NULL,
  `count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ���� ������ ������� `order_items`
--

INSERT INTO `order_items` (`id_ord`, `id_piz`, `count`) VALUES
(1, 2, 2),
(1, 5, 1),
(2, 3, 2),
(2, 4, 1),
(3, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- ��������� ������� `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `id_piz` int(5) NOT NULL,
  `name_piz` varchar(20) NOT NULL,
  `image_link` varchar(50) NOT NULL,
  `min_price` double(7,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- ���� ������ ������� `pizza`
--

INSERT INTO `pizza` (`id_piz`, `name_piz`, `image_link`, `min_price`) VALUES
(1, '���������', 'img1.jpg', 299.99),
(2, '������� � �����', 'img2.jpg', 345.44),
(3, '������ � �����', 'img3.jpg', 355.00),
(4, '������� � �������', 'img4.jpg', 385.50),
(5, '�������� � ��������', 'img6.jpg', 365.00);

-- --------------------------------------------------------

--
-- ��������� ������� `pizza_ingred`
--

CREATE TABLE IF NOT EXISTS `pizza_ingred` (
  `id_ingred` int(5) NOT NULL,
  `id_piz` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- ���� ������ ������� `pizza_ingred`
--

INSERT INTO `pizza_ingred` (`id_ingred`, `id_piz`) VALUES
(1, 1),
(2, 1),
(3, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(2, 3),
(3, 3),
(5, 3),
(6, 3),
(1, 4),
(2, 4),
(5, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(1, 5),
(2, 5),
(6, 5),
(7, 5),
(11, 5),
(12, 5);

-- --------------------------------------------------------

--
-- ��������� ������� `sizes_prices`
--

CREATE TABLE IF NOT EXISTS `sizes_prices` (
  `id_piz` int(5) NOT NULL,
  `name_size` varchar(20) NOT NULL,
  `price_size` double(7,2) NOT NULL,
  `weight_size` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ���� ������ ������� `sizes_prices`
--

INSERT INTO `sizes_prices` (`id_piz`, `name_size`, `price_size`, `weight_size`) VALUES
(1, 'max', 430.00, 1000.00),
(1, 'middle', 345.00, 800.00),
(1, 'min', 299.99, 500.00),
(2, 'max', 732.00, 1000.00),
(2, 'middle', 555.00, 800.00),
(2, 'min', 345.44, 500.00),
(3, 'max', 534.00, 1000.00),
(3, 'middle', 450.00, 800.00),
(3, 'min', 355.00, 500.00),
(4, 'max', 567.00, 1000.00),
(4, 'middle', 465.00, 800.00),
(4, 'min', 385.50, 500.00),
(5, 'max', 564.00, 1000.00),
(5, 'middle', 434.00, 800.00),
(5, 'min', 365.00, 500.00);

--
-- ������� ���������� ������
--

--
-- ������� ������� `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_bask`,`id_piz`), ADD KEY `id_piz` (`id_piz`);

--
-- ������� ������� `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_cust`);

--
-- ������� ������� `ingreds`
--
ALTER TABLE `ingreds`
  ADD PRIMARY KEY (`id_ingr`);

--
-- ������� ������� `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_ord`), ADD UNIQUE KEY `id_cust` (`id_cust`);

--
-- ������� ������� `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id_ord`,`id_piz`), ADD KEY `id_piz` (`id_piz`);

--
-- ������� ������� `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id_piz`);

--
-- ������� ������� `pizza_ingred`
--
ALTER TABLE `pizza_ingred`
  ADD PRIMARY KEY (`id_ingred`,`id_piz`), ADD KEY `id_piz` (`id_piz`);

--
-- ������� ������� `sizes_prices`
--
ALTER TABLE `sizes_prices`
  ADD PRIMARY KEY (`id_piz`,`name_size`);

--
-- AUTO_INCREMENT ��� ���������� ������
--

--
-- AUTO_INCREMENT ��� ������� `basket`
--
ALTER TABLE `basket`
  MODIFY `id_bask` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT ��� ������� `customers`
--
ALTER TABLE `customers`
  MODIFY `id_cust` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT ��� ������� `order`
--
ALTER TABLE `order`
  MODIFY `id_ord` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT ��� ������� `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id_piz` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT ��� ������� `pizza_ingred`
--
ALTER TABLE `pizza_ingred`
  MODIFY `id_ingred` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- ����������� �������� ����� ����������� ������
--

--
-- ����������� �������� ����� ������� `basket`
--
ALTER TABLE `basket`
ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_piz`) REFERENCES `pizza` (`id_piz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- ����������� �������� ����� ������� `ingreds`
--
ALTER TABLE `ingreds`
ADD CONSTRAINT `ingreds_ibfk_1` FOREIGN KEY (`id_ingr`) REFERENCES `pizza_ingred` (`id_ingred`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- ����������� �������� ����� ������� `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_cust`) REFERENCES `customers` (`id_cust`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- ����������� �������� ����� ������� `order_items`
--
ALTER TABLE `order_items`
ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`id_piz`) REFERENCES `pizza` (`id_piz`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`id_ord`) REFERENCES `order` (`id_ord`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- ����������� �������� ����� ������� `pizza_ingred`
--
ALTER TABLE `pizza_ingred`
ADD CONSTRAINT `pizza_ingred_ibfk_2` FOREIGN KEY (`id_piz`) REFERENCES `pizza` (`id_piz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- ����������� �������� ����� ������� `sizes_prices`
--
ALTER TABLE `sizes_prices`
ADD CONSTRAINT `sizes_prices_ibfk_1` FOREIGN KEY (`id_piz`) REFERENCES `pizza` (`id_piz`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
