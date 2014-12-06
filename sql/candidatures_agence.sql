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
-- Structure de la table `candidatures_agence`
--

CREATE TABLE IF NOT EXISTS `candidatures_agence` (
  `ag_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ag_nom` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_date` date NOT NULL,
  `ag_effectif` char(5) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_RCS` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_site` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_adresse` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_ville` varchar(60) NOT NULL,
  `ag_cp` char(5) NOT NULL,
  `ag_dir_nom` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_dir_prenom` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_dir_fonction` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_dir_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_dir_tel` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_mentor_nom` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_mentor_prenom` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_mentor_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_mentor_tel` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_nbre_places` char(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_accueil` set('permanent','temporaire','','') CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_dispo` char(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_secteur-1` set('E-commerce','communication/marketing/publicité','nouveaux services','information et communication','mobilité et ville durable','art/patrimoine/tourisme','média/loisirs','éducation/formation') CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_secteur-2` set('CRM','Data','','') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ag_secteur-1_autre` text NOT NULL,
  `ag_secteur-2_autre` text NOT NULL,
  `ag_CG` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
