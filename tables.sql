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

CREATE TABLE `cars` (
  `id` int AUTO_INCREMENT NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `nbrSlots` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `brand`, `model`, `color`, `nbrSlots`) VALUES
(1, 'Skoda', 'Fabia', 'Noire', 5),
(2, 'Huandai', 'Getz', 'Rouge', 5),
(3, 'Mercedes', 'Classe C', 'Noire', 4),
(4, 'Renaut', 'Zoé', 'Bleu', 2);

CREATE TABLE users_cars (
	user_id INT NOT NULL, 
	car_id INT NOT NULL, 
	PRIMARY KEY(user_id, car_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_cars` (`user_id`, `car_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4);

CREATE TABLE `announces` (
  `id` int AUTO_INCREMENT NOT NULL,
  `dateannounce` datetime NOT NULL,
  `citystart` varchar(255) NOT NULL,
  `cityend` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `announces` (`id`, `dateannounce`, `citystart`, `cityend`) VALUES
(1, '2018-01-01', 'Vichy', 'Paris'),
(2, '2018-01-01', 'Vichy', 'Paris');

CREATE TABLE announces_users (
	announce_id INT NOT NULL, 
	user_id INT NOT NULL, 
	PRIMARY KEY(announce_id, user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `announces_users` (`announce_id`, `user_id`) VALUES
(1, 2),
(2, 3);

CREATE TABLE announces_cars (
	announce_id INT NOT NULL, 
	car_id INT NOT NULL, 
	PRIMARY KEY(announce_id, car_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `announces_cars` (`announce_id`, `car_id`) VALUES
(1, 1),
(2, 2);

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `author` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `rescitystart` varchar(255) NOT NULL,
  `rescityend` varchar(255) NOT NULL,
  `dateres` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `reservations` (`id`, `author`, `client`, `rescitystart`, `rescityend`, `dateres`) VALUES
(1, 'Emilien', 'Martin', 'Mormaison', 'Montluçon', '2022-11-27 15:13:11'),
(2, 'Clement', 'Theo', 'Nantes', 'Paris', '2020-10-12 00:00:00');

CREATE TABLE `users_reservations` (
  `user_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `users_reservations` (`user_id`, `reservation_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

CREATE TABLE `announces_reservations` (
  `announce_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `announces_reservations` (`announce_id`, `reservation_id`) VALUES
(1, 1),
(2, 2),