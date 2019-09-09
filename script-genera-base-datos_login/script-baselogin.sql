CREATE DATABASE IF NOT EXISTS baselogin;
USE baselogin;

CREATE TABLE  usuarios(
	Id INT (255) AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nombre varchar(255),
	clave varchar(255),
	tipo varchar(50)
)ENGINE=INNODB;

INSERT INTO `usuarios` (`Id`, `nombre`, `clave`, `tipo`) VALUES
(1, 'Carlos', '$2y$10$S0OXU.5avDXL1mbN0/oO6O7/lqd5NiwEqHJ6lbtcOc.eHm/y8NsDW', 'admin');
