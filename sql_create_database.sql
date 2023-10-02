-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema progwebveiculos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema progwebveiculos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `progwebveiculos` DEFAULT CHARACTER SET utf8 ;
USE `progwebveiculos` ;

-- -----------------------------------------------------
-- Table `progwebveiculos`.`veiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `progwebveiculos`.`veiculo` ;

CREATE TABLE IF NOT EXISTS `progwebveiculos`.`veiculo` (
  `codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(255) NOT NULL,
  `modelo` VARCHAR(255) NOT NULL,
  `cor` VARCHAR(255) NOT NULL,
  `ano_fabricacao` YEAR(4) NOT NULL,
  `ano_modelo` YEAR(4) NOT NULL,
  `combustivel` VARCHAR(255) NOT NULL,
  `preco` FLOAT NOT NULL,
  `detalhes` VARCHAR(255) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  `tipo` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `progwebveiculos`.`vendedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `progwebveiculos`.`vendedor` ;

CREATE TABLE IF NOT EXISTS `progwebveiculos`.`vendedor` (
  `codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `telefone` INT(11) NOT NULL,
  `celular` VARCHAR(12) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Data for table `progwebveiculos`.`veiculo`
-- -----------------------------------------------------
START TRANSACTION;
USE `progwebveiculos`;
INSERT INTO `progwebveiculos`.`veiculo` (`codigo`, `marca`, `modelo`, `cor`, `ano_fabricacao`, `ano_modelo`, `combustivel`, `preco`, `detalhes`, `foto`, `tipo`) VALUES (1, 'Ford', 'Fiesta', 'Prata', 2013, 2014, 'Flex', 35900, 'Ar condicionado, som com blooetuf', 'foto_fiesta.jpg', 'Seminovo');
INSERT INTO `progwebveiculos`.`veiculo` (`codigo`, `marca`, `modelo`, `cor`, `ano_fabricacao`, `ano_modelo`, `combustivel`, `preco`, `detalhes`, `foto`, `tipo`) VALUES (2, 'Volkswagem', 'T-Cross', 'Branca', 2021, 2022, 'Flex', 109000, 'Travas elétricas, Vidros elétricos, Alarme, Freio ABS, Air bag do motorista, Rodas de liga leve, Desembaçador traseiro, Air bag duplo, Ar quente, Limpador traseiro, Retrovisores elétricos, Encosto de cabeça traseiro, Volante com Regulagem de Altura, Compu', 't-cross.jpg', 'Seminovo');
INSERT INTO `progwebveiculos`.`veiculo` (`codigo`, `marca`, `modelo`, `cor`, `ano_fabricacao`, `ano_modelo`, `combustivel`, `preco`, `detalhes`, `foto`, `tipo`) VALUES (3, 'Honda', 'HR-V', 'Branca Pérola', 2024, 2024, 'Flex', 164990, 'Ar condicionado, Travas elétricas, Vidros elétricos, Alarme, Freio ABS, Air bag do motorista, Rodas de liga leve, Desembaçador traseiro, Air bag duplo, Limpador traseiro, Retrovisores elétricos, Encosto de cabeça traseiro, Volante com Regulagem de Altura', 'hrv.jpg', 'Novo');
INSERT INTO `progwebveiculos`.`veiculo` (`codigo`, `marca`, `modelo`, `cor`, `ano_fabricacao`, `ano_modelo`, `combustivel`, `preco`, `detalhes`, `foto`, `tipo`) VALUES (4, 'HYUNDAI', 'CRETA', 'Preta', 2024, 2024, 'Flex', 138900, 'Ar condicionado, Travas elétricas, Vidros elétricos, Alarme, Freio ABS, Air bag do motorista, Rodas de liga leve', 'creta.jpg', 'Novo');

COMMIT;


-- -----------------------------------------------------
-- Data for table `progwebveiculos`.`vendedor`
-- -----------------------------------------------------
START TRANSACTION;
USE `progwebveiculos`;
INSERT INTO `progwebveiculos`.`vendedor` (`codigo`, `nome`, `email`, `telefone`, `celular`, `foto`) VALUES (1, 'Alex ', 'ale.marley@yahoo.com.br', 1832734332, '18987646431', 'images/alex.jpeg');
INSERT INTO `progwebveiculos`.`vendedor` (`codigo`, `nome`, `email`, `telefone`, `celular`, `foto`) VALUES (2, 'Alexandre', 'mottachemin@uol.com.br', 1832734332, '18987646421', 'images/alexandre.jpeg');
INSERT INTO `progwebveiculos`.`vendedor` (`codigo`, `nome`, `email`, `telefone`, `celular`, `foto`) VALUES (3, 'Emerson', 'ea.catussi@bol.com.br', 1839026000, '18997702807', 'images/emerson.jpeg');

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
