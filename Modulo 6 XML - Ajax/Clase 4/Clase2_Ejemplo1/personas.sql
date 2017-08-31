SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `Personas` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `Personas` ;

-- -----------------------------------------------------
-- Table `Personas`.`Personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Personas`.`Personas` (
  `cedula` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `profesion` VARCHAR(45) NULL,
  `fecha_nac` VARCHAR(45) NULL,
  PRIMARY KEY (`cedula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Personas`.`Telefonos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Personas`.`Telefonos` (
  `idTe` INT NOT NULL,
  `cod_area` VARCHAR(45) NULL,
  `numero` VARCHAR(45) NULL,
  `Personas_cedula` INT NOT NULL,
  PRIMARY KEY (`idTe`),
  INDEX `fk_Telefonos_Personas_idx` (`Personas_cedula` ASC),
  CONSTRAINT `fk_Telefonos_Personas`
    FOREIGN KEY (`Personas_cedula`)
    REFERENCES `Personas`.`Personas` (`cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Personas`.`Correos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Personas`.`Correos` (
  `idCorreo` INT NOT NULL,
  `direccion` VARCHAR(45) NULL,
  `Personas_cedula` INT NOT NULL,
  PRIMARY KEY (`idCorreo`),
  INDEX `fk_Correos_Personas1_idx` (`Personas_cedula` ASC),
  CONSTRAINT `fk_Correos_Personas1`
    FOREIGN KEY (`Personas_cedula`)
    REFERENCES `Personas`.`Personas` (`cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
