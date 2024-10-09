-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bdClinica
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bdClinica
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdClinica` DEFAULT CHARACTER SET utf8 ;
USE `bdClinica` ;

-- -----------------------------------------------------
-- Table `bdClinica`.`especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdClinica`.`especialidad` (
  `idEspecialidad` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `especialidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEspecialidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdClinica`.`medico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdClinica`.`medico` (
  `idMedico` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(8) NOT NULL,
  `colegiado` VARCHAR(14) NOT NULL,
  `_idEspecialidad` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idMedico`),
  INDEX `fk_medico_especialidad1_idx` (`_idEspecialidad` ASC),
  CONSTRAINT `fk_medico_especialidad1`
    FOREIGN KEY (`_idEspecialidad`)
    REFERENCES `bdClinica`.`especialidad` (`idEspecialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdClinica`.`paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdClinica`.`paciente` (
  `idPaciente` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `dpi` VARCHAR(13) NOT NULL,
  `nacimiento` DATE NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`idPaciente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdClinica`.`cita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdClinica`.`cita` (
  `idCita` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(250) NOT NULL,
  `hora` DATETIME NOT NULL,
  `_idPaciente` INT UNSIGNED NOT NULL,
  `_idmedico` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idCita`),
  INDEX `fk_cita_paciente_idx` (`_idPaciente` ASC),
  INDEX `fk_cita_medico1_idx` (`_idmedico` ASC),
  CONSTRAINT `fk_cita_paciente`
    FOREIGN KEY (`_idPaciente`)
    REFERENCES `bdClinica`.`paciente` (`idPaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_medico1`
    FOREIGN KEY (`_idmedico`)
    REFERENCES `bdClinica`.`medico` (`idMedico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
