select * from bd_sistema.comunidade;
SELECT * FROM bd_sistema.comunidade ORDER BY padroeiro;
SELECT * FROM bd_sistema.comunidade WHERE id_comunidade=10;

select * from bd_sistema.familia;
select * from bd_sistema.membro_familia order by id_familia;

delete from bd_sistema.membro_familia where id_familia > 36;
delete from bd_sistema.familia where id_comunidade < 30;

select count(*) as 'qtd' from bd_sistema.membro_familia where cpf = '15770484071';

select * from bd_sistema.membro_conselho;

-- Por motivos de segurança, os códigos abaixo não funcionam (tem que especificar os atributos)
delete from bd_sistema.membro_conselho;
delete from bd_sistema.comunidade;

delete from bd_sistema;

delete from bd_sistema.membro_conselho where idcomunidade=7;
delete from bd_sistema.comunidade where id_comunidade='6';

SET foreign_key_checks = 0;
