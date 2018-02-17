<?php

$exampletwoone = new Exampletwo();

if (!empty($_GET["search"]))
{

$id = $_GET['search']; // iz url adrese edit.php?id=XXX
$urlGet = "http://localhost/appname/services/exampletwoone/?idExampletwo=".$id;
$curl = curl_init($urlGet);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$exampletwoone = new Exampletwo();
$exampletwoone->jsonDeserialize($data[0]);
}

?>