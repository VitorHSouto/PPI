CREATE TABLE cadastros
(
   id int PRIMARY KEY auto_increment,
   email varchar(50),
   senhaHash varchar(100)
) ENGINE=InnoDB;