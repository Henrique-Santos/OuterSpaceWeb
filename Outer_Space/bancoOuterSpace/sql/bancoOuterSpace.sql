create database outerSpace;
use outerSpace;

create table usuario (
	idUsuario int AUTO_INCREMENT not null,
    fase_idFase int,
    permissao int,
    nome varchar(50),
    nick varchar(20),
    email varchar(60),
    senha varchar(50),
    maxPonto int not null,
    pontos int not null,
    pontuacao int not null,
    primary key (idUsuario)
);
create table fase (
	idFase int AUTO_INCREMENT,
    pergunta_idPergunta int,
    maxPontFase int,
    qtdMeteoro int,
    velocidadeNave int,
    primary key (idFase)
);
create table pergunta (
	idPergunta int AUTO_INCREMENT,
    tema_idTema int,
    bonus_idBonus int,
    descricaoPergunta varchar(100),
    primary key (idPergunta)
);
create table alternativa (
	idAlternativa int AUTO_INCREMENT,
    pergunta_idPergunta int,
    descricaoAlternativa varchar(100),
    opcaoCorreta int,
    primary key (idAlternativa)
);
create table tema (
	idTema int AUTO_INCREMENT,
    descricaoTema varchar(100),
    primary key (idTema)
);
create table bonus (
	idBonus int AUTO_INCREMENT,
    tipo_idTipo int,
    valor int,
    primary key (idBonus)
);
create table tipo (
	idTipo int AUTO_INCREMENT,
    descricaoTipo varchar(15),
    primary key (idTipo)
);
create table usuarioGrupo (
	idUsuarioGrupo int AUTO_INCREMENT,
    usuario_idUsuario int,
    grupo_idGrupo int,
    primary key (idUsuarioGrupo)
);
create table grupo (
	idGrupo int AUTO_INCREMENT,
    codigo int,
    rankingGrupo_idRankingGrupo int,
    descricaoGrupo varchar(100),
    primary key (idGrupo)
);
create table rankingGrupo (
	idRankingGrupo int AUTO_INCREMENT,
    grupo_idGrupo int,
    usuario varchar(50),
    ponto int,
    primary key (idRankingGrupo)
);
create table ranking (
	idRanking int AUTO_INCREMENT,
    usuario varchar(40),
    ponto int,
    primary key (idRanking)
);

alter table usuario
add constraint fk_fase
foreign key (fase_idFase)
references fase (idFase)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table fase
add constraint fk_pergunta
foreign key (pergunta_idPergunta)
references pergunta (idPergunta)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table pergunta 
add constraint fk_tema
foreign key (tema_idTema)
references tema (idTema),
add constraint fk_bonus
foreign key (bonus_idBonus)
references bonus (idBonus)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table alternativa
add constraint fk_pergunta_alternativa
foreign key (pergunta_idPergunta)
references pergunta (idPergunta)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table bonus
add constraint fk_tipo
foreign key (tipo_idTipo)
references tipo (idTipo)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table usuarioGrupo
add constraint fk_usuario
foreign key (usuario_idUsuario)
references usuario(idUsuario),
add constraint fk_grupo
foreign key (grupo_idGrupo)
references grupo (idGrupo)
ON DELETE CASCADE
ON UPDATE CASCADE;

alter table rankingGrupo
add constraint fk_grupo_RankingGrupo
foreign key (grupo_idGrupo)
references grupo (idGrupo)
ON DELETE CASCADE
ON UPDATE CASCADE; 

insert into tema(idTema, descricaoTema)
value	(1, "Tecnologia"),
		(2, "Astronomia");

insert into tipo (idTipo, descricaoTipo)
value	(1, "Ponto"),
		(2, "Vida"),
        (3, "VelocidadeTiro"),
        (4, "VelocidadeMeteoro");

insert into bonus (idBonus, tipo_idTipo, valor)
value	(1, 1, "500"),
		(2, 2, "1"),
        (3, 3, "500"),
        (4, 4, "50");

