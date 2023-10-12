-- Comunidades
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "Acesso", "Área Restrita", "acesso@gmail.com");
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "Santa Rita", "Santa Rita", "santarita@gmail.com");
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "Nossa Senhora Aparecida", "Aparecida", "aparecidade@gmail.com");
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "São Geraldo", "Sapucaia", "saogeraldo@gmail.com");
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "Santa Bárbara", "Rádio", "santabarbara@gmail.com");
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "Nossa Senhora de Fátima", "Rondônia", "fatimarond@gmail.com");
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "Nossa Senhora das Dores", "Santa Cruz", "dasdoresa@gmail.com");
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "Nossa Senhora da Saúde", "Joaquim Távora", "saudetavora@gmail.com");
insert into bd_sistema.comunidade (ativo, padroeiro, localizacao, email) values (1, "São Valentim", "Córrego São Valentim", "saovalentim@gmail.com");

-- Famílias
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Acesso", "acesso@gmail.com", 1);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Gomes", "teste@gmail.com", 2);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Soares", "teste@gmail.com", 2);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Almeida", "teste@gmail.com", 3);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Santos", "teste@gmail.com", 3);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Barraqui", "teste@gmail.com", 4);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Debona Caldonho", "teste@gmail.com", 4);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Cardoso", "teste@gmail.com", 4);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Rocha Da Silva", "teste@gmail.com", 5);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Milanezi", "teste@gmail.com", 5);
insert into bd_sistema.familia (ativo, nome, email, id_comunidade) values (1, "Gonçalves", "teste@gmail.com", 5);

-- Membros
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("00000000002", "Administrador", "2012-12-12", 1);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("00000000001", "Conselheiro", "2012-12-12", 1);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("00000000000", "Membro", "2012-12-12", 1);

-- Logins
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (00000000002, "1234", 2);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (00000000001, "1234", 1);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (00000000000, "1234", 0);

-- Eventos 
insert into bd_sistema.eventos (ativo, abrangencia, titulo, descricao, data, horario, local, presidente) values (1, 1, "Missa de Natal", "Convidamos toda a paróquia para prestigiar nossa Missa de Ntal. Comunicamos também que haverá janta gratuita após a missa.", "2023-12-24", "19:00", "Matriz", "Pe Neil");

