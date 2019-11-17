# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-11-17 16:32:18
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'Admin','Admin','admin','123456'),(2,'Pedro','Fernández','eduardo','123456');

#
# Structure for table "posts"
#

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(32) DEFAULT NULL,
  `contenido` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

#
# Data for table "posts"
#

INSERT INTO `posts` VALUES (44,1,'Manzana','5000','2019-11-17 10:11:40'),(45,1,'Melocoton','4500','2019-11-17 10:11:50');

#
# Structure for table "mensajes"
#

DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_emisor` int(11) DEFAULT NULL,
  `id_remitente` int(11) DEFAULT NULL,
  `titulo` varchar(32) DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `id_emisor` (`id_emisor`),
  KEY `id_remitente` (`id_remitente`),
  CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_emisor`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`id_remitente`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `mensajes_ibfk_3` FOREIGN KEY (`id_emisor`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `mensajes_ibfk_4` FOREIGN KEY (`id_remitente`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "mensajes"
#

INSERT INTO `mensajes` VALUES (1,1,1,'Saludos desde El Salvador','Hola espero te encuentres bien.','2018-05-31 01:05:40',1),(2,2,1,'Hola','este es mi mensaje','2018-05-31 01:05:02',1),(3,1,2,'Saludos desde CodeStack','Este es mi mensaje','2018-05-31 02:05:51',1),(4,2,1,'Prueba','Mensaje de prueba','2018-05-31 02:05:48',1);