insert into pergunta (idPergunta, tema_idTema, bonus_idBonus, descricaoPergunta)
value	( 1, 1, 1, "O que faz um servidor DHCP ?"),
		( 2, 1, 2, "Quem criou o primeiro telescopio?"),
        ( 3, 1, 3, "O que significa a sigla NASA?"),
        ( 4, 1, 4, "Qual foi o primeiro computador digital eletronico criado?"),
        ( 5, 1, 1, "A NASA e uma agencia espacial de qual pais?"),
        ( 6, 2, 2, "Ciencia natural que estuda corpos celestes? "),
        ( 7, 2, 3, "Quem e considerado como o pai da ciencia moderna?"),
        ( 8, 2, 4, "Qual a data de criacao da NASA?"),
        ( 9, 2, 1, "Qual o nome do primeiro astronauta a pisar na lua?"),
        ( 10, 2, 2, "Constelacao que pode ser vista no Brasil?");
insert into alternativa (idAlternativa, pergunta_idPergunta, descricaoAlternativa, opcaoCorreta)
value	(1, 1, "Distribui endereco de rede", 1),
		(2, 1, "Traducao de endereco", 0),
		(3, 1, "Controla o acesso a internet", 0),
		(4, 1, "Imprimi arquivos", 0),
        (5, 2, "Galileu Galilei", 0),
        (6, 2, "Nicolau Copernico", 0),
        (7, 2, "Hans Lipperhey", 1),
        (8, 2, "Elias howe", 0),
        (9, 3, "National Aeronautics and Space Administration", 1),
        (10, 3, "National Aviation and Space Administration", 0),
        (11, 3, "National Aerospace Civil Aviation", 0),
        (12, 3, "North American Military Aviation", 0),
        (13, 4, "IBM PC", 0),
        (14, 4, "Commodore 64", 0),
        (15, 4, "ENIAC", 1),
        (16, 4, "Windows XP", 0),
        (17, 5, " Brasil", 0),
        (18, 5, "China", 0),
        (19, 5, "Russia", 0),
        (20, 5, "Estados Unidos da America.", 1),
        (21, 6, "Biologia", 0),
        (22, 6, "Astronomia", 1),
        (23, 6, "Geologia", 0),
        (24, 6, "Fisica", 0),
        (25, 7, "Nicolau Copernico", 0),
        (26, 7, " Ptolemeu", 0),
        (27, 7, "Galileu Galilei", 1),
        (28, 7, "Isaac Newton", 0),
		(29, 8, "29 de junho de 1960", 0),
        (30, 8, "28 de julho de 1958", 0),
        (31, 8, "29 de julho de 1958", 1),
        (32, 8, "29 de agosto de 1958", 0),
        (33, 9, "Neil Alden Armstrong", 1),
        (34, 9, "Yuri Gagarin", 0),
        (35, 9, "Sergei Krikalev", 0),
        (36, 9, "Marcos Pontes", 0),
        (37, 10, "Orion", 1),
        (38, 10, "Ursa Maior", 0),
        (39, 10, "Cruzeiro do Sul", 0),
        (40, 10, "Androida.", 0);

insert into fase (idFase, pergunta_idPergunta, maxPontFase, qtdMeteoro, velocidadeNave)
value (1, 1, 20, 1000, 600);

insert into usuario (idUsuario, fase_idFase, permissao, nome, nick, email, senha, maxPonto)
value (1, 1, 1, "Administrador", "admin", "admin@gmail.com", "admin", 1547);
    
insert into grupo (idGrupo, codigo, descricaoGrupo) 
value	(1, 1, "Extreme");

insert into usuarioGrupo (idUsuarioGrupo, usuario_idUsuario, grupo_idGrupo)
value (1, 1, 1);

insert into rankingGrupo (idRankingGrupo, grupo_idGrupo, usuario, ponto)
value	(1, 1, "adm", 1000);

update grupo set rankingGrupo_idRankingGrupo = 1
where idGrupo = 1;