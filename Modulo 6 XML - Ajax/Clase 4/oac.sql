SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `oac` DEFAULT CHARACTER SET latin1 ;
USE `oac` ;

-- -----------------------------------------------------
-- Table `oac`.`ocupaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oac`.`ocupaciones` (
  `idocupacion` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreocu` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `activo` INT(11) NOT NULL,
  PRIMARY KEY (`idocupacion`))
ENGINE = MyISAM
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `oac`.`parroquias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oac`.`parroquias` (
  `idparroquia` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreparroquia` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `activo` INT(11) NOT NULL,
  PRIMARY KEY (`idparroquia`))
ENGINE = MyISAM
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `oac`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oac`.`usuarios` (
  `iduser` INT(11) NOT NULL AUTO_INCREMENT,
  `cedula` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `username` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `email` VARCHAR(45) CHARACTER SET 'utf8mb4' NOT NULL,
  `direccion` VARCHAR(250) NOT NULL,
  `telefono` VARCHAR(11) NOT NULL,
  `password` VARCHAR(40) CHARACTER SET 'utf16' NOT NULL,
  `activo` INT(11) NOT NULL,
  `permiso` INT(11) NOT NULL,
  `parroquia` INT(11) NOT NULL,
  `ocupacion` INT(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `cedula` (`cedula` ASC),
  INDEX `fk_usuarios_parroquias_idx` (`parroquia` ASC),
  INDEX `fk_usuarios_ocupaciones1_idx` (`ocupacion` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 25;


-- -----------------------------------------------------
-- Table `oac`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oac`.`tipos` (
  `idtipo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `activo` INT(11) NOT NULL,
  PRIMARY KEY (`idtipo`))
ENGINE = MyISAM
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `oac`.`solicitudes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oac`.`solicitudes` (
  `idsolicitud` INT(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL,
  `requerimiento` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `justificacion` VARCHAR(600) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `asunto` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `estado` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `codigo` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `validado` INT(11) NOT NULL,
  `cedula` INT(11) NOT NULL,
  `tipo` INT(11) NOT NULL,
  PRIMARY KEY (`idsolicitud`),
  INDEX `requerimiento` (`requerimiento` ASC),
  INDEX `fk_solicitudes_usuarios1_idx` (`cedula` ASC),
  INDEX `fk_solicitudes_tipos1_idx` (`tipo` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 87;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
