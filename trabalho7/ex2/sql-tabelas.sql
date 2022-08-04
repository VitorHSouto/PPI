CREATE TABLE enderecos
(
   id int PRIMARY KEY auto_increment,
   cep varchar(50),
   bairro varchar(50),
   logradouro varchar(50),
   cidade varchar(50),
   estado varchar(50),
) ENGINE=InnoDB;