-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2022 at 08:27 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heartsim`
--
CREATE DATABASE IF NOT EXISTS `heartsim` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `heartsim`;

-- --------------------------------------------------------

--
-- Table structure for table `episodio_clinico`
--

DROP TABLE IF EXISTS `episodio_clinico`;
CREATE TABLE IF NOT EXISTS `episodio_clinico` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `ID_utilizador` int(15) NOT NULL,
  `ID_paciente` int(15) NOT NULL,
  `Classificacao` int(1) NOT NULL,
  `Data_consulta` datetime NOT NULL,
  `Data_Atendimento` datetime NOT NULL,
  `Relatorio` varchar(400) NOT NULL,
  `NYHA` int(1) NOT NULL,
  `Angor` int(1) NOT NULL,
  `Sincope` int(1) NOT NULL,
  `Dispneia` int(1) NOT NULL,
  `Pressao_arterial` int(5) NOT NULL,
  `Edema_periferico` int(1) NOT NULL,
  `Crepitacoes` int(1) NOT NULL,
  `Creatinina` int(1) NOT NULL,
  `Hemoglobina` int(1) NOT NULL,
  `Ejecao_VE` int(3) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `ID` int(15) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Morada` varchar(150) NOT NULL,
  `Localidade` varchar(50) NOT NULL,
  `Distrito` varchar(50) NOT NULL,
  `Contato` int(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Cartao Saude` int(20) NOT NULL,
  `Fotografia` longblob NOT NULL,
  `Lista Alergias` varchar(100) NOT NULL,
  `Data Nascimento` date NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `NIF` int(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(3) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Morada` varchar(150) NOT NULL,
  `Contactos` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Fotografia` longblob NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`ID`, `Tipo`, `Nome`, `Morada`, `Contactos`, `username`, `password`, `Fotografia`) VALUES
(1, 'MF', 'Médico de família', 'Morada do médico de familia', 911111111, 'mf_sim', 'mf_sim', 0x6c6f676f5f6663742e706e67),
(2, 'MHC', 'Médico de hospital central', 'Morada do médico de hospital central', 922222222, 'mhc_sim', 'mhc_sim', 0x6c6f676f5f6663742e706e67),
(3, 'MHD', 'Médico de hospital de dia', 'Morada do médico de hospital de dia', 933333333, 'mhd_sim', 'mhd_sim', 0x6c6f676f5f6663742e706e67),
(4, 'Adm', 'Administrador', 'Morada do administrador', 944444444, 'adm_sim', 'adm_sim', 0x6c6f676f5f6663742e706e67);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
