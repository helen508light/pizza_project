-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 14 2015 г., 23:12
-- Версия сервера: 5.6.23
-- Версия PHP: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES cp1251 */;

--
-- База данных: `online_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `id_bask` int(5) NOT NULL,
  `id_piz` int(5) NOT NULL,
  `date_bask` date NOT NULL,
  `count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
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
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id_cust`, `login`, `pass`, `subscribe`, `email`, `phone`, `name_cust`, `address`) VALUES
(1, 'evro3101', '0r7h3jkGTR', 'bymail', 'evro3101@mail.ru', 2147483647, 'Елена', 'Эсперанто,9'),
(2, 'lina_lina', 'k9eni^&9', 'bymail', 'lina@yandex.ru', 2147483647, 'Алина', 'Вишневского,57'),
(3, 'alberto', 'alb9knhgd9@', 'byphone', 'albert@mail.ru', 2147483647, 'Альберт', 'Заря,45'),
(4, 'thebvog', '*b97654gd9@', 'byphone', 'thebvog@gmail.ru', 2147483647, 'Владислав ', 'Фучика,45'),
(5, 'redhead', 'read%d9@', 'bymail', 'redhead@mail.ru', 2147483647, 'Дарья', 'Ломжинская,45');

-- --------------------------------------------------------

--
-- Структура таблицы `ingreds`
--

CREATE TABLE IF NOT EXISTS `ingreds` (
  `id_ingr` int(5) NOT NULL,
  `name_ingr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingreds`
--

INSERT INTO `ingreds` (`id_ingr`, `name_ingr`) VALUES
(1, 'Томаты'),
(2, 'Сыр Моцарелла'),
(3, 'Пицца-соус'),
(4, 'Ветчина'),
(5, 'Шампиньоны'),
(6, 'Курица'),
(7, 'Чесночный соус'),
(8, 'Маринованый лук'),
(9, 'Лосось'),
(10, 'Орегано'),
(11, 'Бекон'),
(12, 'Чеснок');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_ord` int(5) NOT NULL,
  `date_ord` date NOT NULL,
  `id_cust` int(5) NOT NULL,
  `delivery` varchar(40) NOT NULL,
  `bonus` double(7,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_ord`, `date_ord`, `id_cust`, `delivery`, `bonus`) VALUES
(1, '2015-03-05', 4, 'курьер', 54.00),
(2, '2015-03-10', 3, 'лично', 32.20),
(3, '2015-03-11', 2, 'лично', 64.57);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id_ord` int(5) NOT NULL,
  `id_piz` int(5) NOT NULL,
  `count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
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
-- Структура таблицы `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `id_piz` int(5) NOT NULL,
  `name_piz` varchar(20) NOT NULL,
  `image_link` varchar(50) NOT NULL,
  `min_price` double(7,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id_piz`, `name_piz`, `image_link`, `min_price`) VALUES
(1, 'Маргарита', 'img1.jpg', 299.99),
(2, 'Ветчина и грибы', 'img2.jpg', 345.44),
(3, 'Курица и грибы', 'img3.jpg', 355.00),
(4, 'Морская с грибами', 'img4.jpg', 385.50),
(5, 'Цыпленок с чесноком', 'img6.jpg', 365.00);

-- --------------------------------------------------------

--
-- Структура таблицы `pizza_ingred`
--

CREATE TABLE IF NOT EXISTS `pizza_ingred` (
  `id_ingred` int(5) NOT NULL,
  `id_piz` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pizza_ingred`
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
-- Структура таблицы `sizes_prices`
--

CREATE TABLE IF NOT EXISTS `sizes_prices` (
  `id_piz` int(5) NOT NULL,
  `name_size` varchar(20) NOT NULL,
  `price_size` double(7,2) NOT NULL,
  `weight_size` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sizes_prices`
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
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_bask`,`id_piz`), ADD KEY `id_piz` (`id_piz`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_cust`);

--
-- Индексы таблицы `ingreds`
--
ALTER TABLE `ingreds`
  ADD PRIMARY KEY (`id_ingr`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_ord`), ADD UNIQUE KEY `id_cust` (`id_cust`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id_ord`,`id_piz`), ADD KEY `id_piz` (`id_piz`);

--
-- Индексы таблицы `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id_piz`);

--
-- Индексы таблицы `pizza_ingred`
--
ALTER TABLE `pizza_ingred`
  ADD PRIMARY KEY (`id_ingred`,`id_piz`), ADD KEY `id_piz` (`id_piz`);

--
-- Индексы таблицы `sizes_prices`
--
ALTER TABLE `sizes_prices`
  ADD PRIMARY KEY (`id_piz`,`name_size`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_bask` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id_cust` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id_ord` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id_piz` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `pizza_ingred`
--
ALTER TABLE `pizza_ingred`
  MODIFY `id_ingred` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_piz`) REFERENCES `pizza` (`id_piz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ingreds`
--
ALTER TABLE `ingreds`
ADD CONSTRAINT `ingreds_ibfk_1` FOREIGN KEY (`id_ingr`) REFERENCES `pizza_ingred` (`id_ingred`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_cust`) REFERENCES `customers` (`id_cust`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`id_piz`) REFERENCES `pizza` (`id_piz`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`id_ord`) REFERENCES `order` (`id_ord`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pizza_ingred`
--
ALTER TABLE `pizza_ingred`
ADD CONSTRAINT `pizza_ingred_ibfk_2` FOREIGN KEY (`id_piz`) REFERENCES `pizza` (`id_piz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sizes_prices`
--
ALTER TABLE `sizes_prices`
ADD CONSTRAINT `sizes_prices_ibfk_1` FOREIGN KEY (`id_piz`) REFERENCES `pizza` (`id_piz`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
