-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 03 2021 г., 18:51
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oct_homely_shop`
--

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `all_about_products`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `all_about_products` (
`id` bigint(20) unsigned
,`name` varchar(100)
,`price` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_url`) VALUES
(1, 'постельное белье', 'bedclothes'),
(2, 'покрывала', 'bedspreads'),
(3, 'для животных', 'pet'),
(4, 'коврики', 'rugs'),
(5, 'скатерти', 'tableclothe'),
(6, 'посуда', 'tableware'),
(7, 'полотенца', 'towel');

-- --------------------------------------------------------

--
-- Структура таблицы `images_products`
--

CREATE TABLE `images_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `images_products`
--

INSERT INTO `images_products` (`id`, `image_url`, `product_id`) VALUES
(1, 'polutornuj-komplekt-ranforz31', 1),
(2, 'dvuspalnyj-komplekt-byaz1', 2),
(3, 'dvuspalnyj-komplekt-byaz2', 2),
(4, 'dvuspalnyj-komplekt-byaz3', 2),
(5, 'cube1', 3),
(6, 'cube2', 3),
(7, 'Familia 1', 4),
(8, 'Familia 2', 4),
(9, 'Aqua Fiber blue1', 5),
(10, 'Aqua Fiber blue2', 5),
(11, 'Aqua Fiber Premium1', 6),
(12, 'Aqua Fiber Premium2', 6),
(13, 'kichen21', 9),
(14, 'kichen22', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_full` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `total_quantity` bigint(20) NOT NULL,
  `total_cost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name_full`, `email`, `phone`, `total_quantity`, `total_cost`) VALUES
(1, 'Петров Костя', 'petrov@mail.com', '236-55-78', 5, '5066'),
(2, 'Сушка Анна', 'ann@qwe.rt', '456-89-23', 2, '1250');

--
-- Триггеры `orders`
--
DELIMITER $$
CREATE TRIGGER `del_order_prod` BEFORE DELETE ON `orders` FOR EACH ROW DELETE FROM orders_products WHERE orders_products.order_id = old.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_order_status` BEFORE DELETE ON `orders` FOR EACH ROW DELETE FROM status_orders WHERE status_orders.order_id=old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity_product` bigint(20) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `phones`
--

INSERT INTO `phones` (`id`, `phone`, `users_id`) VALUES
(11, '(097)555-74-89', 1),
(12, '(050)666-50-50', 1),
(13, '(093)151-77-88', 1),
(14, '(056)145-12-13', 3),
(15, '(096)155-12-13', 3),
(16, '(093)174-55-87', 3),
(17, '(066)777-88-99', 2),
(18, '(050)789-32-65', 2),
(19, '(073)154-89-65', 2),
(20, '(056)157-45-45', 2),
(21, '123-45-69', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `general_description` varchar(255) NOT NULL,
  `list_detail` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `is_recommended` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `general_description`, `list_detail`, `price`, `is_recommended`, `category_id`) VALUES
