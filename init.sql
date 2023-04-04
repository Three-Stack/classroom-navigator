use `db`;

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
    `id` INT(255) NOT NULL AUTO_INCREMENT,
    `class_id` VARCHAR(10) DEFAULT NULL,
    `section` VARCHAR(10) DEFAULT NULL,
    `class_nbr` VARCHAR(10) DEFAULT NULL,
    `capacity` INT(11) DEFAULT NULL,
    `class_name` VARCHAR(255) DEFAULT NULL,
    `units` VARCHAR(5) DEFAULT NULL,
    `start_time` VARCHAR(50) DEFAULT NULL,
    `end_time` VARCHAR(50) DEFAULT NULL,
    `days` VARCHAR(10) DEFAULT NULL,
    `location` VARCHAR(255) DEFAULT NULL,
    `start_date` DATE DEFAULT NULL,
    `end_date` DATE DEFAULT NULL,
    `session` VARCHAR(255) DEFAULT NULL,
    `instructor` VARCHAR(255) DEFAULT NULL,
    `mode` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
);