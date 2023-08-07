select * from bd_sistema.comunidade;
SELECT * FROM bd_sistema.comunidade ORDER BY padroeiro;
SELECT * FROM bd_sistema.comunidade WHERE id_comunidade=10;

select * from bd_sistema.familia;
select * from bd_sistema.membro_familia order by id_familia;

-- Exclusão família
DELETE FROM bd_sistema.familia WHERE id_familia = 66;
DELETE from bd_sistema.membro_familia WHERE id_familia = 66;

delete from bd_sistema.membro_familia where id_familia > 36;
delete from bd_sistema.familia where id_comunidade < 30;

select count(*) as 'qtd' from bd_sistema.membro_familia where cpf = '15770484071';
SELECT COUNT(*)  AS 'qtd' FROM bd_sistema.comunidade WHERE padroeiro = 'matriz';

select * from bd_sistema.membro_conselho;

-- Por motivos de segurança, os códigos abaixo não funcionam (tem que especificar os atributos)
delete from bd_sistema.membro_conselho;
delete from bd_sistema.comunidade;

delete from bd_sistema;

delete from bd_sistema.membro_conselho where idcomunidade=7;
delete from bd_sistema.comunidade where id_comunidade='6';

SET foreign_key_checks = 0;

-- Cadastro dos avisos
INSERT INTO bd_sistema.avisos (status, titulo, descricao, id_comunidade) values (0, 'titulo', 'descricao', 10);
select * from bd_sistema.avisos  order by id_avisos desc; 
delete from bd_sistema.avisos where id_avisos = 9;
UPDATE bd_sistema.avisos SET titulo='$titulo', descricao='$descricao', status=1 WHERE id_avisos=24;

-- Cadastro dos eventos
select * from bd_sistema.eventos  order by id_eventos desc; 
delete from bd_sistema.eventos where id_eventos > 5;
UPDATE bd_sistema.eventos SET status='$status', titulo='$titulo', descricao='$descricao', data='$data',
horario='$horario', local='$local', presidente='$presidente' WHERE id_eventos=10;


-- -----------------------------------------------------
-- Table `bd_sistema`.`Avisos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_sistema`.`Avisos` ;

CREATE TABLE IF NOT EXISTS `bd_sistema`.`Avisos` (
  `id_avisos` INT NOT NULL AUTO_INCREMENT,
  `status` INT NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(300) NULL,
  `id_comunidade` INT NOT NULL,
  PRIMARY KEY (`id_avisos`),
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
  `status` INT NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(200) NULL,
  `data` DATE NULL,
  `horario` VARCHAR(45) NULL,
  `local` VARCHAR(15) NULL,
  `presidente` VARCHAR(45) NULL,
  PRIMARY KEY (`id_eventos`))
ENGINE = InnoDB;
