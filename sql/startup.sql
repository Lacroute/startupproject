-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2014 at 09:31 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `startup`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidatures`
--

CREATE TABLE `candidatures` (
  `cd_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cd_RS` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_nom_com` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_siret` bigint(14) unsigned NOT NULL,
  `cd_domaine` set('création:outil/service','analyse du comportement du consommateur','campagnes événementielles') CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
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
  `cd_CA_2012` char(20) NOT NULL,
  `cd_CA_2013` char(20) NOT NULL,
  `cd_CA_2014` char(20) NOT NULL,
  `cd_EBE_2012` char(20) NOT NULL,
  `cd_EBE_2013` char(20) NOT NULL,
  `cd_EBE_2014` char(20) NOT NULL,
  `cd_CAE_2012` char(20) NOT NULL,
  `cd_CAE_2013` char(20) NOT NULL,
  `cd_CAE_2014` char(20) NOT NULL,
  `cd_description` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_innovation` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_atout` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_techno` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_marche` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cd_buisnessplan` text NOT NULL,
  `cd_description_GP` text NOT NULL,
  `cd_link` varchar(250) NOT NULL,
  `cd_CG` tinyint(1) NOT NULL DEFAULT '0',
  `cd_date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cd_valid` tinyint(4) NOT NULL DEFAULT '0',
  `cd_whish` smallint(5) unsigned NOT NULL,
  `cd_startup` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `candidatures_agence`
--

CREATE TABLE `candidatures_agence` (
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
  `ag_secteur_1` set('tourisme','gaming','musique','media/loisirs','mobilite et ville durable') CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_secteur_2` set('CRM','Data Visualisation','Création : outil/service à destination des équipes de l’agence','Gestion de campagnes en ligne','Analyse du comportement du consommateur','Campagnes évènementielles') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ag_secteur_1_autre` text NOT NULL,
  `ag_secteur_2_autre` text NOT NULL,
  `ag_secteur_3` text NOT NULL,
  `ag_inscription` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_interet` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ag_date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ag_CG` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
