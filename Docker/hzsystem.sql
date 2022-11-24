--------------------------------------------------------
-- Security configuration
--------------------------------------------------------
DROP USER root@localhost;
CREATE USER root@localhost IDENTIFIED BY 'miotuo';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost';
FLUSH PRIVILEGES;


CREATE DATABASE `hzsystem`;
USE `hzsystem`;

-- -----------------------------------------------------
-- Table `hzsystem`.`hz_guestbook_post`
-- -----------------------------------------------------
CREATE TABLE `hz_guestbook_post` (
  `idh_post` INT NOT NULL AUTO_INCREMENT,
  `nick` VARCHAR(45) NOT NULL,
  `mail` VARCHAR(100) NULL,
  `nazione` VARCHAR(45) NULL,
  `messaggio` TEXT NOT NULL,
  `data` VARCHAR(45) NULL,
  PRIMARY KEY (`idh_post`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hzsystem`.`hz_nazioni`
-- -----------------------------------------------------
CREATE TABLE `hz_nazioni` (
  `suffisso` VARCHAR(2) NOT NULL,
  `stato` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`suffisso`))
ENGINE = InnoDB;