-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 08 2018 г., 08:59
-- Версия сервера: 10.1.25-MariaDB
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `solve`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `granted` char(1) NOT NULL DEFAULT '0',
  `oid_pages` int(11) NOT NULL,
  `oid_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(200) NOT NULL,
  `sity` varchar(100) NOT NULL,
  `strit` varchar(100) NOT NULL,
  `house` varchar(10) NOT NULL,
  `flat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `feadback`
--

CREATE TABLE `feadback` (
  `id` int(11) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `bals` decimal(1,0) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `oid_work_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `cteated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `oid_type_offer` int(11) NOT NULL,
  `oid_problem` int(11) NOT NULL,
  `oid_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(4, 'Администратор'),
(5, 'Гость'),
(1, 'Заказчик'),
(3, 'Исполнитель');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'В процессе'),
(2, 'Выполнено');

-- --------------------------------------------------------

--
-- Структура таблицы `type_offer`
--

CREATE TABLE `type_offer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_offer`
--

INSERT INTO `type_offer` (`id`, `name`) VALUES
(1, 'Предложить'),
(2, 'Отклонить'),
(3, 'Согласованно');

-- --------------------------------------------------------

--
-- Структура таблицы `type_work`
--

CREATE TABLE `type_work` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_work`
--

INSERT INTO `type_work` (`id`, `name`) VALUES
(5, 'Проблема'),
(4, 'Услуга');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) NOT NULL,
  `about_me` varchar(2000) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `oid_raiting` int(11) NOT NULL,
  `oid_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_avatar`
--

CREATE TABLE `user_avatar` (
  `id` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `oid_users` int(11) NOT NULL,
  `oid_gallery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `oid_role` int(11) NOT NULL,
  `oid_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ammount_order` decimal(13,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `oid_type_work` int(11) NOT NULL,
  `oid_users` int(11) NOT NULL,
  `oid_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `work_order`
--

CREATE TABLE `work_order` (
  `id` int(11) NOT NULL,
  `total_amount` decimal(13,2) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `oid_status` int(11) NOT NULL,
  `oid_address` int(11) NOT NULL,
  `oid_offer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `work_raiting`
--

CREATE TABLE `work_raiting` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `balls` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asses_pages1_idx` (`oid_pages`),
  ADD KEY `fk_asses_role1_idx` (`oid_role`);

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk_category_category1_idx` (`parent_id`);

--
-- Индексы таблицы `feadback`
--
ALTER TABLE `feadback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_feadback_work_order1_idx` (`oid_work_order`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_offer_type_offer1_idx` (`oid_type_offer`),
  ADD KEY `fk_offer_work1_idx` (`oid_problem`),
  ADD KEY `fk_offer_work2_idx` (`oid_service`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `type_offer`
--
ALTER TABLE `type_offer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_work`
--
ALTER TABLE `type_work`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_login` (`email_login`),
  ADD KEY `fk_users_address1_idx` (`oid_address`);

--
-- Индексы таблицы `user_avatar`
--
ALTER TABLE `user_avatar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_User_avatar_users1_idx` (`oid_users`),
  ADD KEY `fk_User_avatar_gallery1_idx` (`oid_gallery`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ROLE` (`oid_role`),
  ADD KEY `fk_user_role_users1_idx` (`oid_users`);

--
-- Индексы таблицы `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_work_users_idx` (`oid_users`),
  ADD KEY `fk_work_category_idx` (`oid_category`),
  ADD KEY `fk_type_work` (`oid_type_work`);

--
-- Индексы таблицы `work_order`
--
ALTER TABLE `work_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_work_order_status1_idx` (`oid_status`),
  ADD KEY `fk_work_order_address1_idx` (`oid_address`),
  ADD KEY `fk_work_order_offer1_idx` (`oid_offer`);

--
-- Индексы таблицы `work_raiting`
--
ALTER TABLE `work_raiting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `feadback`
--
ALTER TABLE `feadback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `type_offer`
--
ALTER TABLE `type_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `type_work`
--
ALTER TABLE `type_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user_avatar`
--
ALTER TABLE `user_avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `work_order`
--
ALTER TABLE `work_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `work_raiting`
--
ALTER TABLE `work_raiting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `fk_asses_pages1` FOREIGN KEY (`oid_pages`) REFERENCES `pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asses_role1` FOREIGN KEY (`oid_role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_category_category1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `feadback`
--
ALTER TABLE `feadback`
  ADD CONSTRAINT `fk_feadback_work_order1` FOREIGN KEY (`oid_work_order`) REFERENCES `work_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `fk_offer_type_offer1` FOREIGN KEY (`oid_type_offer`) REFERENCES `type_offer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_offer_work1` FOREIGN KEY (`oid_problem`) REFERENCES `work` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_offer_work2` FOREIGN KEY (`oid_service`) REFERENCES `work` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_address1` FOREIGN KEY (`oid_address`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_avatar`
--
ALTER TABLE `user_avatar`
  ADD CONSTRAINT `fk_User_avatar_gallery1` FOREIGN KEY (`oid_gallery`) REFERENCES `gallery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_avatar_users1` FOREIGN KEY (`oid_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_ROLE` FOREIGN KEY (`oid_role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_role_users1` FOREIGN KEY (`oid_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `fk_type_work` FOREIGN KEY (`oid_type_work`) REFERENCES `type_work` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_work_category` FOREIGN KEY (`oid_category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_work_users` FOREIGN KEY (`oid_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `work_order`
--
ALTER TABLE `work_order`
  ADD CONSTRAINT `fk_work_order_address1` FOREIGN KEY (`oid_address`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_work_order_offer1` FOREIGN KEY (`oid_offer`) REFERENCES `offer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_work_order_status1` FOREIGN KEY (`oid_status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
