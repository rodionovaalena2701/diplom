-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 08 2025 г., 21:57
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MonkieStoreBase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `id_client_cart` int NOT NULL,
  `id_product_cart` int NOT NULL,
  `cart_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_cart`, `id_client_cart`, `id_product_cart`, `cart_quantity`) VALUES
(4, 1, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_client` int NOT NULL,
  `id_product` int NOT NULL,
  `id_status_order` int NOT NULL,
  `quantity_product` int NOT NULL,
  `order_cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_client`, `id_product`, `id_status_order`, `quantity_product`, `order_cost`) VALUES
(1, 1, 3, 5, 1, 20088),
(2, 2, 7, 5, 2, 1598),
(3, 1, 2, 4, 1, 8728),
(4, 3, 5, 4, 1, 1697),
(5, 4, 11, 3, 5, 2450),
(6, 5, 1, 3, 1, 2462),
(7, 2, 8, 2, 3, 900),
(8, 4, 10, 2, 1, 270),
(9, 3, 9, 5, 2, 540),
(10, 5, 4, 1, 1, 15884),
(15, 1, 11, 1, 2, 980);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL,
  `name_product` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `country` varchar(30) NOT NULL,
  `year` varchar(4) NOT NULL,
  `quantity` int NOT NULL,
  `cost` float NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `description`, `country`, `year`, `quantity`, `cost`, `picture`) VALUES
(1, 'Конструктор LEGO BrickHeadz набор Царь Обезьян', 'тип конструктора: классический, серия: BrickHeadz, возраст: от 10 лет, пол: для девочек, для мальчиков, унисекс, материал: пластик', 'Китай', '2022', 45, 2462, 'public\\img\\товары\\лего 1.jpg'),
(2, 'Конструктор Monkie Kid Робот Шестиухого Макака', 'Внимание всем героям! Шестиухий Макак построил могущественного робота. Используйте карту и компас Манки Кида, чтобы найти Огненные кольца и подготовить Мэй к битве.', 'Китай', '2022', 70, 8728, 'public\\img\\товары\\лего 2.jpg'),
(3, 'Конструктор LEGO Monkie Kid Город фонарей', 'Набор LEGO Monkie Kid позволяет детям построить Город фонарей для разнообразной игры. Включает в себя модель магазина LEGO, гостиницу, магазин Fast Panda, 2 ресторана, караоке-кафе, кафе с пузырьковым чаем, скоростной поезд и рельсы, проходящие по городу. Здания могут быть легко разделены и объединены различными способами для создания уникального города.', 'Китай', '2021', 5, 20088, 'public\\img\\товары\\лего 3.jpg'),
(4, 'Конструктор Monkie Kid Ультра Мех', 'Это игрушка, которая очаровала бесчисленное множество детей и взрослых, а благодаря умелому комбинированию и сборке она может стимулировать наше творчество и воображение.', 'Китай', '2020', 1, 15884, 'public\\img\\товары\\лего 4.jpg'),
(5, 'Конструктор Lego Monkie Рынок короля обезьян', 'Минифигурка Monkey King из этого набора представляет собой комбинацию головы и ног из набора 80045 Monkey King Ultra Mech и туловища из его \"классического\" дизайна.', 'Таиланд', '2023', 55, 1697, 'public\\img\\товары\\лего 5.jpg'),
(6, 'Брелок для ключей «Ред Сан»', 'Брелок с главным огненным мальчиком всего мультфильма.', 'Китай', '2020', 92, 599, 'public\\img\\товары\\брелок 5.jpg'),
(7, 'Брелок для ключей «Манки-кид»', 'Брелок с главным героем мультфильма.', 'Китай', '2020', 55, 799, 'public\\img\\товары\\брелок 6.jpg'),
(8, 'Брелок «Леди Костяной Демон» прямоугольный', 'Плотный прямоугольный брелок с главным антагонистом 3 сезона, которому не страшны царапины.', 'Россия', '2023', 22, 300, 'public\\img\\товары\\брелок 1.jpg'),
(9, 'Брелок «Леди Костяной Демон» круглый', 'Плотный круглый брелок с главным антагонистом 3 сезона, которому не страшны царапины.', 'Россия', '2023', 99, 270, 'public\\img\\товары\\брелок 2.jpg'),
(10, 'Брелок «Герой и Воин» круглый', 'Плотный круглый брелок с главными обезьянами шоу, которому не страшны царапины.', 'Россия', '2023', 2, 270, 'public\\img\\товары\\брелок 3.jpg'),
(11, 'Набор брелоков с лицами персонажей 2 шт.', 'Лотерея: покупка двух не повторяющихся брелоков в зависимости от их наличия на складе. ', 'Россия', '2024', 82, 490, 'public\\img\\товары\\брелки 4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int NOT NULL,
  `stars` int NOT NULL,
  `theme` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `desc` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `id_order` int NOT NULL,
  `picture` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id_review`, `stars`, `theme`, `desc`, `id_order`, `picture`) VALUES
(1, 5, NULL, NULL, 1, NULL),
(2, 4, 'Доставка', 'Приехало в слегка помятой упаковке.', 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Собирается'),
(2, 'Отдан в доставку'),
(3, 'В стране назначения'),
(4, 'В пункте выдачи'),
(5, 'Выдан'),
(6, 'Отменён');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `surname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `patronymic` varchar(30) DEFAULT NULL,
  `phone` varchar(18) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `adress` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `login` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `role` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `surname`, `name`, `patronymic`, `phone`, `email`, `adress`, `login`, `password`, `nickname`, `avatar`, `role`) VALUES
(1, 'Родионова', 'Алёна', 'Александровна', '+7 (915) 221-37-80', 'aluxacheburek@mail.ru', 'Московская обл г Луховицы ул Пушкина д 143 43', 'admin', 'admin11', 'Admin', 'public\\img\\аватарки\\первоначалка.png', 'администратор'),
(2, 'Кузнецова', 'Топаз', '', '+8 (909) 919-20-03', NULL, 'Московская обл г Коломна ул Весенняя д 1', 'topazgem', '11111', NULL, 'public\\img\\аватарки\\base.svg', 'клиент'),
(3, 'Морозова', 'Пелагея', 'Сергеевна', '+8 (912) 573-24-12', NULL, 'Московская обл г Коломна ул Октябрьской революции д 43 12', 'frozenbelobog', 'coldpassword', NULL, 'public\\img\\аватарки\\base.svg', 'клиент'),
(4, 'Петров', 'Сергей', 'Семенович', '+8 (915) 573-84-11', NULL, 'Московская обл г Луховицы ул Жуковского д 15 1', 'normal_person', 'pass098', NULL, 'public\\img\\аватарки\\base.svg', 'клиент'),
(5, 'Вонвак', 'Михаил', 'Сергеевич', '+8 (915) 024-81-87', NULL, 'Московская обл г Луховицы ул Полевая д 5', 'planetvonvak', 'vonvonvak', NULL, 'public\\img\\аватарки\\base.svg', 'клиент'),
(6, 'Оленьева', 'Лилия', 'Марьевна', '+7 (922) 221-47-01', NULL, 'Рязанская обл ул Пушкина д 1', 'olenievabest', 'deerpass', NULL, 'public\\img\\аватарки\\base.svg', 'клиент');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_client_cart` (`id_client_cart`),
  ADD KEY `id_product_cart` (`id_product_cart`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `Id_status_order` (`id_status_order`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_order` (`id_order`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_client_cart`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product_cart`) REFERENCES `products` (`id_product`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_status_order`) REFERENCES `status` (`id_status`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
