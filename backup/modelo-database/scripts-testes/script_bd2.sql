-- MySQL Script generated by MySQL Workbench
-- Mon Oct 23 10:44:30 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_sistema
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bd_sistema` ;

-- -----------------------------------------------------
-- Schema bd_sistema
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_sistema` DEFAULT CHARACTER SET utf8 ;
USE `bd_sistema` ;

-- -----------------------------------------------------
-- Table `bd_sistema`.`comunidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`comunidade` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`comunidade` (
  `id_comunidade` INT NOT NULL AUTO_INCREMENT,
  `ativo` INT NOT NULL,
  `padroeiro` VARCHAR(45) NOT NULL,
  `localizacao` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `foto` LONGBLOB NULL,
  PRIMARY KEY (`id_comunidade`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_sistema`.`familia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`familia` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`familia` (
  `id_familia` INT NOT NULL AUTO_INCREMENT,
  `ativo` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `foto` LONGBLOB NULL,
  `id_comunidade` INT NOT NULL,
  PRIMARY KEY (`id_familia`),
  INDEX `fk_familia_comunidade1_idx` (`id_comunidade` ASC) VISIBLE,
  CONSTRAINT `fk_familia_comunidade1`
    FOREIGN KEY (`id_comunidade`)
    REFERENCES `bd_sistema`.`comunidade` (`id_comunidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_sistema`.`membro_familia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`membro_familia` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`membro_familia` (
  `cpf` BIGINT(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `celular` VARCHAR(45) NULL,
  `id_familia` INT NOT NULL,
  PRIMARY KEY (`cpf`),
  INDEX `fk_membro_familia_familia1_idx` (`id_familia` ASC) VISIBLE,
  CONSTRAINT `fk_membro_familia_familia1`
    FOREIGN KEY (`id_familia`)
    REFERENCES `bd_sistema`.`familia` (`id_familia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_sistema`.`Login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`Login` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`Login` (
  `membro_familia_cpf` BIGINT(11) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `perfil` INT NOT NULL,
  INDEX `fk_Login_membro_familia1_idx` (`membro_familia_cpf` ASC) VISIBLE,
  PRIMARY KEY (`membro_familia_cpf`),
  CONSTRAINT `fk_Login_membro_familia1`
    FOREIGN KEY (`membro_familia_cpf`)
    REFERENCES `bd_sistema`.`membro_familia` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_sistema`.`Avisos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`Avisos` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`Avisos` (
  `id_avisos` INT NOT NULL AUTO_INCREMENT,
  `ativo` INT NOT NULL,
  `abrangencia` INT NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(300) NULL,
  `id_comunidade` INT NOT NULL,
  PRIMARY KEY (`id_avisos`),
  INDEX `fk_Avisos_comunidade1_idx` (`id_comunidade` ASC) VISIBLE,
  CONSTRAINT `fk_Avisos_comunidade1`
    FOREIGN KEY (`id_comunidade`)
    REFERENCES `bd_sistema`.`comunidade` (`id_comunidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_sistema`.`Eventos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`Eventos` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`Eventos` (
  `id_eventos` INT NOT NULL AUTO_INCREMENT,
  `ativo` INT NOT NULL,
  `abrangencia` INT NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(200) NULL,
  `data` DATE NULL,
  `horario` VARCHAR(45) NULL,
  `local` VARCHAR(45) NULL,
  `presidente` VARCHAR(45) NULL,
  PRIMARY KEY (`id_eventos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_sistema`.`membro_conselho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`membro_conselho` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`membro_conselho` (
  `membro_familia_cpf` BIGINT(11) NOT NULL,
  `cargo` VARCHAR(45) NULL,
  INDEX `fk_membro_conselho_membro_familia1_idx` (`membro_familia_cpf` ASC) VISIBLE,
  CONSTRAINT `fk_membro_conselho_membro_familia1`
    FOREIGN KEY (`membro_familia_cpf`)
    REFERENCES `bd_sistema`.`membro_familia` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_sistema`.`Dizimo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`Dizimo` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`Dizimo` (
  `id_pagamento` INT NOT NULL,
  `mes` INT NOT NULL,
  `status` INT NOT NULL,
  `id_familia` INT NOT NULL,
  PRIMARY KEY (`id_pagamento`),
  INDEX `fk_Dizimo_familia1_idx` (`id_familia` ASC) VISIBLE,
  CONSTRAINT `fk_Dizimo_familia1`
    FOREIGN KEY (`id_familia`)
    REFERENCES `bd_sistema`.`familia` (`id_familia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
