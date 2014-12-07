-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 07 Décembre 2014 à 17:56
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

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
  `ag_id` int(11) NOT NULL AUTO_INCREMENT,
  `ag_nom` varchar(250) NOT NULL,
  `ag_date` date NOT NULL,
  `ag_effectif` int(7) NOT NULL,
  `ag_RCS` varchar(250) NOT NULL,
  `ag_site` varchar(250) NOT NULL,
  `ag_email` varchar(250) NOT NULL,
  `ag_adresse` varchar(250) NOT NULL,
  `ag_ville` varchar(60) NOT NULL,
  `ag_cp` varchar(6) NOT NULL,
  `ag_dir_nom` varchar(100) NOT NULL,
  `ag_dir_prenom` varchar(100) NOT NULL,
  `ag_dir_fonction` varchar(150) NOT NULL,
  `ag_dir_email` varchar(250) NOT NULL,
  `ag_dir_tel` varchar(20) NOT NULL,
  `ag_mentor_nom` varchar(100) NOT NULL,
  `ag_mentor_prenom` varchar(100) NOT NULL,
  `ag_mentor_email` varchar(250) NOT NULL,
  `ag_mentor_tel` varchar(20) NOT NULL,
  `ag_nbre_places` varchar(20) NOT NULL,
  `ag_accueil` set('permanent','temporaire') NOT NULL,
  `ag_dispo` char(150) NOT NULL,
  `ag_secteur-1` set('E-commerce','communication/marketing/publicité','nouveaux services','information et communication','mobilité et ville durable','art/patrimoine/tourisme','média/loisirs','éducation/formation') NOT NULL,
  `ag_secteur-2` set('CRM','Data') NOT NULL,
  `ag_secteur-1_autre` text NOT NULL,
  `ag_secteur-2_autre` text NOT NULL,
  `ag_CG` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `candidatures_startup`
--

CREATE TABLE IF NOT EXISTS `candidatures_startup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `RS` varchar(250) NOT NULL,
  `nom_com` varchar(250) NOT NULL,
  `siret` int(14) NOT NULL,
  `domaine` set('communication digitale/web','création de contenu/interactivité ','événementiel','marketing relationnel/CRM','mobile/applications','Autre') NOT NULL,
  `nature` enum('Auto-entrepreneur','EURL','SA','SARL','SAS','SCOP') NOT NULL,
  `domaine_autre` varchar(250) NOT NULL,
  `rep_prenom` varchar(50) NOT NULL,
  `rep_nom` varchar(70) NOT NULL,
  `adresse` varchar(155) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `contact_nom` varchar(50) NOT NULL,
  `contact_prenom` varchar(70) NOT NULL,
  `contact_email` varchar(250) NOT NULL,
  `contact_tel` varchar(20) NOT NULL,
  `site` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `effectif` int(7) NOT NULL,
  `equipe` text NOT NULL,
  `CA_2011` varchar(20) NOT NULL,
  `CA_2012` varchar(20) NOT NULL,
  `CA_2013` varchar(20) NOT NULL,
  `CA_2014` varchar(20) NOT NULL,
  `EBE_2011` varchar(20) NOT NULL,
  `EBE_2012` varchar(20) NOT NULL,
  `EBE_2013` varchar(20) NOT NULL,
  `EBE_2014` varchar(20) NOT NULL,
  `CAE_2011` varchar(20) NOT NULL,
  `CAE_2012` varchar(20) NOT NULL,
  `CAE_2013` varchar(20) NOT NULL,
  `CAE_2014` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `techno` text NOT NULL,
  `etat` enum('Version Beta','Opérationnelle','Commercialisée') NOT NULL,
  `atout` text NOT NULL,
  `marche` text NOT NULL,
  `buisnessplan` text NOT NULL,
  `description_GP` text NOT NULL,
  `link` varchar(250) NOT NULL,
  `CG` int(1) NOT NULL DEFAULT '0',
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valid` int(4) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `whish` int(5) NOT NULL,
  `startup` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
