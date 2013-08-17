CREATE TABLE `blog` (
  `postnumber` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `posttext` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`postnumber`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(64) NOT NULL,
  `session` int(64),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `name`, `password`, `session`) VALUES (NULL, 'admin', 'Admin', PASSWORD('admin'), NULL);
