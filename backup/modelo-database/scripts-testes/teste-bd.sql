select * from bd_sistema.membro_conselho;
insert into bd_sistema.membro_conselho (membro_familia_cpf, cargo) values ();
SELECT nome FROM bd_sistema.membro_familia WHERE cpf = 14734570760;
DELETE FROM bd_sistema.membro_conselho WHERE cpf = 14734570760;

SELECT mf.nome AS nome_membro_conselho
FROM membro_conselho mc
INNER JOIN membro_familia mf ON mc.membro_familia_cpf = mf.cpf
INNER JOIN familia f ON mf.id_familia = f.id_familia
WHERE f.id_comunidade = 111;

SELECT mf.nome AS nome FROM bd_sistema.membro_conselho mc 
INNER JOIN bd_sistema.membro_familia mf ON mc.membro_familia_cpf = mf.cpf 
INNER JOIN bd_sistema.familia f ON mf.id_familia = f.id_familia WHERE f.id_comunidade = 111;

SELECT mf.nome AS nome_membro_conselho
FROM membro_conselho mc
INNER JOIN membro_familia mf ON mc.membro_familia_cpf = mf.cpf
INNER JOIN familia f ON mf.id_familia = f.id_familia
WHERE mc.membro_familia_cpf = 14734570760
AND f.id_comunidade = 10;


-- LOGIN
-- Perfil: 0 - membro da família; 1 - membro do conselho, 2 - líder paroquiano (administrador)
select * from bd_sistema.login;	
update bd_sistema.login set perfil = 1 where membro_familia_cpf = 49762728009; -- usar no botão 'Editar Conselho'
delete from bd_sistema.login where membro_familia_cpf = 93130693009;
SELECT * FROM bd_sistema.login WHERE membro_familia_cpf = 14734570760;
INSERT INTO bd_sistema.login (membro_familia_cpf, senha, perfil) VALUES ('14734570760', '1234', 0);

 
select * from bd_sistema.comunidade;
SELECT * FROM bd_sistema.comunidade ORDER BY padroeiro;
SELECT * FROM bd_sistema.comunidade WHERE padroeiro='São Geraldo';

select * from bd_sistema.familia;
select * from bd_sistema.membro_familia order by nome;
select * from bd_sistema.membro_familia where id_familia = 126;
SELECT * FROM bd_sistema.membro_familia WHERE cpf = '49762728009';
select count(*) as qtd from bd_sistema.membro_familia where id_familia = 102;
UPDATE bd_sistema.familia SET nome='$nomeFamilia', email='$email', id_comunidade='$id_comunidade' WHERE id_familia='$id_familia';
SELECT * FROM bd_sistema.familia WHERE nome='Drago';


-- Exclusão família
DELETE FROM bd_sistema.familia WHERE id_familia = 103;
DELETE from bd_sistema.membro_familia WHERE id_familia = 103;

delete from bd_sistema.membro_familia where id_familia > 36;
delete from bd_sistema.familia where id_comunidade = 79;

select count(*) as 'qtd' from bd_sistema.membro_familia where cpf = '15770484071';
SELECT COUNT(*)  AS 'qtd' FROM bd_sistema.comunidade WHERE padroeiro = 'São Geraldo';
SELECT COUNT(*)  AS 'qtd' FROM bd_sistema.familia WHERE id_comunidade = 79;
-- seleciona os dados dos membros
SELECT mf.*
FROM bd_sistema.membro_familia mf
INNER JOIN familia f ON mf.id_familia = f.id_familia
WHERE f.id_comunidade = 111;

-- seleciona a quantidade de membros
SELECT COUNT(*) AS 'qtd'
FROM membro_familia mf
INNER JOIN familia f ON mf.id_familia = f.id_familia
WHERE f.id_comunidade = 111;

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