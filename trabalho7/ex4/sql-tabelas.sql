CREATE TABLE pessoa
(
   codigo int PRIMARY KEY auto_increment,
   nome varchar(50),
   sexo varchar(50),
   email varchar(50) UNIQUE,
   telefone varchar(50),
   cep varchar(50),
   logradouro varchar(50),
   cidade varchar(50),
   estado varchar(50)
) ENGINE=InnoDB;

CREATE TABLE paciente
(
   codigo int PRIMARY KEY auto_increment,
   peso varchar(50),
   altura varchar(50),
   tiposangue varchar(100),
   codigo_cliente int not null,
   FOREIGN KEY (codigo_cliente) REFERENCES pessoa(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;