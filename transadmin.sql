SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `transadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `transadmin` ;

-- -----------------------------------------------------
-- Table `transadmin`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transadmin`.`perfil` (
  `id_perfil` INT NOT NULL AUTO_INCREMENT,
  `nome_perfil` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_perfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `transadmin`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transadmin`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `login_usuario` VARCHAR(45) NOT NULL,
  `senha_usuario` VARCHAR(155) NOT NULL,
  `id_perfil` INT NOT NULL,
  `nome_usuario` VARCHAR(45) NULL,
  `email_usuario` VARCHAR(155) NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `id_perfil_idx` (`id_perfil` ASC),
  CONSTRAINT `id_perfil`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `transadmin`.`perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `transadmin`.`modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transadmin`.`modulo` (
  `id_modulo` INT NOT NULL AUTO_INCREMENT,
  `nome_modulo` VARCHAR(45) NOT NULL,
  `nome_programa_modulo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_modulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `transadmin`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transadmin`.`endereco` (
  `id_endereco` INT NOT NULL AUTO_INCREMENT,
  `logradouro_endereco` VARCHAR(155) NOT NULL,
  `cep_endereco` VARCHAR(10) NOT NULL,
  `numero_endereco` VARCHAR(10) NOT NULL,
  `complemento_endereco` VARCHAR(45) NULL,
  `bairro_endereco` VARCHAR(45) NOT NULL,
  `cidade_endereco` VARCHAR(100) NOT NULL,
  `uf_endereco` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`id_endereco`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `transadmin`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transadmin`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(45) NOT NULL,
  `email_cliente` VARCHAR(155) NULL,
  `data_nascimento_cliente` DATE NOT NULL,
  `cpf_cliente` VARCHAR(15) NOT NULL,
  `rg_cliente` INT NULL,
  `telefone_cliente` VARCHAR(45) NOT NULL,
  `celular_cliente` VARCHAR(45) NOT NULL,
  `id_endereco_cliente` INT NOT NULL,
  PRIMARY KEY (`id_cliente`),
  INDEX `id_endereco_idx` (`id_endereco_cliente` ASC),
  CONSTRAINT `id_endereco_cliente`
    FOREIGN KEY (`id_endereco_cliente`)
    REFERENCES `transadmin`.`endereco` (`id_endereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `transadmin`.`entrega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transadmin`.`entrega` (
  `id_entrega` INT NOT NULL AUTO_INCREMENT,
  `id_origem_endereco` INT NOT NULL,
  `id_destino_endereco` INT NOT NULL,
  `id_cliente` INT NOT NULL,
  `valor_entrega` FLOAT NOT NULL,
  `valor_km_entrega` FLOAT NOT NULL,
  `data_entrega` DATE NOT NULL,
  `efetuada_entrega` ENUM('S','N') NULL DEFAULT 'N',
  PRIMARY KEY (`id_entrega`),
  INDEX `id_origem_endereco_idx` (`id_origem_endereco` ASC),
  INDEX `id_destino_endereco_idx` (`id_destino_endereco` ASC),
  INDEX `id_cliente_idx` (`id_cliente` ASC),
  CONSTRAINT `id_origem_endereco`
    FOREIGN KEY (`id_origem_endereco`)
    REFERENCES `transadmin`.`endereco` (`id_endereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_destino_endereco`
    FOREIGN KEY (`id_destino_endereco`)
    REFERENCES `transadmin`.`endereco` (`id_endereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `transadmin`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `transadmin`.`modulo_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transadmin`.`modulo_perfil` (
  `id_modulo_perfil` INT NOT NULL AUTO_INCREMENT,
  `id_perfil` INT NOT NULL,
  `id_modulo` INT NOT NULL,
  PRIMARY KEY (`id_modulo_perfil`),
  INDEX `id_perfil_fk` (`id_perfil` ASC),
  INDEX `id_modulo_fk` (`id_modulo` ASC),
  CONSTRAINT `id_perfil`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `transadmin`.`perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_modulo`
    FOREIGN KEY (`id_modulo`)
    REFERENCES `transadmin`.`modulo` (`id_modulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