(1, 'Комплект постельного белья «Перья»', 'Оригинальный комплект постельного белья, изготовленный из качественных материалов.', 'Комплектация: двуспальный (евро)\r\nМатериал: сатин (100% хлопок);\r\nПлотность ткани: 130 гр/м2\r\nРазмер пододеяльника: 200*220 см\r\nЗастёжка пододеяльника: пуговицы\r\nРазмер наволочки: 50*70 см (2 шт.) и 70*70 см (2 шт.)\r\nЗастёжка наволочки: клапан\r\nРазмер простыни: 230*250 см', '750', 1, 1),
(2, 'Комплект постельного белья «Полоска», розовый', 'Оригинальный комплект постельного белья, изготовленный из качественных материалов. Нежность и мягкость этого комплекта постельного белья не исчезнут даже через несколько лет использования.', 'Комплектация: двуспальный\r\nМатериал: сатин (100% хлопок);\r\nПлотность ткани: 125 гр/м2\r\nРазмер пододеяльника: 180*215 см\r\nЗастёжка пододеяльника: пуговицы\r\nРазмер наволочки: 70*70 см (2 шт.)\r\nЗастёжка наволочки: клапан\r\nРазмер простыни: 160*200*30 см\r\nКрепление простыни: резинка (бортик на высоту матраса 30 см)', '850', NULL, 1),
(3, 'Покривало Eva', 'Покрывало поможет вам оформить спальню в изысканной роскоши.', 'Набор для спальни состоит из покрывала размером 250х260 см и двух наволочек 50х70 см;', '1020', NULL, 2),
(4, 'Покривало+наволочки Jean', 'Покрывало поможет вам оформить спальню в изысканной роскоши. ', 'Набор для спальни состоит из покрывала размером 250х260 см и двух наволочек 50х70 см;', '999', 1, 2),
(5, 'Банные полотенца SoftNess Bordo', 'После теплой ванной всегда приятно завернуться в мягкое и пушистое банное полотенце.', 'ОСНОВНЫЕ ХАРАКТЕРИСТИКИ\r\nТкань	Махра,100% Хлопок\r\nЦвет	Красный\r\nПлотность	\r\n400 гр/м²\r\nПроизводство	Украина-Италия\r\nУпаковка	ПВХ\r\nРекомендации по уходу	\r\nСтирать при температуре 40°С деликатный  режим. Стирать соответственно цветовой гамме.\r\n\r\nХимическая чистка', '94', 1, 7),
(6, 'Банные полотенца SoftNess Darkemerald', 'После теплой ванной всегда приятно завернуться в мягкое и пушистое банное полотенце. Без этого предмета не обойтись в повседневной жизни. 100% натуральный состав очень важен.', 'ОСНОВНЫЕ ХАРАКТЕРИСТИКИ\r\nТкань	Махра,100% Хлопок\r\nЦвет	Бирюзовый\r\nПлотность	\r\n400 гр/м²\r\nПроизводство	Украина-Италия\r\nУпаковка	ПВХ\r\nРекомендации по уходу	\r\nСтирать при температуре 40°С деликатный  режим. Стирать соответственно цветовой гамме.\r\n\r\nХимическая чистка', '236', NULL, 7),
(7, 'Коврик в ванную комнату', 'Махровый коврик', 'Размер:50*70, Плотность:700 г/м2, Ткань:Махра, Состав:100% Хлопок. Махра – натуральная хлопковая ткань, поверхность которой состоит из множества нитевых петель. На ощупь она мягкая, легкая и воздушная, не вызывает раздражения при контакте с кожей и хорошо поглощает влагу. В использовании махровое полотенце не только впитывает влагу, но и легко массажирует тело.', '337', NULL, 4),
(8, 'Коврик для кухни', 'Тип: коврик для кухни.', 'Размер: 50*125. Состав Верх - полиэстер, цифровая печать, основа из нескользящего ПВХ. Упаковка: PVC упаковка. Страна пр-во: Турция.', '867', NULL, 4),
(9, 'Набор кухонных полотенец Waffle Maccaron', 'Благородная классика кухонного текстиля - вафельные полотенца. ', 'ОСНОВНЫЕ ХАРАКТЕРИСТИКИ\r\nТкань	100% Хлопок\r\nЦвет	Разноцветный \r\nПлотность	\r\n180 г/м2\r\nПроизводство	Украина-Италия\r\nУпаковка	ПВХ\r\nРекомендации по уходу	\r\nСтирать при температуре 40°С деликатный  режим. Стирать соответственно цветовой гамме.\r\n\r\nХимическая чистка', '175', 1, 7),
(10, 'Набор полотенец', 'Набор махровых полотенец для кухни', 'Состав: 100% хлопок; Комплект: полотенце махровое с декоративным бордюром размер 40х60 см.-1шт. полотенце вафельное с жаккардовым рисунком размер 40х60 см.-1 шт.; Страна производитель Турция', '360', NULL, 7);

--
-- Триггеры `products`
--
DELIMITER $$
CREATE TRIGGER `del_product_img` BEFORE DELETE ON `products` FOR EACH ROW DELETE FROM images_products WHERE images_products.product_id=old.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_product_order_product` BEFORE DELETE ON `products` FOR EACH ROW DELETE FROM orders_products WHERE orders_products.product_id=old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `recomend_product`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `recomend_product` (
`id` bigint(20) unsigned
,`name` varchar(100)
,`price` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Структура таблицы `status_orders`
--

CREATE TABLE `status_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `status_orders`
--

INSERT INTO `status_orders` (`id`, `status`, `order_id`) VALUES
(1, 'Новый', 1),
(2, 'Новый', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role`) VALUES
(1, 'Boss', '123qwErty', 'boss@mail.com', 'admin'),
(2, 'Vasja', 'aSdfg234V', 'vasja@mail.com', 'admin'),
(3, 'Ivan', 'XRE345fds', 'ivan@mail.com', 'admin'),
(4, 'qwe', 'qwe@qwe', 'e@ef', 'user'),
(5, 'admin', 'qwerty', 'admin@qwe.qwe', 'admin');

-- --------------------------------------------------------

--
-- Структура для представления `all_about_products`
--
DROP TABLE IF EXISTS `all_about_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_about_products`  AS SELECT `products`.`id` AS `id`, `products`.`name` AS `name`, `products`.`price` AS `price` FROM `products` WHERE `products`.`id` ORDER BY `products`.`id` ASC LIMIT 0, 6 ;

-- --------------------------------------------------------

--
-- Структура для представления `recomend_product`
--
DROP TABLE IF EXISTS `recomend_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recomend_product`  AS SELECT `products`.`id` AS `id`, `products`.`name` AS `name`, `products`.`price` AS `price` FROM `products` WHERE (`products`.`is_recommended` = 1) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images_products`
--
ALTER TABLE `images_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `status_orders`
--
ALTER TABLE `status_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `images_products`
--
ALTER TABLE `images_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `images_products`
--
ALTER TABLE `images_products`
  ADD CONSTRAINT `images_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `status_orders`
--
ALTER TABLE `status_orders`
  ADD CONSTRAINT `status_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
