--  travail individuel 
 CREATE TABLE `chambre` (
	`cha_id` INT(11) NOT NULL AUTO_INCREMENT,
	`cha_hot_id` INT(11) NOT NULL,
	`cha_numero` INT(11) NOT NULL,
	`cha_capacite` INT(11) NOT NULL,
	`cha_type` INT(11) NOT NULL,
	PRIMARY KEY (`cha_id`),
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=64
;
CREATE TABLE `client` (
	`cli_id` INT(11) NOT NULL AUTO_INCREMENT,
	`cli_nom` VARCHAR(50) NOT NULL,
	`cli_prenom` VARCHAR(50) NOT NULL,
	`cli_adresse` VARCHAR(50)NOT NULL,
	`cli_ville` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`cli_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=8
;
CREATE TABLE `hotel` (
	`hot_id` INT(11) NOT NULL AUTO_INCREMENT,
	`hot_sta_id` INT(11) NOT NULL,
	`hot_nom` VARCHAR(50) NOT NULL,
	`hot_categorie` INT(11) NOT NULL,
	`hot_adresse` VARCHAR(50) NOT NULL,
	`hot_ville` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`hot_id`),
	INDEX `hot_sta_id` (`hot_sta_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=8
;
CREATE TABLE `reservation` (
`res_id` INT(11) NOT NULL AUTO_INCREMENT,
`res_cha_id` INT(11) NOT NULL,
`res_cli_id` INT(11) NOT NULL,
`res_date` DATETIME NOT NULL,
`res_date_debut` DATETIME NOT NULL,
`res_date_fin` DATETIME NOT NULL,
`res_prix` DECIMAL(6,2) NOT NULL,
`res_arrhes` DECIMAL(6,2) NOT NULL,
PRIMARY KEY (`res_id`),
INDEX `res_cha_id` (`res_cha_id`),
INDEX `res_cli_id` (`res_cli_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=9
;
CREATE TABLE `station` (
`sta_id` INT(11) NOT NULL AUTO_INCREMENT,
`sta_nom` VARCHAR(50) NOT NULL,
`sta_altitude` INT(11) NULL DEFAULT NULL,
PRIMARY KEY (`sta_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=4
;
 /*script de création de l'index associé à la table client*/
 create index `cha_hot_id`   on `chambre` (cha_hot_id)
 show cha_hot_id client





/*correction abdel*/
CREATE TABLE IF NOT EXISTS `chambre` (
  `cha_id` int(11) NOT NULL,
  `cha_hot_id` int(11) NOT NULL,
  `cha_numero` int(11) NOT NULL,
  `cha_capacite` int(11) NOT NULL,
  `cha_type` int(11) NOT NULL,
  PRIMARY KEY (`cha_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS `client` (
  `cli_id` int(11) NOT NULL,
  `cli_nom` varchar(50) NOT NULL,
  `cli_prenom` varchar(50) NOT NULL,
  `cli_adresse` varchar(50) NOT NULL,
  `cli_ville` varchar(50) NOT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hot_id` int(11) NOT NULL,
  `hot_sta_id` int(11) NOT NULL,
  `hot_nom` varchar(50) NOT NULL,
  `hot_categorie` int(11) NOT NULL,
  `hot_adresse` varchar(50) NOT NULL,
  `hot_ville` varchar(50) NOT NULL,
  PRIMARY KEY (`hot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS `reservation` (
  `res_id` int(11) NOT NULL,
  `res_cha_id` int(11) NOT NULL,
  `res_cli_id` int(11) NOT NULL,
  `res_date` datetime NOT NULL,
  `res_date_debut` datetime NOT NULL,
  `res_date_fin` datetime NOT NULL,
  `res_prix` decimal(5,2) NOT NULL,
  `res_arrhes` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS `station` (
  `sta_id` int(11) NOT NULL,
  `sta_nom` varchar(50) NOT NULL,
  `sta_altitude` int(11) NOT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;