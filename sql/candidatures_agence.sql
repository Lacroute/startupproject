-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 07 Décembre 2014 à 17:43
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `effectif` int(7) NOT NULL,
  `RCS` varchar(250) NOT NULL,
  `site` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `dir_nom` varchar(100) NOT NULL,
  `dir_prenom` varchar(100) NOT NULL,
  `dir_fonction` varchar(150) NOT NULL,
  `dir_email` varchar(250) NOT NULL,
  `dir_tel` varchar(20) NOT NULL,
  `mentor_nom` varchar(100) NOT NULL,
  `mentor_prenom` varchar(100) NOT NULL,
  `mentor_email` varchar(250) NOT NULL,
  `mentor_tel` varchar(20) NOT NULL,
  `nbre_places` varchar(20) NOT NULL,
  `accueil` set('permanent','temporaire') NOT NULL,
  `dispo` char(150) NOT NULL,
  `secteur_1` set('E-commerce','communication/marketing/publicité','nouveaux services','information et communication','mobilité et ville durable','art/patrimoine/tourisme','média/loisirs','éducation/formation') NOT NULL,
  `secteur_2` set('CRM','Data') NOT NULL,
  `secteur_1_autre` text NOT NULL,
  `secteur_2_autre` text NOT NULL,
  `CG` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
