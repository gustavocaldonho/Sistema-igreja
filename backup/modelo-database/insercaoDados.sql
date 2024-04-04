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

insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("04188630086", "Paulo", "1990-05-25", 2);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("58407998079", "João", "1985-08-10", 2);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("41613989059", "Miguel", "1972-03-15", 2);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("04205781024", "Antônio", "1996-11-30", 3);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("52863175025", "Carlos", "1989-07-22", 3);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("44324278091", "Eduardo", "1978-02-05", 3);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("48412145003", "Fernando", "1991-09-17", 4);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("70739722034", "Gustavo", "1987-04-20", 4);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("48141783017", "Henrique", "1975-12-10", 4);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("65470282082", "Igor", "1992-10-07", 5);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("62329946040", "Luis", "1984-06-19", 5);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("60523088000", "Manuel", "1970-01-25", 5);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("65822333001", "Pedro", "1997-04-03", 6);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("29884228000", "Rafael", "1988-08-15", 6);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("31284998029", "Sérgio", "1977-11-29", 6);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("48898483040", "Tiago", "1993-12-20", 7);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("85435074053", "Vinícius", "1986-06-02", 7);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("09252193049", "William", "1979-09-08", 7);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("72845856091", "Xavier", "1994-03-12", 8);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("06542231064", "Yuri", "1983-07-26", 8);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("92985061040", "Zé Carlos", "1971-05-01", 8);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("76512377060", "Fernanda", "1995-02-28", 9);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("78460414019", "Igor", "1992-10-07", 9);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("25108242018", "Luis", "1984-06-19", 9);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("00119571072", "Manuel", "1970-01-25", 10);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("95813147098", "Pedro", "1997-04-03", 10);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("15052647077", "Rafael", "1988-08-15", 10);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("43698468034", "Sérgio", "1977-11-29", 11);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("22437311009", "Tiago", "1993-12-20", 11);
insert into bd_sistema.membro_familia (cpf, nome, data_nasc, id_familia) values ("67551093044", "Vinícius", "1986-06-02", 11);

-- Logins
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (00000000002, "1234", 2);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (00000000001, "1234", 1);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (00000000000, "1234", 0);

insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (04188630086, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (58407998079, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (41613989059, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (04205781024, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (52863175025, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (44324278091, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (48412145003, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (70739722034, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (48141783017, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (65470282082, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (62329946040, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (60523088000, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (65822333001, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (29884228000, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (31284998029, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (48898483040, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (85435074053, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (09252193049, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (72845856091, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (06542231064, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (92985061040, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (76512377060, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (78460414019, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (25108242018, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (00119571072, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (95813147098, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (15052647077, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (43698468034, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (22437311009, "1234", 0);
insert into bd_sistema.login (membro_familia_cpf, senha, perfil) values (67551093044, "1234", 0);

-- Eventos 
insert into bd_sistema.eventos (ativo, abrangencia, titulo, descricao, data, horario, local, presidente) values (1, 1, "Lorem ipsum dolor sit amet.", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a diam et libero hendrerit ultricies eget id enim. Quisque ac justo cursus, efficitur arcu ut, consequat augue. Duis eget augue lacus. Ut molestie nibh at sapien imperdiet sodales. Suspendisse potenti. Pellentesque iaculis a urna quis feugiat. Sed id dolor nisl. In hac habitasse platea dictumst.", "2023-12-24", "19:00", "lorem ipsum", "lorem ipsum");
insert into bd_sistema.eventos (ativo, abrangencia, titulo, descricao, data, horario, local, presidente) values (1, 1, "Lorem ipsum dolor sit amet.", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a diam et libero hendrerit ultricies eget id enim. Quisque ac justo cursus, efficitur arcu ut, consequat augue. Duis eget augue lacus. Ut molestie nibh at sapien imperdiet sodales. Suspendisse potenti. Pellentesque iaculis a urna quis feugiat. Sed id dolor nisl. In hac habitasse platea dictumst.", "2023-12-24", "19:00", "lorem ipsum", "lorem ipsum");
insert into bd_sistema.eventos (ativo, abrangencia, titulo, descricao, data, horario, local, presidente) values (1, 1, "Lorem ipsum dolor sit amet.", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a diam et libero hendrerit ultricies eget id enim. Quisque ac justo cursus, efficitur arcu ut, consequat augue. Duis eget augue lacus. Ut molestie nibh at sapien imperdiet sodales. Suspendisse potenti. Pellentesque iaculis a urna quis feugiat. Sed id dolor nisl. In hac habitasse platea dictumst.", "2023-12-24", "19:00", "lorem ipsum", "lorem ipsum");
insert into bd_sistema.eventos (ativo, abrangencia, titulo, descricao, data, horario, local, presidente) values (1, 1, "Lorem ipsum dolor sit amet.", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a diam et libero hendrerit ultricies eget id enim. Quisque ac justo cursus, efficitur arcu ut, consequat augue. Duis eget augue lacus. Ut molestie nibh at sapien imperdiet sodales. Suspendisse potenti. Pellentesque iaculis a urna quis feugiat. Sed id dolor nisl. In hac habitasse platea dictumst.", "2023-12-24", "19:00", "lorem ipsum", "lorem ipsum");
insert into bd_sistema.eventos (ativo, abrangencia, titulo, descricao, data, horario, local, presidente) values (1, 1, "Lorem ipsum dolor sit amet.", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a diam et libero hendrerit ultricies eget id enim. Quisque ac justo cursus, efficitur arcu ut, consequat augue. Duis eget augue lacus. Ut molestie nibh at sapien imperdiet sodales. Suspendisse potenti. Pellentesque iaculis a urna quis feugiat. Sed id dolor nisl. In hac habitasse platea dictumst.", "2023-12-24", "19:00", "lorem ipsum", "lorem ipsum");

-- Avisos
insert into bd_sistema.avisos (ativo, abrangencia, titulo, descricao, id_comunidade) values (1, 1, "Pellentesque orci orci, iaculis non tempus in.", "Fusce consectetur nisl id arcu tincidunt tempus. Ut malesuada magna in felis iaculis ultrices. Nunc dictum magna lectus, a volutpat erat suscipit eu. Nam eget eleifend mauris. Pellentesque orci orci, iaculis non tempus in, tristique ac ipsum. Morbi eu efficitur nunc, quis efficitur dolor. Nullam", 2);
insert into bd_sistema.avisos (ativo, abrangencia, titulo, descricao, id_comunidade) values (1, 1, "Pellentesque orci orci, iaculis non tempus in.", "Fusce consectetur nisl id arcu tincidunt tempus. Ut malesuada magna in felis iaculis ultrices. Nunc dictum magna lectus, a volutpat erat suscipit eu. Nam eget eleifend mauris. Pellentesque orci orci, iaculis non tempus in, tristique ac ipsum. Morbi eu efficitur nunc, quis efficitur dolor. Nullam", 2);
insert into bd_sistema.avisos (ativo, abrangencia, titulo, descricao, id_comunidade) values (1, 1, "Pellentesque orci orci, iaculis non tempus in.", "Fusce consectetur nisl id arcu tincidunt tempus. Ut malesuada magna in felis iaculis ultrices. Nunc dictum magna lectus, a volutpat erat suscipit eu. Nam eget eleifend mauris. Pellentesque orci orci, iaculis non tempus in, tristique ac ipsum. Morbi eu efficitur nunc, quis efficitur dolor. Nullam", 3);
insert into bd_sistema.avisos (ativo, abrangencia, titulo, descricao, id_comunidade) values (1, 1, "Pellentesque orci orci, iaculis non tempus in.", "Fusce consectetur nisl id arcu tincidunt tempus. Ut malesuada magna in felis iaculis ultrices. Nunc dictum magna lectus, a volutpat erat suscipit eu. Nam eget eleifend mauris. Pellentesque orci orci, iaculis non tempus in, tristique ac ipsum. Morbi eu efficitur nunc, quis efficitur dolor. Nullam", 4);
insert into bd_sistema.avisos (ativo, abrangencia, titulo, descricao, id_comunidade) values (1, 1, "Pellentesque orci orci, iaculis non tempus in.", "Fusce consectetur nisl id arcu tincidunt tempus. Ut malesuada magna in felis iaculis ultrices. Nunc dictum magna lectus, a volutpat erat suscipit eu. Nam eget eleifend mauris. Pellentesque orci orci, iaculis non tempus in, tristique ac ipsum. Morbi eu efficitur nunc, quis efficitur dolor. Nullam", 5);
insert into bd_sistema.avisos (ativo, abrangencia, titulo, descricao, id_comunidade) values (1, 1, "Pellentesque orci orci, iaculis non tempus in.", "Fusce consectetur nisl id arcu tincidunt tempus. Ut malesuada magna in felis iaculis ultrices. Nunc dictum magna lectus, a volutpat erat suscipit eu. Nam eget eleifend mauris. Pellentesque orci orci, iaculis non tempus in, tristique ac ipsum. Morbi eu efficitur nunc, quis efficitur dolor. Nullam", 6);
insert into bd_sistema.avisos (ativo, abrangencia, titulo, descricao, id_comunidade) values (1, 1, "Pellentesque orci orci, iaculis non tempus in.", "Fusce consectetur nisl id arcu tincidunt tempus. Ut malesuada magna in felis iaculis ultrices. Nunc dictum magna lectus, a volutpat erat suscipit eu. Nam eget eleifend mauris. Pellentesque orci orci, iaculis non tempus in, tristique ac ipsum. Morbi eu efficitur nunc, quis efficitur dolor. Nullam", 7);

