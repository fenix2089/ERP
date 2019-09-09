CREATE DATABASE IF NOT EXISTS baselogin;
USE baselogin;

CREATE TABLE  usuarios(
	Id INT (255) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre varchar(255),
    clave varchar(255),
    tipo varchar(50)
) ENGINE=INNODB;

INSERT INTO `usuarios` (`Id`, `nombre`, `clave`, `tipo`) VALUES
(1, 'Yasmin', '$2y$10$.NkSEXbrMaYcE8bf9VnR9uD2KtfqUqSeHQUyuDfxDHClQjILr3EsS', 'admin'),
(2, 'Carlos', '$2y$10$S0OXU.5avDXL1mbN0/oO6O7/lqd5NiwEqHJ6lbtcOc.eHm/y8NsDW', 'admin'),
(3, 'Arturo', '$2y$10$zuXX1HpvMJccZYGgXatVzOpQ5tkmBIUhHRC253I8LcCDagasLAEuq', 'admin');

-- creen 1 usuario mas cada uno pero lo hacen tipo operador y inician sesión con ese nuevo usuario.