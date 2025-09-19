-- Crear tabla entidades_financieras
CREATE TABLE `entidades_financieras` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` varchar(4) DEFAULT NULL COMMENT 'Código del banco',
  `nombre` varchar(255) DEFAULT NULL COMMENT 'Nombre del banco',
  `rif` varchar(20) DEFAULT NULL COMMENT 'RIF del banco',
  `logo` varchar(255) DEFAULT NULL COMMENT 'Path del logo del banco',
  `activo` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Estado activo del banco',
  PRIMARY KEY (`id`),
  UNIQUE KEY `entidades_financieras_codigo_unique` (`codigo`),
  KEY `entidades_financieras_codigo_index` (`codigo`),
  KEY `entidades_financieras_activo_index` (`activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertar datos de los bancos
INSERT INTO `entidades_financieras` (`codigo`, `nombre`, `rif`, `logo`, `activo`) VALUES
('0102', 'Banco de Venezuela', 'G200099976', 'bancos/banco-venezuela.png', 1),
('0104', 'Venezolano de Crédito', 'J000029709', 'bancos/venezolano-credito.png', 1),
('0105', 'Mercantil Banco', 'J000029610', 'bancos/mercantil.png', 1),
('0108', 'BBVA Provincial', 'J000029679', 'bancos/bbva-provincial.png', 1),
('0114', 'Bancaribe', 'J000029490', 'bancos/bancaribe.png', 1),
('0115', 'Banco Exterior', 'J000029504', 'bancos/banco-exterior.png', 1),
('0128', 'Banco Caroní', 'J095048551', 'bancos/banco-caroni.png', 1),
('0134', 'Banesco', 'J070133805', 'bancos/banesco.png', 1),
('0137', 'Banco Sofitasa', 'J090283846', 'bancos/sofitasa.png', 1),
('0138', 'Banco Plaza', 'J002970553', 'bancos/banco-plaza.png', 1),
('0146', 'Bangente C.A', 'J301442040', 'bancos/bangente.png', 1),
('0151', 'BFC Banco Fondo Común', 'J000723060', 'bancos/bfc.png', 1),
('0156', '100% Banco', 'J085007768', 'bancos/100-banco.png', 1),
('0157', 'DelSur Banco', 'J000797234', 'bancos/delsur.png', 1),
('0163', 'Banco del Tesoro', 'G200051876', 'bancos/banco-tesoro.png', 1),
('0166', 'Banco Agrícola de Venezuela', 'G200057955', 'bancos/banco-agricola.png', 1),
('0168', 'Bancrecer', 'J316374173', 'bancos/bancrecer.png', 1),
('0169', 'Mi Banco', 'J315941023', 'bancos/mi-banco.png', 1),
('0171', 'Banco Activo', 'J080066227', 'bancos/banco-activo.png', 1),
('0172', 'Bancamiga', 'J316287599', 'bancos/bancamiga.png', 1),
('0173', 'Banco Internacional de Desarrollo', 'J294640109', 'bancos/bid.png', 1),
('0174', 'Banplus', 'J000423032', 'bancos/banplus.png', 1),
('0175', 'Banco Digital de Los Trabajadores', 'G200091487', 'bancos/banco-trabajadores.png', 1),
('0177', 'Banco de la Fuerza Armada Nacional Bolivariana', 'G200106573', 'bancos/banfanb.png', 1),
('0178', 'N58 Banco Digital', 'J503581107', 'bancos/n58.png', 1),
('0191', 'Banco Nacional de Crédito', 'J309841327', 'bancos/bnc.png', 1),
('0601', 'Instituto Municipal de Crédito Popular', 'J000145903', 'bancos/imcp.png', 1);
