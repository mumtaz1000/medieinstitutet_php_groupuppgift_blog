CREATE DATABASE IF NOT EXISTS `blogdb`;
USE `blogdb`;
SET NAMES utf8;
DROP TABLE IF EXISTS `Comments`;
DROP TABLE IF EXISTS `Posts`;
DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users`(
    `User_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `User_name` VARCHAR(30) NOT NULL,
    `User_password` VARCHAR(50) NOT NULL,
    `User_role` ENUM('Admin','Customer') NOT NULL
)
ENGINE = InnoDB;

INSERT INTO `users` (`User_id`, `User_name`, `User_password`, `User_role`)
 VALUES
        (1, 'Admin123', 'password123', 'Admin');

CREATE TABLE `Posts`(
    `Post_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `Post_title` TEXT(20) NOT NULL,
    `Post_description` VARCHAR(50),
    `Post_image` VARCHAR(255),
    `Post_category` TEXT(10),
    `Post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `Post_User_id` INT NOT NULL,
    FOREIGN KEY(`Post_User_id`) REFERENCES `Users`(`User_id`)
)
ENGINE = InnoDB;

CREATE TABLE `Comments`(
    `Comment_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `Comment_content` VARCHAR(50),
    `Comment_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `Comment_Post_id` INT NOT NULL,
    `Comment_User_id` INT NOT NULL,
    FOREIGN KEY(`Comment_Post_id`) REFERENCES `Posts`(`Post_id`),
    FOREIGN KEY(`Comment_User_id`) REFERENCES `Users`(`User_id`)
)
ENGINE = InnoDB;











