START TRANSACTION;

DROP DATABASE IF EXISTS stockapp_database;
CREATE DATABASE stockapp_database;
USE stockapp_database;


DROP TABLE IF EXISTS `employes`;
CREATE TABLE `employes` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `phone` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `statut` VARCHAR(255) NOT NULL,
    `isActive` BOOLEAN,
    `created_at` DATETIME DEFAULT CURRENT_DATE,
    `updated_at` DATETIME DEFAULT CURRENT_DATE,
    PRIMARY KEY (`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pieces`;
CREATE TABLE `pieces` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `reference` VARCHAR(255) NOT NULL,
    `fabriquant` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL UNIQUE,
    `allee` VARCHAR(255) NOT NULL,
    `etage` VARCHAR(500) NOT NULL,
    `prix` VARCHAR(255) NOT NULL,
    `isActive` BOOLEAN,
    `created_at` DATETIME DEFAULT CURRENT_DATE,
    `updated_at` DATETIME DEFAULT CURRENT_DATE,
    `id_motos` INT(10),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_motos`) REFERENCES motos(`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `motos`;
CREATE TABLE `motos` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `fabriquant` VARCHAR(255) NOT NULL,
    `isActive` BOOLEAN,
    `created_at` DATETIME DEFAULT CURRENT_DATE,
    `updated_at` DATETIME DEFAULT CURRENT_DATE,
    PRIMARY KEY (`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `isActive` BOOLEAN,
    `created_at` DATETIME DEFAULT CURRENT_DATE,
    `updated_at` DATETIME DEFAULT CURRENT_DATE,
    `id_pieces` INT(10),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_pieces`) REFERENCES pieces(`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `quantite` VARCHAR(255) NOT NULL,
    `isActive` BOOLEAN,
    `created_at` DATETIME DEFAULT CURRENT_DATE,
    `updated_at` DATETIME DEFAULT CURRENT_DATE,
    `id_pieces` INT(10),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_pieces`) REFERENCES pieces(`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


COMMIT;