CREATE TABLE `users` (
  `id` int AUTO_INCREMENT NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');

CREATE TABLE `announces` (
  `id` int AUTO_INCREMENT NOT NULL,
  `nameannounce` varchar(255) NOT NULL,
  `car` varchar(255) NOT NULL,
  `dateannounce` datetime NOT NULL,
  `citystart` varchar(255) NOT NULL,
  `cityend` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `announces` (`id`, `nameannounce`, `car`, `dateannounce`, `citystart`, `cityend`) VALUES
(1, 'Robert', 'Ford', '2022-01-01', 'Paris', 'Lyon'),
(2, 'Francis', 'Mercedes', '2022-02-02', 'Limoges', 'Vichy');