<?php

$con = mysql_connect("localhost", "root", "");

$kreirajBazu = "CREATE DATABASE IF NOT EXISTS `databasename` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

$kreirajTabeluExample = "CREATE TABLE IF NOT EXISTS `Example` (
      `idExample` bigint(20) NOT NULL AUTO_INCREMENT,
      `Name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
      `Description` text NOT NULL,
PRIMARY KEY (`idExample`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";


$kreirajTabeluKornisnik = "CREATE TABLE IF NOT EXISTS `korisnik` (
  `idKorisnik` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idKorisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";


$popuniTabeluExample = "INSERT INTO `Example` (`idExample`, `Name`, `Description`) VALUES
(1, 'name', 'description');";

mysql_query($kreirajBazu);
mysql_select_db('databasename', $con);
mysql_query($kreirajTabeluKornisnik);
mysql_query($kreirajTabeluExample);
mysql_query($popuniTabeluExample);

echo "Uspesno kreirano ako nema upozorenja!!";

?>