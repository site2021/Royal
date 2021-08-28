-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generaci�n: 11-11-2017 a las 01:46:06
-- Versi�n del servidor: 5.0.51
-- Versi�n de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `ryl`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `txcolegios`
-- 

CREATE TABLE `txcolegios` (
  `id` int(10) NOT NULL auto_increment,
  `nombre` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `txcolegios`
-- 

INSERT INTO `txcolegios` VALUES (1, 'LA SALLE');
INSERT INTO `txcolegios` VALUES (2, 'CALASANZ');
INSERT INTO `txcolegios` VALUES (3, 'BETHLEMITAS');

CREATE TABLE `txmeses` (
  `id` int(15) NOT NULL auto_increment,
  `nombre` varchar(50) character set utf8 collate utf8_spanish2_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `txmeses`
-- 

INSERT INTO `txmeses` VALUES (1, 'Enero');
INSERT INTO `txmeses` VALUES (2, 'Febrero');
INSERT INTO `txmeses` VALUES (3, 'Marzo');
INSERT INTO `txmeses` VALUES (4, 'Abril');
INSERT INTO `txmeses` VALUES (5, 'Mayo');
INSERT INTO `txmeses` VALUES (6, 'Junio');
INSERT INTO `txmeses` VALUES (7, 'Julio');
INSERT INTO `txmeses` VALUES (8, 'Agosto');
INSERT INTO `txmeses` VALUES (9, 'Septiembre');
INSERT INTO `txmeses` VALUES (10, 'Octubre');
INSERT INTO `txmeses` VALUES (11, 'Noviembre');
INSERT INTO `txmeses` VALUES (12, 'Diciembre');

CREATE TABLE `tbgrados` (
  `id` int(10) NOT NULL auto_increment,
  `nombre` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- Volcar la base de datos para la tabla `tbgrados`
-- 

INSERT INTO `tbgrados` VALUES (1, 'Parvulos');
INSERT INTO `tbgrados` VALUES (2, 'Pre jardin');
INSERT INTO `tbgrados` VALUES (3, 'Jard�n');
INSERT INTO `tbgrados` VALUES (4, '1');
INSERT INTO `tbgrados` VALUES (5, '2');
INSERT INTO `tbgrados` VALUES (6, '3');
INSERT INTO `tbgrados` VALUES (7, '4');
INSERT INTO `tbgrados` VALUES (8, '5');
INSERT INTO `tbgrados` VALUES (9, '6');
INSERT INTO `tbgrados` VALUES (10, '7');
INSERT INTO `tbgrados` VALUES (11, '8');
INSERT INTO `tbgrados` VALUES (12, '9');
INSERT INTO `tbgrados` VALUES (13, '10');
INSERT INTO `tbgrados` VALUES (14, '11');

CREATE TABLE `tbdatos` (
  `id` int(10) NOT NULL auto_increment,
  `barrio` varchar(100) default NULL,
  `comuna` varchar(100) default NULL,
  `tarifa` double(15,0) default NULL,
  `mediaruta` double(15,0) default NULL,
  `ciudad` varchar(100) default NULL,
  `valorliquidar` double(15,0) default NULL,
  `mediaaso` double(15,0) default NULL,
  `valorcolegio` double(15,0) default NULL,
  `mediacolegio` double(15,0) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=780 ;

-- 
-- Volcar la base de datos para la tabla `tbdatos`
-- 

INSERT INTO `tbdatos` VALUES (1, 'Cartago', 'Cartago', 266000, 153000, 'Cartago', 215000, 127500, 285000, 0);
INSERT INTO `tbdatos` VALUES (2, ' El Balso ', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (3, ' La Badea', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (4, ' La Esneda ', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (5, ' La Graciela ', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (6, ' Las Vegas ', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (7, ' Minuto de Dios ', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (8, ' Pedregales.', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (9, ' Villa Alexandra ', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (10, 'Inquilinos ', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (11, 'Otún ', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (12, 'Variante el Pollo', 'Comuna 1', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (13, ' Bosques de la Acuarela ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (14, ' El Bosque Carbonero ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (15, ' El Chicó ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (16, ' El Rosal ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (17, ' Estación Gutiérrez ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (18, ' Galaxia ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (19, ' La Divisa ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (20, ' La Floresta ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (21, ' La Romelia  Baja ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (22, ' La Romelia Alta ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (23, ' La Semilla ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (24, ' Lara Bonilla ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (25, ' Las Acacias ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (26, ' Los Pinos ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (27, ' Nuevo Bosque.', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (28, ' Tejares de la Loma ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (29, ' Villa Carola ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (30, ' Villa Colombia ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (31, ' Los Guamos ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (32, 'Carlos Ariel Escobar ', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (33, 'Quintas de Aragon', 'Comuna 10', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (34, ' Arturo López ', 'Comuna 11', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (35, ' La Capilla ', 'Comuna 11', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (36, ' La Castallena ', 'Comuna 11', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (37, ' Los Naranjos.', 'Comuna 11', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (38, ' Santa Teresita ', 'Comuna 11', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (39, ' Siete de Agosto ', 'Comuna 11', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (40, 'Los Milagros ', 'Comuna 11', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (41, ' Buenos Aires', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (42, ' Casa de la Cultura ', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (43, ' Centro Administrativo Municipal CAM ', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (44, ' Cruz Roja ', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (45, ' Guadalupe ', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (46, ' San Fernando ', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (47, ' San Nicolás ', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (48, '  Fabrisedas S.A ', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (49, 'La Carmelita ', 'Comuna 12', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (50, ' Alonso Valencia ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (51, ' Altos de Santa Mónica ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (52, ' Alvaro Patiño Amariles I', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (53, ' Camilo Mejía Duque ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (54, ' Diana Turbay ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (55, ' El Carmen ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (56, ' El Japón ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (57, ' Fabio León ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (58, ' La Aurora ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (59, ' La Cabaña ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (60, ' Las Garzas ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (61, ' Los Abedules ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (62, ' Los Cámbulos ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (63, ' Los Héroes ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (64, ' Los Leones ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (65, ' Olaya Herrera', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (66, ' Panorama Center ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (67, ' Pío XII ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (68, ' San Gregorio ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (69, ' San Rafael ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (70, ' Santiago Londoño ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (71, ' Saturno', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (72, ' Vela etapa I y II ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (73, ' Villa Alquín ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (74, ' Villa Clara ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (75, ' Villa Fanny ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (76, ' Villa Santa Mónica ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (77, 'Coogemela', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (78, 'El Paraíso ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (79, 'La sultana', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (80, 'Valher ', 'Comuna 2', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (81, ' Maracay.', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (82, ' Villa del Campestre ', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (83, 'Campestre A', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (84, 'Campestre B', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (85, 'Campestre C', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (86, 'Campestre D', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (87, 'El Oasis', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (88, 'El refugio', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (89, 'Los Olivos ', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (90, 'Torres del Sol', 'Comuna 3', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (91, 'El poblado', 'Comuna 4', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (92, 'Lucitania', 'Comuna 4', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (93, 'Pasadena', 'Comuna 4', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (94, 'Santa Clara', 'Comuna 4', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (95, 'Santa Isabel I', 'Comuna 4', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (96, 'Santa Isabel II', 'Comuna 4', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (97, ' Castellar de Santa Mónica ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (98, ' El Arco Iris ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (99, ' El Remanso ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (100, ' La Calleja ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (101, ' La Campiña ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (102, ' La Floresta ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (103, ' La Pradera ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (104, ' La Pradera Alta etapa I ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (105, ' La Pradera Alta etapa II ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (106, ' Las Palmitas ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (107, ' Las Quintas de Don Abel ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (108, ' Las Violetas ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (109, ' Los Almendros ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (110, ' Los Lagos ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (111, ' Portal de Santa Mónica ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (112, ' Prado Verde.', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (113, ' Rincón del Lago  ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (114, ' San Simón ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (115, ' Santa Mónica ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (116, '  Barlovento ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (117, '  Los Rosales ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (118, 'Catalina ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (119, 'Cocoli', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (120, 'El Prado', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (121, 'Horizontes', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (122, 'Malanday', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (123, 'Mansardas ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (124, 'Marabel ', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (125, 'Normandia', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (126, 'Terranova', 'Comuna 5', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (127, ' Buenos Aires  ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (128, ' El Recreo ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (129, ' Félix Montoya ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (130, ' Inducentro ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (131, ' La Estación', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (132, ' La Pilarica', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (133, ' La Primavera ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (134, ' Playa Rica ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (135, ' San Félix ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (136, ' Villa del Campo', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (137, ' Villa Mery ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (138, ' Villa Perla ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (139, ' Villa Tury ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (140, '  Villa Elena ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (141, 'Garma ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (142, 'Guayacanes', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (143, 'Los Arrayanes', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (144, 'Montana ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (145, 'Tarena ', 'Comuna 6', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (146, ' Balalika ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (147, ' Bosques de Milán  ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (148, ' Coomnes ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (149, ' Jardín Colonial I ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (150, ' Jardín Colonial II ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (151, ' La Esmeralda ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (152, ' Las Colinas ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (153, ' Los Cámbulos ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (154, ' Los Molinos ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (155, ' Pablo VI', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (156, ' Quintas de Jardín Colonial ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (157, ' Santa Lucía ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (158, ' Toreadles ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (159, ' Villa del Pilar etapa I ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (160, ' Villa del Pilar etapa II ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (161, ' Villalón ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (162, ' Girasol ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (163, ' Jardines de Milán ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (164, ' Villa de los Molinos', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (165, 'El Progreso ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (166, 'Milán ', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (167, 'Torres ambar', 'Comuna 7', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (168, ' Barro Blanco ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (169, ' El Diamante ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (170, ' El Mirador.', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (171, ' Guadalito ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (172, ' Maglosa ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (173, ' Martillo ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (174, ' Modelo ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (175, ' Nueva Granada ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (176, ' Pasaje Zapata ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (177, ' San Diego ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (178, ' Versalles ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (179, ' Villa Tula ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (180, 'Primero de Agosto ', 'Comuna 8', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (181, ' Bella Vista ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (182, ' Camilo Torres etapa  III ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (183, ' Camilo Torres etapa I ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (184, ' Camilo Torres etapa II ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (185, ' César Augusto López Arias ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (186, ' Divino Niño Jesús ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (187, ' El Prado ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (188, ' El Zafiro ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (189, ' La Independencia ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (190, ' La Mariana ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (191, ' Los Alpes ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (192, ' Los Libertadores ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (193, ' Meaux ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (194, ' Mercurio ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (195, ' Portal de los Alpes ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (196, ' Saturno ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (197, ' Solidaridad por Colombia ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (198, ' Venus etapa I ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (199, ' Venus etapa II ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (200, ' Villa María ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (201, ' Zaguán de las Villas.', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (202, '  Luis Carlos Galán Sarmiento ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (203, ' Júpiter ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (204, '----------', '', 0, 0, '', 0, 20000, 0, 0);
INSERT INTO `tbdatos` VALUES (205, 'Altagracia', 'Altagracia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (206, 'Canaveral', 'Altagracia', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (207, 'El Estanquillo', 'Altagracia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (208, 'El Jazmin', 'Altagracia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (209, 'El Kiosko', 'Altagracia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (210, 'Filobonito', 'Altagracia', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (211, 'Guadualito', 'Altagracia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (212, 'La Linda', 'Altagracia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (213, 'La Una', 'Altagracia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (214, 'Tinajas', 'Altagracia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (215, 'Arabia', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (216, 'Betulia', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (217, 'Betulia Alta', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (218, 'El Hogar', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (219, 'Miralindo', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (220, 'Perez Alto', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (221, 'Perez Bajo', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (222, 'Santa Cruz de Barba', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (223, 'Tres Esquinas', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (224, 'Yarumal', 'Arabia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (225, 'Belalcazar', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (226, 'Bosques de La Salle', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (227, 'Boston', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (228, 'Caminos de Canaan', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (229, 'Centenario', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (230, 'Central', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (231, 'Ciudad Palermo', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (232, 'Ciudad Pereira', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (233, 'El Vergel', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (234, 'Guaduales de Canaan', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (235, 'La Arboleda', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (236, 'La Florida', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (237, 'La Laguna', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (238, 'La Lorena I', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (239, 'La Lorena II', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (240, 'La Lorena III', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (241, 'La Lorena IV', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (242, 'La Platanera', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (243, 'La Unidad', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (244, 'Las Gaviotas', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (245, 'Los Almendros', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (246, 'Los Profesionales', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (247, 'Mejia Robledo', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (248, 'Olaya Herrera', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (249, 'Pereira', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (250, 'Providencia', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (251, 'San Luis Gonzaga', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (252, 'San Remo', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (253, 'Santa Catalina II', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (254, 'Terminal', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (255, 'Travesuras - La Churria', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (256, 'Tulcan I', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (257, 'Tulcan II', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (258, 'Tulcan III', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (259, 'Vasconia', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (260, 'Venecia', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (261, 'Verona', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (262, 'Villa Colombia', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (263, 'Villa Del Sol', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (264, 'La Lorena IV ', 'Boston', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (265, 'Azufral', 'Caimalito', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (266, 'Caimalito', 'Caimalito', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (267, 'La Carbonera', 'Caimalito', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (268, 'La Paz', 'Caimalito', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (269, 'Bloques Primero de Febrero', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (270, 'Buenos Aires', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (271, 'La Paz', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (272, 'La Victoria', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (273, 'Las Garzas', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (274, 'Los Nogales', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (275, 'Los Periodistas', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (276, 'Primero de Febrero', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (277, 'Ricardo Ramirez Carmona', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (278, 'San Esteban', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (279, 'Santander', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (280, 'Sector 30 de Agosto', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (281, 'Sector 30 de Agosto', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (282, 'Sector Galeria Central', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (283, 'Sector Lago Uribe', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (284, 'Sector Parque La Libertad', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (285, 'Sector Plaza de Bolivar', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (286, 'Turin', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (287, 'Venecia', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (288, 'Centro', 'Centro', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (289, 'Belmonte Bajo', 'Cerritos', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (290, 'Cerritos', 'Cerritos', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (291, 'Esperanza Galicia', 'Cerritos', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (292, 'Estacion Villegas', 'Cerritos', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (293, 'Galicia Alta', 'Cerritos', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (294, 'Quimbayita', 'Cerritos', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (295, 'Galicia del parque', 'Cerritos', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (296, 'Alto Erazo', 'Combia Alta', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (297, 'Amoladora Alta', 'Combia Alta', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (298, 'Amoladora Baja', 'Combia Alta', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (299, 'Betania', 'Combia Alta', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (300, 'La Convencion', 'Combia Alta', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (301, 'La Esperanza', 'Combia Alta', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (302, 'Llano Grande', 'Combia Alta', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (303, 'Minas del Socorro', 'Combia Alta', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (304, 'Pital de Combia', 'Combia Alta', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (305, 'San Luis', 'Combia Alta', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (306, 'San Vicente', 'Combia Alta', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (307, 'Crucero de Combia', 'Combia Baja', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (308, 'El Chaquiro', 'Combia Baja', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (309, 'El Eden', 'Combia Baja', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (310, 'El Pomo', 'Combia Baja', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (311, 'Honda', 'Combia Baja', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (312, 'La Bodega', 'Combia Baja', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (313, 'La Carmelita', 'Combia Baja', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (314, 'La Renta', 'Combia Baja', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (315, 'La Siria', 'Combia Baja', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (316, 'La Suecia', 'Combia Baja', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (317, 'Maracaibo', 'Combia Baja', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (318, 'San Marino', 'Combia Baja', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (319, 'Santander', 'Combia Baja', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (320, 'Aguas Claras', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (321, 'Antonio Jose de Sucre', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (322, 'Antonio Jose Valencia', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (323, 'Bella Sardi', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (324, 'Dorado I', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (325, 'Dorado II', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (326, 'El Futuro', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (327, 'El Rosal', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (328, 'La Divisa', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (329, 'Las Piramides', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (330, 'Los Nogales', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (331, 'Mirador de Bella Sardi', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (332, 'Miraflores *4', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (333, 'Naranjito', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (334, 'Normandia', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (335, 'Panorama I', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (336, 'Plan Camilo', 'Consota', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (337, 'Porvenir', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (338, 'Quintas de Panorama I', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (339, 'Quintas de Panorama II', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (340, 'Restrepo', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (341, 'Sanai II', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (342, 'Vendedores Ambulantes', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (343, 'Villa Andrea', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (344, 'Villa Cecilia', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (345, 'Villa Consota', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (346, 'Villa de La Paz', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (347, 'Villa Elena', 'Consota', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (348, 'Barberos', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (349, 'Brisas Del Consota', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (350, 'Cortes', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (351, 'Cuba', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (352, 'La Independencia *1', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (353, 'La Playita', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (354, 'La Union', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (355, 'Rafael Uribe I', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (356, 'San Fernando', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (357, 'Cuba', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (358, '2500 lotes', 'Cuba', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (359, 'Alamos Del Cafe', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (360, 'Altos de Llano Grande *2', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (361, 'Altos de Llano Grande II *2', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (362, 'Altos de Los Angeles', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (363, 'Antonio Ricaurte', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (364, 'Carlos Enrique Soto', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (365, 'Ciudad Boquia *1', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (366, 'Ciudadela Comfamiliar Boquia', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (367, 'Horizontes', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (368, 'Malaga *1', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (369, 'Nuevo Horizonte', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (370, 'Paz Verde', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (371, 'Rincon Del Cafe', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (372, 'Sector B', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (373, 'Villa Del Cafe', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (374, 'Villa Los Comunales', 'Del Cafe', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (375, 'Alcazar de Maraya', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (376, 'Altos de Tananbi', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (377, 'Balcones Condominio', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (378, 'Bosques de Santa Elena I', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (379, 'Brasilia', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (380, 'Brasilia', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (381, 'Caminos de Maraya', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (382, 'Cedritos', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (383, 'Jardin de Velez Y Velez', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (384, 'Jardin I', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (385, 'Jardin II', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (386, 'Jardin III', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (387, 'La Elvira', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (388, 'Las Mangas', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (389, 'Los Andes', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (390, 'Los Arrayanes', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (391, 'Los Cedros', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (392, 'Los Quimbayas', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (393, 'Maraya', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (394, 'Mayorca', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (395, 'Niza I', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (396, 'Niza II', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (397, 'Portal de Los Cedros', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (398, 'Rincon de Las Quintas', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (399, 'Sector 30 de Agosto', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (400, 'Villas Del Jardin I', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (401, 'Villas Del Jardin II', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (402, 'Villas Del Jardin III', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (403, 'La Castellana', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (404, 'Andalucia', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (405, 'La Elvira', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (406, 'Arco iris de la colina', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (407, 'Jardines de Tanambi', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (408, 'Batallon', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (409, 'Bosques de santa elena II', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (410, 'Villa del Jardin I', 'El Jardin', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (411, 'Alameda', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (412, 'Alejandria', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (413, 'Altavista', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (414, 'Altos de Panorama', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (415, 'Cinco de Octubre', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (416, 'El Acuario', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (417, 'Even-Ezer', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (418, 'Guadalupe', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (419, 'Hacienda Cuba', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (420, 'Jaime Pardo Leal', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (421, 'La Acuarela', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (422, 'La Bretana', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (423, 'La Floresta', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (424, 'La Habana', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (425, 'La Idalia', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (426, 'La Nueva Villa', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (427, 'Libertador', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (428, 'Libertador II', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (429, 'Los Cristales', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (430, 'Los Pinos', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (431, 'Los Prados', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (432, 'Mirador de Panorama I', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (433, 'Mirador de Panorama II', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (434, 'Mirador de Panorama III', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (435, 'Montelibano', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (436, 'Nueva Colombia', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (437, 'Olimpia', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (438, 'Portal de Las Mercedes', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (439, 'Pueblito Paisa', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (440, 'Quintas de La Acuarela I', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (441, 'Quintas de La Acuarela II', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (442, 'Quintas de Los Sauces', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (443, 'San Felipe', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (444, 'Santafe', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (445, 'Sauces I', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (446, 'Sauces II', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (447, 'Sauces III', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (448, 'Sauces IV', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (449, 'Sauces V', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (450, 'Terranova', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (451, 'Torres de La Acuarela', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (452, 'Villa Del Bosque', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (453, 'Villa Del Sur', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (454, 'Villa Elisa', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (455, 'Villa Ligia', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (456, 'Villa Ligia III', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (457, 'Villa Navarra', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (458, 'Vista Hermosa', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (459, 'Las mercedes', 'El Oso', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (460, 'Balcones de Villa Del Prado', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (461, 'Barajas', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (462, 'Cachipay', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (463, 'Hamburgo', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (464, 'Poblado I', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (465, 'Poblado II', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (466, 'Rocio Bajo', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (467, 'Samaria I', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (468, 'Samaria II', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (469, 'Villa Del Palmar', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (470, 'Villa Del Prado', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (471, 'Villa Verde', 'El Poblado', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (472, 'Caracol La Curva *4', 'El Rocio', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (473, 'Rocio Alto *3', 'El Rocio', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (474, 'El palmar de villa verde', 'El Rocio', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (475, 'El Plumon', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (476, 'El Plumon Alto', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (477, 'El Plumon Bajo', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (478, 'Gabriel Trujillo', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (479, 'Jose Hilario Lopez I', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (480, 'Jose Hilario Lopez II', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (481, 'La Hacienda', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (482, 'La Libertad', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (483, 'Matecana', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (484, 'Nacederos', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (485, 'Nueva Esperanza', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (486, 'Portal de La Villa', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (487, 'Simon Bolivar', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (488, 'Sureste de la Sierra', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (489, 'Torres de San Mateo', 'Ferrocarril', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (490, 'Canceles', 'La Bella', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (491, 'El Chocho', 'La Bella', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (492, 'El Rincon', 'La Bella', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (493, 'La Bella', 'La Bella', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (494, 'La Colonia', 'La Bella', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (495, 'La Estrella Morron', 'La Bella', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (496, 'Morron', 'La Bella', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (497, 'Mundo Nuevo', 'La Bella', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (498, 'Vista Hermosa', 'La Bella', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (499, 'El Bosque', 'La Florida', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (500, 'La Bananera', 'La Florida', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (501, 'La Florida', 'La Florida', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (502, 'La Laguna', 'La Florida', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (503, 'Libare', 'La Florida', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (504, 'La Suiza', 'La Florida', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (505, 'Plan el Manzano', 'La Florida', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (506, 'Porvenir', 'La Florida', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (507, 'San Jose', 'La Florida', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (508, 'Calle Larga', 'Morelia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (509, 'El Brillante', 'Morelia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (510, 'El Congolo', 'Morelia', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (511, 'El Retiro', 'Morelia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (512, 'Frascate', 'Morelia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (513, 'La Bamba', 'Morelia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (514, 'Los Planes', 'Morelia', 0, 0, 'Pereira', 0, 15000, 0, 0);
INSERT INTO `tbdatos` VALUES (515, 'Morelia', 'Morelia', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (516, 'San Joaquin', 'Morelia', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (517, 'Santa Teresa', 'Morelia', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (518, 'Tres Puertas', 'Morelia', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (519, 'Alcazares', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (520, 'Alfa', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (521, 'Alhambra', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (522, 'Altos de Belmonte', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (523, 'Belmonte', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (524, 'Canaveral II', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (525, 'Colores de La Villa', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (526, 'El Campin III', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (527, 'El Campin I-II', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (528, 'El Palmar', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (529, 'El Pizamo', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (530, 'Fegove', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (531, 'Gamma ', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (532, 'Gamma II', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (533, 'Gamma III', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (534, 'Gamma IV', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (535, 'Gamma V', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (536, 'Jardines de La Villa', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (537, 'La Glorieta', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (538, 'La Villa', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (539, 'Los Arrevoles', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (540, 'Los Corales', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (541, 'Los Nogales', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (542, 'Mirador de La Cien', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (543, 'Multifamiliar La Villa', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (544, 'Olimpico I', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (545, 'Olimpico II', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (546, 'Pinar de Belmonte', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (547, 'Pinar de Gamma', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (548, 'Reserva de La Villa', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (549, 'Rincon de La Palma', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (550, 'Rincon de La Villa', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (551, 'Samanes de Belmonte', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (552, 'San Felipe', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (553, 'Santa Cruz de Gamma', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (554, 'Santa Monica', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (555, 'Toluca', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (556, 'Villa Alicia', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (557, 'Villa Ilusion', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (558, 'Villas de La Madrid', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (559, 'Gamma ', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (560, 'Rincon de Unicentro', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (561, 'Serrezuela', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (562, 'Cañaveral II', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (563, 'Bosques de Cantabria', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (564, 'Olivar de los Vientos', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (565, 'Senderos de Unicentro', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (566, 'La Italia', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (567, 'Bosques de santa monica', 'Olimpica', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (568, '20 de Julio', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (569, 'Alfonso Lopez', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (570, 'Altos Del Otun *2, *3', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (571, 'Antonio Narino', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (572, 'Arboleda Del Rio', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (573, 'Brisas Del Otun', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (574, 'Castano Robledo', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (575, 'Cesar Nader Nader', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (576, 'Chico Restrepo', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (577, 'El Pizamo', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (578, 'Hernando Velez Marulanda', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (579, 'Kennedy', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (580, 'La Pupi', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (581, 'La Rivera', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (582, 'Ormaza', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (583, 'Paz Del Rio', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (584, 'Pimpollo - Libare *2', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (585, 'San Francisco', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (586, 'San Gregorio', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (587, 'Santander', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (588, 'Simon Bolivar', 'Oriente', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (589, 'Aranjuez', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (590, 'Carlos Alberto Benavides', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (591, 'Departamento', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (592, 'El Bosque', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (593, 'El Paraiso', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (594, 'Gaviria Trujillo', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (595, 'Heroes I', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (596, 'Heroes II', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (597, 'Independientes', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (598, 'La Albania', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (599, 'La Francia', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (600, 'La Policia', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (601, 'Los Almendros', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (602, 'Metropolitano', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (603, 'Neyra Marquez', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (604, 'Sinai', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (605, 'Villa Kennedy', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (606, 'Villa Maria', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (607, 'Villa Rocio', 'Perla Del Otun', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (608, 'Puerto Caldas', 'Puerto Caldas', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (609, 'America', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (610, 'Bavaria', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (611, 'Byron Gaviria', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (612, 'Campina del Otun', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (613, 'Colinas Del Triunfo', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (614, 'Constructores', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (615, 'El Prado', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (616, 'El Progreso', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (617, 'El Triunfo', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (618, 'Enrique Millan Rubio', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (619, 'Getsemani', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (620, 'Gualanday', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (621, 'Jorge Eliecer Gaitan', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (622, 'Jose Antonio Galan', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (623, 'Jose Marti', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (624, 'La Esperanza', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (625, 'La Palmera', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (626, 'La Sirena', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (627, 'Las Palmas', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (628, 'Los Alcazares', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (629, 'Mirasol', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (630, 'Nuevo Penol', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (631, 'Primero de Mayo', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (632, 'Remigio Antonio Canarte', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (633, 'Risaralda', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (634, 'Salazar Londono', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (635, 'Salazar Robledo', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (636, 'Salvador Allende', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (637, 'San Antonio', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (638, 'San Camilo', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (639, 'San Jorge', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (640, 'San Juan', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (641, 'San Juan de Dios', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (642, 'Santa Elena', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (643, 'Santa Teresita', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (644, 'Zea', 'Rio Otun', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (645, 'Altos de Corales', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (646, 'Atenas', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (647, 'Bello Horizonte', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (648, 'Bulevar de las villas', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (649, 'Bulevar del Bosque', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (650, 'Bulevar del Café', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (651, 'Campo Alegre *3', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (652, 'Ciudadela Comfamiliar I', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (653, 'Ciudadela Comfamiliar II', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (654, 'Codelmar I', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (655, 'Codelmar II', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (656, 'Codelmar III', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (657, 'Codelmar IV', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (658, 'Coralina', 'San Joaquin', 136000, 88000, 'Pereira', 136000, 83000, 136000, 0);
INSERT INTO `tbdatos` VALUES (659, 'El Cardal', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (660, 'El Crucero', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (661, 'El Eden', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (662, 'El Recreo', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (663, 'Gibraltar', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (664, 'Guayacanes', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (665, 'Jose Maria Cordoba', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (666, 'La Isla', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (667, 'Laureles I', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (668, 'Laureles II', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (669, 'Leningrado II', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (670, 'Leningrado III', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (671, 'Letras', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (672, 'Los Cisnes', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (673, 'Los Conquistadores', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (674, 'Los Geranios', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (675, 'Los Girasoles', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (676, 'Perla Del Sur', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (677, 'Plan Carvajal', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (678, 'Portal de Corales', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (679, 'Portal de San Joaquin I', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (680, 'Portal de San Joaquin II', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (681, 'Portales de Birmania', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (682, 'Puerta de Alcala', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (683, 'Quintas del Corazal', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (684, 'Rafael Uribe II', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (685, 'Rafael Uribe III', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (686, 'San Joaquin', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (687, 'San Marcos', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (688, 'Santa Clara de Las Villas *4', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (689, 'Santa Juana de Las Villas', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (690, 'Tinajas', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (691, 'Bulevar del Café', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (692, 'Bulevar del Bosque', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (693, 'Bulevar de las villas', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (694, 'Quintas del Corazal', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (695, 'Villa de leyva ', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (696, 'Villa de leyva 2', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (697, 'El nogal Club residencial', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (698, 'Batara', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (699, 'Pueblito Cafetero', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (700, 'Vereda Morelia', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (701, 'Altavista', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (702, 'Santa maria de las villas ', 'San Joaquin', 140000, 95000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (703, 'El nogal Club residencial', 'San Joaquin', 140000, 90000, 'Pereira', 110000, 70000, 150000, 0);
INSERT INTO `tbdatos` VALUES (704, 'Brisas de Las Americas', 'San Nicolas', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (705, 'La Dulcera', 'San Nicolas', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (706, 'Las Antillas', 'San Nicolas', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (707, 'Nuevo Mejico', 'San Nicolas', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (708, 'San Martin de Loba', 'San Nicolas', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (709, 'San Nicolas', 'San Nicolas', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (710, 'Villa Mery', 'San Nicolas', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (711, 'Villa Nohemy', 'San Nicolas', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (712, 'Alegrias', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (713, 'Altamira', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (714, 'Cantamonos', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (715, 'Caracol la Curva', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (716, 'Condina', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (717, 'El Guayabo', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (718, 'El Jordan', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (719, 'El Manzano', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (720, 'El Rocio', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (721, 'Guayabal', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (722, 'Huertas', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (723, 'La Graminea', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (724, 'Laguneta', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (725, 'Montelargo', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (726, 'Naranjito', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (727, 'Tribunas Consota', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (728, 'Tribunas Corcega', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (729, 'Yarumito', 'Tribunas Corcega', 210000, 125000, 'Pereira', 170000, 100000, 225000, 0);
INSERT INTO `tbdatos` VALUES (730, 'Altos de Canaan', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (731, 'Cambulos', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (732, 'Canaan', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (733, 'Ciudad Jardin', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (734, 'El Bosque *1, *3', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (735, 'Favi Utp', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (736, 'La Aurora', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (737, 'La Ensenanza', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (738, 'La Julia', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (739, 'La Julita', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (740, 'La Parcela', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (741, 'La Sierra', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (742, 'Los Alamos', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (743, 'Los Alpes', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (744, 'Los Angeles', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (745, 'Los Rosales', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (746, 'Pinares de San Martin', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (747, 'Popular Modelo', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (748, 'Alvaro Patiño Amariles II', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (749, 'Puerta de Abacanto', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (750, 'Quintanar Del Cerro *1, *3', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (751, 'San Jose', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (752, 'San Jose Sur', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (753, 'Villa Los Alamos', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (754, 'Pinares Campestre', 'Universidad', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (755, 'Puerto Nuevo ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (756, 'Bellavista', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (757, 'Ciudadela Tokio *2', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (758, 'Comfamiliar Villasantana', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (759, 'El Danubio *2, *4', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (760, 'El Otono', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (761, 'Intermedio', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (762, 'Sinaí ', 'Comuna 9', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (763, 'La Isla', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (764, 'Las Brisas', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (765, 'Las Margaritas', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (766, 'Monserrate', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (767, 'Nuevo Plan', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (768, 'Remanso', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (769, 'San Vicente', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (770, 'Veracruz', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (771, 'Veracruz II', 'Villa Santana', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (772, 'Berlin', 'Villavicencio', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (773, 'Corocito', 'Villavicencio', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (774, 'Los Andes', 'Villavicencio', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (775, 'Villavicencio', 'Villavicencio', 165000, 102500, 'Pereira', 130000, 80000, 176000, 0);
INSERT INTO `tbdatos` VALUES (776, 'Cañaveral I', 'Olimpica', 176000, 108000, 'Dosquebradas', 140000, 90000, 188000, 0);
INSERT INTO `tbdatos` VALUES (777, 'Tigre', 'Galicia Alta', 190000, 115000, 'Pereira', 152000, 91000, 205000, 0);
INSERT INTO `tbdatos` VALUES (778, 'Zaragoza', 'Valle', 310000, 175000, 'Zarogoza', 250000, 140000, 330000, 0);
INSERT INTO `tbdatos` VALUES (779, 'Profesor (75%)', 'Universidad', 122000, 81000, 'Pereira', 99000, 64500, 132000, 0);

CREATE TABLE `tbdatosveh` (
  `id` int(10) NOT NULL auto_increment,
  `colegio` varchar(100) character set utf8 default NULL,
  `ruta` varchar(15) character set utf8 default NULL,
  `interno` varchar(15) character set utf8 default NULL,
  `nombreconductor` varchar(200) character set utf8 default NULL,
  `celular` varchar(50) character set utf8 default NULL,
  `nombreauxiliar` varchar(200) character set utf8 collate utf8_spanish_ci default NULL,
  `celularauxiliar` varchar(50) character set utf8 default NULL,
  `placa` varchar(15) character set utf8 default NULL,
  `fechaentrega` date default NULL,
  `sector` varchar(200) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=37 ;

-- 
-- Volcar la base de datos para la tabla `tbdatosveh`
-- 

INSERT INTO `tbdatosveh` VALUES (1, 'LA SALLE', '18', '423', 'Juan David Salazar ', '3229430855', 'monica alejandra loaiza ', '3152183878', '', '2017-01-13', 'Centenario, Providencia, La Lorena, Gaviotas, Salida Armenia');
INSERT INTO `tbdatosveh` VALUES (2, 'LA SALLE', '31', '400', 'Cristian Jimenez', '3104151402', 'Rosalba restrepo', '3136248196', '', '2017-01-13', 'Centro, Santa teresita, San Jorge, Alfonso Lopez');
INSERT INTO `tbdatosveh` VALUES (3, 'LA SALLE', '6', '57', 'Jesus Betancurt', '3146153715', 'Maria Alejandra ', '3226180796', '', '2017-01-13', 'Centro, Sector lago Uribe, Turin, La victoria, Primero de Febrero');
INSERT INTO `tbdatosveh` VALUES (4, 'LA SALLE', '29', '267', 'Diego Salazar', '3117831662', 'Jessica Aandrea Serna Calle ', '3135383138', '', '2017-01-13', 'Combia');
INSERT INTO `tbdatosveh` VALUES (5, 'LA SALLE', '7', '467', 'Alfonso Guzman Correa', '3104562304', 'Eneida Iris Rueda', '3207184993', '', '2017-01-13', 'Cannan, Los Alamos, Pinares, Ciudad jardin');
INSERT INTO `tbdatosveh` VALUES (6, 'LA SALLE', '8', '421', 'Beatriz Helena Quiceno Rios', '3104301265', 'Natalia Villada', '3157722579', '', '2017-01-13', 'Pinares');
INSERT INTO `tbdatosveh` VALUES (7, 'LA SALLE', '5', '516', 'Edward Andres Jaramillo -\n ALEX NEIRA', '3225718791\n3206650384\n3104092550', 'Valentina Gomez', '3147529674', '', '2017-01-13', 'Los alpes, Popular Modelo, Cambulos, Los Rosales, Circunvalar, La Aurora');
INSERT INTO `tbdatosveh` VALUES (8, 'LA SALLE', '4', '720', 'Esneider Bueno PM - ', '3215953648', 'Luisa Fernanda Vargas', '3168249861', '', '2017-01-13', 'Villa del Prado, Villa Verde, Hamburgo, Poblado II');
INSERT INTO `tbdatosveh` VALUES (9, 'LA SALLE', '9', '472', 'Luis Alfonso Castro Ceballos', '3104517907', 'Jenifer montoya alzate', '3046545940', '', '2017-01-13', 'Villa de jardin I, Jardin, avenida de las americas,');
INSERT INTO `tbdatosveh` VALUES (10, 'LA SALLE', '10', '422', 'Claudia Martinez', '3146818014', 'Nora Rios ', '3115285947', '', '2017-01-13', 'Jardines de Tanambi, Altos de Tanambi, Jardin I, Arco iris de la colina');
INSERT INTO `tbdatosveh` VALUES (11, 'LA SALLE', '11', '404', 'Jorge Olmedo Morales ', '3113904948', 'Liliana Sanchez', '3158183061', '', '2017-01-13', 'Niza I, El Elvira, Maraya, Mayorca');
INSERT INTO `tbdatosveh` VALUES (12, 'LA SALLE', '12', '426', 'Ever Arango Sanchez', '3137461468', 'Diana ', '3226467619', '', '2017-01-13', 'Andalucia, La Castellana; Maraya');
INSERT INTO `tbdatosveh` VALUES (13, 'LA SALLE', '35', '138', 'William Humberto Rodriguez Ramirez', '3136595437', 'Daniela Villa ', '3116675932', '', '2017-01-13', 'Condina, Villa de leyva; tribunas Corcega, Batara, Altavista, Cuba');
INSERT INTO `tbdatosveh` VALUES (14, 'LA SALLE', '14', '462', 'Jose Hernando Roman Cardona', '3128667485', 'Luz Estela Giraldo', '3137176957', '', '2017-01-13', 'El nogal Club Residencial');
INSERT INTO `tbdatosveh` VALUES (15, 'LA SALLE', '15', '403', 'Milena Hernandez', '3146047218', 'Sandra Ramirz', '3113446560', '', '2017-01-13', 'Bulevar de las Villas');
INSERT INTO `tbdatosveh` VALUES (16, 'LA SALLE', '16', '2025', 'Daniel Agudelo A', '3218503962', 'Yeni Lorena Castañeda', '3107329760', '', '2017-01-13', 'Bulevar del café, Publito Cafetero');
INSERT INTO `tbdatosveh` VALUES (17, 'LA SALLE', '17', '411', 'German Ferney Osorio Acevedo', '3136450674', 'Angela Patricia galvis', '3147082850', '', '2017-01-13', 'Santa Clara de las villas, Santa juana de las villas');
INSERT INTO `tbdatosveh` VALUES (18, 'LA SALLE', '3', '500', 'Luis Fernando Hernandez', '3108340489', 'Doly Pineda', '3138393763', '', '2017-01-13', 'Belmonte, Rincon dela Palma');
INSERT INTO `tbdatosveh` VALUES (19, 'LA SALLE', '19', '138', 'Jorge William Carmona TYOL', '3113746950', 'Mariluz Matias', '3128249423', '', '2017-01-13', 'Bosques de santa Monica, Alcazares, Torres de santa mateo, Bosques de Cantabria, Cuba');
INSERT INTO `tbdatosveh` VALUES (20, 'LA SALLE', '20', '460', 'Jose Jesus Franco Lopez', '3104401262', 'MARINA LOPEZ', '3235026183', '', '2017-01-13', 'Los Corales');
INSERT INTO `tbdatosveh` VALUES (21, 'LA SALLE', '21', '446', 'Jorge Alberto Roldan', '3217186776', 'Maria Lilia Chiquito', '3226791678', '', '2017-01-13', 'Rincon de unicentro, Cañaveral, Senderos de unicentro');
INSERT INTO `tbdatosveh` VALUES (22, 'LA SALLE', '22', '492', 'LUZ ANGELA BEDOYA', '3166215839', 'Marcela Calvo', '3205994936', 'SJT477', '2017-01-13', 'La villa, La italia y el Paraiso');
INSERT INTO `tbdatosveh` VALUES (23, 'LA SALLE', '23', '448', 'David Gallego', '3146469058', 'Diana Ladino', '3226171024', '', '2017-01-13', 'La villa, Gamma');
INSERT INTO `tbdatosveh` VALUES (24, 'LA SALLE', '24', '414', 'Jhon Jairo Velasquez', '3126082860', 'Carmen Luisa Zapata', '3136676822', '', '2017-01-13', 'La pradera, Santa Monica, Milan, La Badea, Los almendros');
INSERT INTO `tbdatosveh` VALUES (25, 'LA SALLE', '25', '1022', 'Maria Isabel Martinez', '3113299609', 'Cristina Palacio', '3206649584', '', '2017-01-13', 'La capilla, Variante al pollo, Guadalupe, La romelia Baja, Santa Isabel Jupiter');
INSERT INTO `tbdatosveh` VALUES (26, 'LA SALLE', '26', '101', 'Jhon Gomez', '3146453768', 'Natalia Carmona Osorio', '3108315094', '', '2017-01-13', 'Cerritos, Tigre');
INSERT INTO `tbdatosveh` VALUES (27, 'LA SALLE', '26P', '454', 'Cristian Diaz', '312 7709154​', 'Irma', '3117772550', 'WHK658', '2017-01-16', 'Parvulos (Vuelta Colombia)');
INSERT INTO `tbdatosveh` VALUES (28, 'LA SALLE', '27', '410', 'Juan Carlos Vargas', '3213649116', 'Lina Maria Garcia', '3104371652', '', '2017-01-16', 'Dosquebradas');
INSERT INTO `tbdatosveh` VALUES (29, 'LA SALLE', '28', '11', 'Alejandro Rojas ', '3006646871', 'claudia forero', '3006648856', '', '2017-01-13', 'Cartago, Cerritos');
INSERT INTO `tbdatosveh` VALUES (30, 'LA SALLE', '2', 'COLEGIO1', 'Maria Antonia', '', '', '', '', '2017-01-13', 'Coralina');
INSERT INTO `tbdatosveh` VALUES (31, 'LA SALLE', '30', '466', 'Norberto Lopez', '3165540851', 'ERIKA PATRICIA', '3137291810', '', '2017-01-13', 'Jardin');
INSERT INTO `tbdatosveh` VALUES (32, 'LA SALLE', '1', 'COLEGIO 2', 'Maria Antonia', '', '', '', '', '2017-01-16', 'cañaveral, Bosque de cantabria');
INSERT INTO `tbdatosveh` VALUES (33, 'LA SALLE', '32 P', '1004', 'Jose Antonio Arias Rojas', '3226888226', 'Maria Liliana Rojas Calderon', '_', '', '2012-02-15', 'Campestre A, Cambulos de la popa; reservas de la pradera, Las americas, Papiros, ');
INSERT INTO `tbdatosveh` VALUES (34, 'LA SALLE', '33', '1019', 'Alejandra Quintero', '3158619753', 'Brena oliveira', '3165811129', '', '2017-01-17', 'Barajas, Poblado I, Hamburgo');
INSERT INTO `tbdatosveh` VALUES (35, 'LA SALLE', '34', '397', 'Andrea Suarez', '3164926481', 'Maribel Hurtado', '3186252780', '', '2017-01-17', 'Cuba Belmonte, Villa de Leyva 2');
INSERT INTO `tbdatosveh` VALUES (36, 'LA SALLE', '13', '451', 'Humberto Gomez ', '3155945071', 'Diana Valencia', '3106658843', '', '0000-00-00', '');

CREATE TABLE `tbdatosliquidar` (
  `id` int(10) NOT NULL auto_increment,
  `colegio` varchar(100) default NULL,
  `fecha` date default NULL,
  `codigo` varchar(15) default NULL,
  `nombreestudiante` varchar(200) default NULL,
  `ruta` varchar(15) default NULL,
  `grado` varchar(15) default NULL,
  `tarifa` double(15,0) default NULL,
  `valorpago` double(15,2) default NULL,
  `observacion` varchar(200) default NULL,
  `mes` varchar(50) character set utf8 collate utf8_spanish2_ci default NULL,
  `valorliq` double(15,0) default NULL,
  `aumentocol` double(15,0) default NULL,
  `porcentaje` double(15,0) default NULL,
  `porcroyal` double(15,0) default NULL,
  `gastos` double(15,0) default NULL,
  `ganancias` double(15,0) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7908 ;

CREATE TABLE `tblistageneral` (
  `id` int(10) NOT NULL auto_increment,
  `colegio` varchar(100) character set utf8 default NULL,
  `fecha` date default NULL,
  `codigo` varchar(15) character set utf8 default NULL,
  `estado` varchar(15) character set utf8 default NULL,
  `nombre` varchar(200) character set utf8 default NULL,
  `grado` varchar(50) character set utf8 default NULL,
  `direccion` varchar(200) character set utf8 default NULL,
  `barrio` varchar(200) character set utf8 default NULL,
  `comuna` varchar(200) character set utf8 default NULL,
  `ciudad` varchar(200) character set utf8 default NULL,
  `tiporuta` varchar(15) character set utf8 default NULL,
  `tarifa` double(15,0) default NULL,
  `valorcolegio` double(15,0) default NULL,
  `tarifaaso` double(15,0) default NULL,
  `telefono` varchar(50) character set utf8 default NULL,
  `celular` varchar(50) character set utf8 default NULL,
  `nombreacudiente` varchar(200) character set utf8 default NULL,
  `cedula` varchar(15) character set utf8 default NULL,
  `email` varchar(50) character set utf8 default NULL,
  `observaciones` varchar(200) character set utf8 default NULL,
  `contrato` varchar(15) character set utf8 default NULL,
  `rutaanterior` varchar(15) character set utf8 default NULL,
  `am` varchar(15) character set utf8 default NULL,
  `pm` varchar(15) character set utf8 default NULL,
  `ruta2017` varchar(15) character set utf8 default NULL,
  `aumentocolegio` double(15,0) default NULL,
  `porcentaje` double(15,0) default NULL,
  `aviso` varchar(15) character set utf8 default NULL,
  `registrornbd` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=967 ;
