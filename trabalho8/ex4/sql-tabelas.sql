CREATE TABLE verificaCep
(
   id int PRIMARY KEY auto_increment,
   cep char(10) UNIQUE,
   rua varchar(50),
   bairro varchar(50),
   cidade varchar(50)
) ENGINE=InnoDB;