-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.27 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              7.0.0.4390
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица test2.books
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_category_id` int(10) unsigned NOT NULL,
  `name` varchar(120) NOT NULL,
  `annotation` varchar(120) DEFAULT NULL,
  `views` int(10) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL,
  `authors` varchar(350) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`book_category_id`),
  KEY `name` (`name`),
  KEY `year` (`year`),
  CONSTRAINT `FK_books_book_category` FOREIGN KEY (`book_category_id`) REFERENCES `book_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test2.books: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `book_category_id`, `name`, `annotation`, `views`, `year`, `authors`, `created_at`) VALUES
	(3, 2, 'Гари потный', '<p><em>Фуфло</em></p>', 5, '2001', '3', '2016-01-12 00:58:15'),
	(4, 3, 'Белет парус', '', 1, '2001', '3', '2016-01-12 02:42:15');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


-- Дамп структуры для таблица test2.books_authors
DROP TABLE IF EXISTS `books_authors`;
CREATE TABLE IF NOT EXISTS `books_authors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fio` varchar(350) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test2.books_authors: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `books_authors` DISABLE KEYS */;
INSERT INTO `books_authors` (`id`, `fio`, `created_at`) VALUES
	(1, 'Иванов Иван Иванович', '2016-01-11 23:40:24'),
	(2, 'Степанов Сергей Николаевич', '2016-01-11 23:40:35'),
	(3, 'Дмитров Алексей Анатольевич', '2016-01-11 23:40:55'),
	(4, 'Суслов Сергей Дмитриевич', '2016-01-11 23:41:08'),
	(5, 'Данцова Анна Сергеевна', '2016-01-11 23:41:27');
/*!40000 ALTER TABLE `books_authors` ENABLE KEYS */;


-- Дамп структуры для таблица test2.book_category
DROP TABLE IF EXISTS `book_category`;
CREATE TABLE IF NOT EXISTS `book_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test2.book_category: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `book_category` DISABLE KEYS */;
INSERT INTO `book_category` (`id`, `name`, `created_at`) VALUES
	(1, 'техническая литература', '2016-01-11 23:07:21'),
	(2, 'проза', '2016-01-11 23:07:33'),
	(3, 'поэзия', '2016-01-11 23:07:37');
/*!40000 ALTER TABLE `book_category` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
