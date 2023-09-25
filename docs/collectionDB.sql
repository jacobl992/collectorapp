CREATE DATABASE IF NOT EXISTS collectorapp;

USE `collectorapp`;

DROP TABLE IF EXISTS `cake_data`;
DROP TABLE IF EXISTS `ratings`;
DROP TABLE IF EXISTS `types`;



CREATE TABLE `ratings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rating` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ratings` (`id`, `rating`)
VALUES
(1, 'Not the best'),
(2, 'Alright'),
(3, 'Enjoyable'),
(4, 'Great'),
(5, 'Absolute Magnificence');



CREATE TABLE `types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `types` (`id`, `type`)
VALUES
(1, 'Brownie'),
(2, 'Cake'),
(3, 'Cookie'),
(4, 'Donut'),
(5, 'Pancake'),
(6, 'Pie'),
(7, 'Rocky Road'),
(8, 'Tiffin'),
(9, 'Other');



CREATE TABLE `cake_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `type` int(11) unsigned,
  `source` VARCHAR(255),
  `date` DATE,
  `rating` int(11) unsigned,
  `comment` VARCHAR(255),
  `img_src` VARCHAR(255),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_types` FOREIGN KEY (`type`) REFERENCES `types` (`id`),
  CONSTRAINT `fk_ratings` FOREIGN KEY (`rating`) REFERENCES `ratings` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cake_data` (`id`, `name`, `type`, `source`, `date`, `rating`, `comment`, `img_src`)
VALUES
(1, 'Apple and Blackberry Pudding', 6, 'Lochinever Pies', '2023-08-07', 4, 'Served warm, lovely filling, great pastry', 'https://placedog.net/200/200'),
(2, 'Banana and Nutella Crepe', 5, 'Cafe Rouge, Guildford', '2023-09-24', 4, 'Loads of nutella, caramelised banana, crunchy but a bit unecessary', 'https://placedog.net/200/200'),
(3, 'Banana Cake', 2, 'The kitchen', '2023-10-07', 3, 'I was very proud of myself but I am biased', 'https://placedog.net/200/200'),
(4, 'Biscoff Cookie', 1, 'Pinkmans, Bristol', '2023-09-16', 2, 'Didnt set my world alight, very sugary', 'https://placedog.net/200/200'),
(5, 'Car Melted Tiffin', 8, 'Torridon Stores and Cafe, Scotland', '2023-08-08', 5, 'It was in the car for a bit in sunlight, the chocolate on top melted, it was amazing', 'https://placedog.net/200/200'),
(6, 'Chocolate Babka', 9, 'Wild oats, Bristol', '2023-09-16', 4, 'Light and tasty', 'https://placedog.net/200/200'),
(7, 'Chocolate Fondant', 2, 'Deliahs, Lochiniver', '2023-08-06', 5, 'Doesnt get better than this', 'https://placedog.net/200/200'),
(8, 'Chocolate Fondant CF', 2, 'Café Rouge, Guildford', '2023-09-24', 4, 'Very sweet, very nice', 'https://placedog.net/200/200'),
(9, 'Chocolate Hazelnut Doughnut', 4, 'Guildford Sustainable Fest', '2023-09-24', 4, 'Lovely light vegan sourdough donut', 'https://placedog.net/200/200'),
(10, 'Deluxe Hot Chocolate', 9, 'Cocoa Mountain, Dornoch', '2023-08-04', 5, 'Most incredible hot chocolate ever, (there was also a brilliant brownie)', 'https://placedog.net/200/200'),
(11, 'French Toast', 9, 'Burra, Bristol', '2023-09-02', 3, 'Pretty good, but not my favourite, no chocolate', 'https://placedog.net/200/200'),
(12, 'Fudge Brownie Sundae', 9, 'Upper Deck, Scrabster', '2023-08-04', 4, 'Just what was required', 'https://placedog.net/200/200'),
(13, 'Guinness Cake', 2, 'Crafty Beans, Bristol', '2023-09-23', 2, 'Shockingly, bit rich for me, bit much icing, but appreciate the quantity', 'https://placedog.net/200/200'),
(14, 'Homemade Brownie', 1, 'The kitchen', '2023-07-15', 5, 'Peanut butter, roasted hazelnuts, almonds, white chocolate. The best.', 'https://placedog.net/200/200'),
(15, 'Hunky Dory Brownie', 1, 'Bath Food Fest', '2023-09-22', 5, 'White chocolate and marshmallow. Hench.', 'https://placedog.net/200/200'),
(16, 'Red Fruits Brownie', 1, 'Cortado Cafe, Bath', '2023-09-09', 4, 'Very gooey and dark', 'https://placedog.net/200/200'),
(17, 'Rocky Road Widicombe', 7, 'Widicombe Deli, Bath', '2023-09-08', 3, 'Very rich, riddled with candy bars', 'https://placedog.net/200/200'),
(18, 'Tiffin Widicombe', 8, 'Widicombe Deli, Bath', '2023-09-09', 3, 'Does what it says on the tin', 'https://placedog.net/200/200')
;