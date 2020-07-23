-- MySQL Workbench Synchronization
-- Generated: 2020-07-22 09:33
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: ivan

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `organize` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;

CREATE TABLE IF NOT EXISTS `organize`.`sistema` (
  `id` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) VISIBLE))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `organize`.`entidad` (
  `id` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `alias` VARCHAR(45) NOT NULL,
  `sistema` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_entidad_sistema_idx` (`sistema` ASC) VISIBLE,
  CONSTRAINT `fk_entidad_sistema`
    FOREIGN KEY (`sistema`)
    REFERENCES `organize`.`sistema` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `organize`.`campo` (
  `id` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `alias` VARCHAR(45) NOT NULL,
  `valor_defecto` VARCHAR(45) NULL DEFAULT NULL,
  `longitud` INT(11) NULL DEFAULT NULL,
  `longitud_minima` INT(11) NULL DEFAULT NULL,
  `no_nulo` TINYINT(4) NOT NULL DEFAULT 0,
  `unico` TINYINT(4) NOT NULL DEFAULT 0,
  `principal` TINYINT(4) NULL DEFAULT 0,
  `tipo_dato` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_campo` VARCHAR(45) NULL DEFAULT NULL,
  `subtipo` VARCHAR(45) NULL DEFAULT NULL,
  `creado` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `entidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_campo_entidad_idx` (`entidad` ASC) VISIBLE,
  CONSTRAINT `fk_campo_entidad`
    FOREIGN KEY (`entidad`)
    REFERENCES `organize`.`entidad` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `organize`.`clave_foranea` (
  `id` VARCHAR(45) NOT NULL,
  `campo` VARCHAR(45) NOT NULL,
  `entidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_clave_foranea_campo_idx` (`campo` ASC) VISIBLE,
  INDEX `fk_clave_foranea_entidad_idx` (`entidad` ASC) VISIBLE,
  UNIQUE INDEX `campo_UNIQUE` (`campo` ASC) VISIBLE,
  CONSTRAINT `fk_clave_foranea_campo`
    FOREIGN KEY (`campo`)
    REFERENCES `organize`.`campo` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_clave_foranea_entidad`
    FOREIGN KEY (`entidad`)
    REFERENCES `organize`.`entidad` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
