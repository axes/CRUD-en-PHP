Este programa, desarrollado en PHP, permite a través de un formulario registrar datos en una base de datos MySQL.
Utilizando botones ligados a funciones se pueden realizar las cuatro funciones básicas de manejo de datos: Crear, Leer, Editar y Borrar.

Crear en la base de datos una tabla:

CREATE TABLE `data` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `nombres` varchar(100) NOT NULL,
 `apellidos` varchar(100) NOT NULL,
 `nacimiento` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `telefono` varchar(100) NOT NULL,
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8