 
 /* ex1 de hotel taravail individuel */
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

 /*script de création de l'index associé à la table client*/
 create index `cha_hot_id`   on `chambre` (cha_hot_id)
 show cha_hot_id client

/* la base hotel */

/* lot 1*/
/*1-Afficher la liste des hôtels*/
SELECT 
hot_nom ,
hot_ville 
FROM 
hotel 
/*2-Afficher la ville de résidence de Mr White*/
SELECT 
cli_ville
FROM 
client 
/*3-Afficher la liste des stations dont l’altitude < 1000*/
SELECT 
sta_altitude
From 
station 
WHERE 
sta_altitude<1000;
/*4-Afficher la liste des chambres ayant une capacité > 1*/
SELECT 
chambre_capacité
FROM 
chambre 
WHERE 
chambre_capacité>1 ;
/*5-Afficher les clients n’habitant pas à Londre*/
SELECT 
cli_nom,
cli_ville
FROM
client 
WHERE
cli_ville <> 'Londre';
/*6-Afficher la liste des hôtels située sur la ville de Bretou et possédant une catégorie>3*/
SELECT 
hot_nom,
hot_ville,
hot_categorie
FROM
hotel 
WHERE
hot_categorie>3 
AND hot_ville='bretou'
/*7-Afficher la liste des hôtels avec leur station*/ 
SELECT
 sta_nom , 
 hot_nom,
 hot_categorie,
 hot_ville
FROM 
hotel,station
WHERE
station.sta_id=hotel.hot_sta_id;
/*8-Afficher la liste des chambres et leur hôtel*/
SELECT 
hot_nom,
hot_categorie,
hot_ville,
cha_numero
FROM hotel,chambre 
WHERE hotel.hot_id=chambre.cha_hot_id;
/*9-Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou*/
SELECT
hot_nom,
hot_categorie,
hot_ville,
cha_numero,
cha_capacite
FROM hotel,chambre
WHERE hotel.hot_id=chambre.cha_hot_id 
AND hot_ville='Bretou'
AND cha_capacite>1
/*10-Afficher la liste des réservations avec le nom des clients*/ 
select r.res_id, r.res_cli_id, r.res_date, r.res_cha_id,
cl.cli_nom,
h.hot_nom
from reservation r
join client cl on cl.cli_id = r.res_cli_id
join chambre ch on ch.cha_id = r.res_cha_id
join hotel h on h.hot_id = ch.cha_hot_id
/*11-Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station*/
SELECT sta_nom,hot_nom,cha_numero,cha_capacite
From chambre, hotel, station
WHERE sta_id=hot_sta_id
AND hot_id=cha_hot_id;
/*12 - Afficher les réservations avec le nom du client et le nom de l’hôtel*/
SELECT cli_nom,hot_nom,res_date_debut,DATEDIFF(res_date_fin,res_date_debut) AS 'durée(jour)'
FROM reservation,chambre ,hotel ,station 
WHERE res_cha_id=cha_id
AND sta_id=hot_sta_id
AND hot_id=cha_hot_id;
/*lot 3*/
/*13-Compter le nombre d’hôtel par station*/ 
select count(h.hot_id) as 'nombre d''hôtels', s.sta_nom as 'Station', s.sta_id
from hotel h
join station s on s.sta_id = h.hot_sta_id
group by s.sta_nom, s.sta_id
/*14 - Compter le nombre de chambre par station*/
select count(cha_id) as 'Nb chambres', s.sta_nom as 'Station'
from station s
join hotel h on h.hot_sta_id = s.sta_id
join chambre c on c.cha_hot_id = h.hot_id
group by s.sta_nom
/*15 - Compter le nombre de chambre par station ayant une capacité > 1*/
select count(c.cha_numero) as 'nombre de chambre par station > 1', sta_nom as
'Station'
from chambre c
join hotel h on h.hot_id = c.cha_hot_id
join station s on s.sta_id = h.hot_sta_id
where c.cha_capacite > 1
group by s.sta_nom
/*16 - Afficher la liste des hôtels pour lesquels Mr Squire a effectué une réservation*/
select hot_nom as 'Nom de l''Hôtel'
from hotel h
join chambre ch on ch.cha_hot_id = h.hot_id
join reservation r on r.res_cha_id = ch.cha_id
join client cl on cl.cli_id = r.res_cli_id
where cl.cli_nom = 'Squire'
group by h.hot_nom
/*17 - Afficher la durée moyenne des réservations par station*/
select s.sta_nom as 'Station', avg(datediff(dd, r.res_date_debut, r.res_date_fin)) as
'Durée moyenne (jours)'
from reservation r
join chambre cha on cha.cha_id = r.res_cha_id
join hotel h on h.hot_id = cha.cha_hot_id
join station s on s.sta_id = h.hot_sta_id
group by s.sta_nom

