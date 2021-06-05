-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 23/08/2013 às 16:08
-- Versão do servidor: 5.6.11-log
-- Versão do PHP: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `agenda`
--
CREATE DATABASE IF NOT EXISTS `estacionamento` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `estacionamento`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_contatos`
--

CREATE TABLE IF NOT EXISTS `tb_contatos` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `sobrenome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `tel` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cel` varchar(255) COLLATE utf8_bin DEFAULT NULL,
 
  PRIMARY KEY (`id_contato`)
)  ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1; ;

--
-- Fazendo dump de dados para tabela `tb_contatos`
--

INSERT INTO `tb_contatos` (`id_contato`, `nome`, `sobrenome`, `email`, `tel`, `cel`) VALUES
(1, 'Angelina', 'Jolie', 'angelinha@gmail.com', '(15)32312256', '(24)365265-958654'),
(2, 'Murilo', 'Delgado', 'murilinho@hot.com', '(15)69696969', '(15)97979797'),
(3, 'Gabriela', 'Aparecida', 'gabizinha@vitoriaregia.com', '(15)69696969', '(15)97979797'),
(4, 'Huany', 'Dourado', 'huanynha@preguntinha.com', '', '');
CREATE TABLE IF NOT EXISTS `tb_carros` (
  `id_carros` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(20) COLLATE utf8_bin NOT NULL,
  `cor` varchar(20) COLLATE utf8_bin NOT NULL,
  `marca` varchar(20) COLLATE utf8_bin NOT NULL,
  `montadora` varchar(20) COLLATE utf8_bin NOT NULL,
  `combustivel` varchar(20) COLLATE utf8_bin NOT NULL,
  `ano` int(4) NOT NULL ,
  `id_contatos` int(11) NOT NULL ,
  CONSTRAINT PK_CARROS_LOCADORA PRIMARY KEY(id_carros, placa ) 

)  ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1;

ALTER TABLE tb_carros 
 ADD CONSTRAINT fk_tb_contatos_tb_carros
 FOREIGN KEY (id_contatos) 
 REFERENCES tb_contatos (id_contato) ;
 
 
 
 
 
 
 
 
 INSERT INTO `tb_carros` (`id_carros`, `placa`, `cor`, `marca`, `montadora`, `combustivel`, `ano`, `id_contatos`) VALUES
(1, 'CIQ3344', 'BRANCO', 'GOL I', 'VOLKSWAGEM', 'GASOLINA', 1997, 1),
(2, 'DIW1048', 'PRATA', 'SIENA FIRE', 'FIAT', 'GASOLINA', 2004, 1);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
