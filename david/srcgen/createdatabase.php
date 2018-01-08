<?php

$con = mysql_connect("localhost", "root", "");

$kreirajBazu = "CREATE DATABASE IF NOT EXISTS `konferencije_ias` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

$kreirajTabeluKonferencija = "CREATE TABLE IF NOT EXISTS `Konferencija` (
      `idKonferencija` bigint(20) NOT NULL AUTO_INCREMENT,
      `naziv` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
      `opis` text NOT NULL,
      `rang` bigint(20) NOT NULL,
PRIMARY KEY (`idKonferencija`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;"

$kreirajTabeluRang = "CREATE TABLE IF NOT EXISTS `Rang` (
      `idRang` bigint(20) NOT NULL AUTO_INCREMENT,
      `nazivRang` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`idRang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;"


$popuniTabeluKonferencija = "INSERT INTO `Konferencija` (`idKonferencija`, `Naziv`, `Opis`, `Rang`) VALUES
(1, 'naziv', 'opis', 1);";
$popuniTabeluRang = "INSERT INTO `Rang` (`idRang`, `Nazivrang`) VALUES
(1, 'nazivRang');";

mysql_query($kreirajBazu);
mysql_select_db('konferencije_ias', $con);
mysql_query($kreirajTabeluKonferencija);
mysql_query($kreirajTabeluRang);
mysql_query($popuniTabeluKonferencija);
mysql_query($popuniTabeluRang);

echo "Uspesno kreirano ako nema upozorenja!!";

?>