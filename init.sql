use `db`;

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
    `id` int(255) NOT NULL AUTO_INCREMENT,
    `class_id` varchar(10) DEFAULT NULL,
    `name` varchar(255) DEFAULT NULL,
    `time` time DEFAULT NULL,
    PRIMARY KEY (`id`)
);
INSERT INTO `classes` (`class_id`, `name`, `time`) VALUES ('CS4650', 'Databases', '2:30');