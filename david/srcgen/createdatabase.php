<?php

$con = mysql_connect("localhost", "root", "");

$kreirajBazu = "CREATE DATABASE IF NOT EXISTS `databasename` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

$kreirajTabeluExample = "CREATE TABLE IF NOT EXISTS `Example` (
      `idExample` bigint(20) NOT NULL AUTO_INCREMENT,
      `Name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
      `Description` text NOT NULL,
      `Exampletwo` bigint(20) NOT NULL,
PRIMARY KEY (`idExample`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";

$kreirajTabeluExampletwo = "CREATE TABLE IF NOT EXISTS `Exampletwo` (
      `idExampletwo` bigint(20) NOT NULL AUTO_INCREMENT,
      `Nametwo` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
      `Datetwo` datetime NOT NULL,
      `Descriptiontwo` text NOT NULL,
PRIMARY KEY (`idExampletwo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";

$kreirajTabeluExamplethree = "CREATE TABLE IF NOT EXISTS `Examplethree` (
      `idtr` bigint(20) NOT NULL AUTO_INCREMENT,
      `Namethree` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
      `Datethree` datetime NOT NULL,
      `Dateendthree` datetime NOT NULL,
      `Exampletwo` bigint(20) NOT NULL,
PRIMARY KEY (`idtr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";


$kreirajTabeluKornisnik = "CREATE TABLE IF NOT EXISTS `korisnik` (
  `idKorisnik` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idKorisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";


$popuniTabeluExample = "INSERT INTO `Example` (`idExample`, `Name`, `Description`, `Exampletwo`) VALUES
(1, 'name', 'description', 1);";
$popuniTabeluExampletwo = "INSERT INTO `Exampletwo` (`idExampletwo`, `Nametwo`, `Datetwo`, `Descriptiontwo`) VALUES
(1, 'nametwo', '2017-11-28 17:06:00', 'descriptiontwo');";
$popuniTabeluExamplethree = "INSERT INTO `Examplethree` (`idtr`, `Namethree`, `Datethree`, `Dateendthree`, `Exampletwo`) VALUES
(1, 'namethree', '2017-11-28 17:06:00', '2017-11-28 17:06:00', 1);";

mysql_query($kreirajBazu);
mysql_select_db('databasename', $con);
mysql_query($kreirajTabeluKornisnik);
mysql_query($kreirajTabeluExample);
mysql_query($kreirajTabeluExampletwo);
mysql_query($kreirajTabeluExamplethree);
mysql_query($popuniTabeluExample);
mysql_query($popuniTabeluExampletwo);
mysql_query($popuniTabeluExamplethree);

echo "Uspesno kreirano ako nema upozorenja!!";

?>