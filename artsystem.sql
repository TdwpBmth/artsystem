SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tarchivo` (
  `iCodigo` int(11) NOT NULL,
  `vNombre` varchar(127) COLLATE utf8_spanish_ci NOT NULL,
  `vExtension` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `vUsuarioCreacion` varchar(63) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `tarchivoeliminacion` (
  `iCodigoOriginal` int(11) NOT NULL,
  `iCodigoRespaldo` int(11) NOT NULL,
  `dFechaEliminacion` date NOT NULL,
  `vUsuarioEliminacion` varchar(63) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `tarchivomodificacion` (
  `iCodigoOriginal` int(11) NOT NULL,
  `iCodigoModificado` int(11) NOT NULL,
  `dFechaModificacion` date NOT NULL,
  `vUsuarioModificacion` varchar(63) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `tdepartamento` (
  `vNombre` varchar(63) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Se almacena una cadena de tipo texto con el Nombre del departamento/área que se está definiendo',
  `vEncargado` varchar(127) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Se almacena una cadena de texto con el nombre completo de la persona encargada del departamento/área'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `tequipo` (
  `iCodigo` int(11) NOT NULL,
  `vDepartamento` varchar(63) COLLATE utf8_spanish_ci NOT NULL,
  `iNumeroInterno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `tpermiso` (
  `iArchivo` int(11) NOT NULL,
  `vUsuario` varchar(63) COLLATE utf8_spanish_ci NOT NULL,
  `iLectura` smallint(6) NOT NULL,
  `iEscritura` smallint(6) NOT NULL,
  `iEliminacion` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `tusuario` (
  `vCorreo` varchar(63) COLLATE utf8_spanish_ci NOT NULL,
  `vPassword` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `vDepartamento` varchar(63) COLLATE utf8_spanish_ci NOT NULL,
  `iEquipo` int(11) NOT NULL,
  `vTipoUsuario` varchar(63) COLLATE utf8_spanish_ci NOT NULL,
  `vNombreCompleto` varchar(127) COLLATE utf8_spanish_ci NOT NULL,
  `dFechaAlta` date NOT NULL,
  `iActivo` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `tarchivo`
  ADD PRIMARY KEY (`iCodigo`);

ALTER TABLE `tdepartamento`
  ADD PRIMARY KEY (`vNombre`);

ALTER TABLE `tequipo`
  ADD PRIMARY KEY (`iCodigo`),
  ADD KEY `vDepartamento` (`vDepartamento`);

ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`vCorreo`);

ALTER TABLE `tarchivo`
  MODIFY `iCodigo` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tequipo`
  MODIFY `iCodigo` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tequipo`
  ADD CONSTRAINT `tequipo_ibfk_1` FOREIGN KEY (`vDepartamento`) REFERENCES `tdepartamento` (`vNombre`);
COMMIT;