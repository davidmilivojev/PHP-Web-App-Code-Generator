<?php

$predavanje = new Predavanje();

if (!empty($_GET["search"]))
{

$id = $_GET['search']; // iz url adrese edit.php?id=XXX
$urlGet = "http://localhost/david/services/predavanje/?idPredavanje=".$id;
$curl = curl_init($urlGet);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$predavanje = new Predavanje();
$predavanje->jsonDeserialize($data[0]);
}

?>