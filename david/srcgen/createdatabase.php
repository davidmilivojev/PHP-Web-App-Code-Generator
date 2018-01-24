<?php

$con = mysql_connect("localhost", "root", "");

$kreirajBazu = "CREATE DATABASE IF NOT EXISTS `bazatest` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

$kreirajTabeluKonferencija = "CREATE TABLE IF NOT EXISTS `Konferencija` (
      `idKonferencija` bigint(20) NOT NULL AUTO_INCREMENT,
      `Naziv` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
      `Opis` text NOT NULL,
      `Rang` bigint(20) NOT NULL,
      `Sponzor` bigint(20) NOT NULL,
PRIMARY KEY (`idKonferencija`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";

$kreirajTabeluRang = "CREATE TABLE IF NOT EXISTS `Rang` (
      `idRang` bigint(20) NOT NULL AUTO_INCREMENT,
      `Nazivrang` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
      `Sponzor` bigint(20) NOT NULL,
PRIMARY KEY (`idRang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";

$kreirajTabeluSponzor = "CREATE TABLE IF NOT EXISTS `Sponzor` (
      `idSponzor` bigint(20) NOT NULL AUTO_INCREMENT,
      `Naziv` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
      `Kompanija` text NOT NULL,
PRIMARY KEY (`idSponzor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";

$kreirajTabeluPredavanje = "CREATE TABLE IF NOT EXISTS `Predavanje` (
      `idPredavanje` bigint(20) NOT NULL AUTO_INCREMENT,
      `Naziv` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
      `Predavaci` text NOT NULL,
      `Pocetak` datetime NOT NULL,
      `Kraj` datetime NOT NULL,
      `Konferencija` bigint(20) NOT NULL,
PRIMARY KEY (`idPredavanje`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";


$kreirajTabeluKornisnik = "CREATE TABLE IF NOT EXISTS `korisnik` (
  `idKorisnik` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idKorisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";


$popuniTabeluKonferencija = "INSERT INTO `Konferencija` (`idKonferencija`, `Naziv`, `Opis`, `Rang`, `Sponzor`) VALUES
(1, 'naziv', 'opis', 1, 1);";
$popuniTabeluRang = "INSERT INTO `Rang` (`idRang`, `Nazivrang`, `Sponzor`) VALUES
(1, 'nazivrang', 1);";
$popuniTabeluSponzor = "INSERT INTO `Sponzor` (`idSponzor`, `Naziv`, `Kompanija`) VALUES
(1, 'naziv', 'kompanija');";
$popuniTabeluPredavanje = "INSERT INTO `Predavanje` (`idPredavanje`, `Naziv`, `Predavaci`, `Pocetak`, `Kraj`, `Konferencija`) VALUES
(1, 'naziv', 'predavaci', '2017-11-28 17:06:00', '2017-11-28 17:06:00', 1);";

mysql_query($kreirajBazu);
mysql_select_db('bazatest', $con);
mysql_query($kreirajTabeluKornisnik);
mysql_query($kreirajTabeluKonferencija);
mysql_query($kreirajTabeluRang);
mysql_query($kreirajTabeluSponzor);
mysql_query($kreirajTabeluPredavanje);
mysql_query($popuniTabeluKonferencija);
mysql_query($popuniTabeluRang);
mysql_query($popuniTabeluSponzor);
mysql_query($popuniTabeluPredavanje);

echo "Uspesno kreirano ako nema upozorenja!!";

?>