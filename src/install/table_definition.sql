-- -----------------------------------------------------
-- Table `hzsystem`.`hz_guestbook_post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `$_guestbook_post` (
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
CREATE TABLE IF NOT EXISTS `$_nazioni` (
  `suffisso` VARCHAR(2) NOT NULL,
  `stato` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`suffisso`))
ENGINE = InnoDB;