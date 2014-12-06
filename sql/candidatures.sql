-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 20 Novembre 2014 à 17:01
-- Version du serveur: 5.1.57
-- Version de PHP: 5.3.10-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `startup`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidatures`
--

CREATE TABLE IF NOT EXISTS `candidatures` (
  `cd_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cd_RS` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_nom_com` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_siret` bigint(14) unsigned NOT NULL,
  `cd_domaine` set('communication digitale/web','création de contenu/interactivité ','événementiel','marketing relationnel/CRM','mobile/applications','Autre') CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_nature` enum('Auto-entrepreneur','EURL','SA','SARL','SAS','SCOP') CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_domaine_autre` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_rep_prenom` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_rep_nom` varchar(70) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_adresse` varchar(155) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_ville` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_cp` char(5) NOT NULL,
  `cd_contact_nom` varchar(50) NOT NULL,
  `cd_contact_prenom` varchar(50) NOT NULL,
  `cd_contact_email` varchar(255) NOT NULL,
  `cd_contact_tel` varchar(20) NOT NULL,
  `cd_site` varchar(150) NOT NULL,
  `cd_date` date NOT NULL,
  `cd_effectif` smallint(5) unsigned NOT NULL,
  `cd_equipe` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_CA_2011` char(20) NOT NULL,
  `cd_CA_2012` char(20) NOT NULL,
  `cd_CA_2013` char(20) NOT NULL,
  `cd_CA_2014` char(20) NOT NULL,
  `cd_EBE_2011` char(20) NOT NULL,
  `cd_EBE_2012` char(20) NOT NULL,
  `cd_EBE_2013` char(20) NOT NULL,
  `cd_EBE_2014` char(20) NOT NULL,
  `cd_CAE_2011` char(20) NOT NULL,
  `cd_CAE_2012` char(20) NOT NULL,
  `cd_CAE_2013` char(20) NOT NULL,
  `cd_CAE_2014` char(20) NOT NULL,
  `cd_description` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_techno` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_etat` enum('Version Beta','Opérationnelle','Commercialisée') CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_atout` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_marche` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_buisnessplan` text NOT NULL,
  `cd_description_GP` text NOT NULL,
  `cd_link` varchar(250) NOT NULL,
  `cd_CG` tinyint(1) NOT NULL DEFAULT '0',
  `cd_date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cd_valid` tinyint(4) NOT NULL DEFAULT '0',
  `cd_comment` text NOT NULL,
  `cd_whish` smallint(5) unsigned NOT NULL,
  `cd_startup` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
