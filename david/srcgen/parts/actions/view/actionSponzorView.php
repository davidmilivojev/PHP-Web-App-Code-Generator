<?php

$sponzor = new Sponzor();

if (!empty($_GET["search"]))
{

$id = $_GET['search']; // iz url adrese edit.php?id=XXX
$urlGet = "http://localhost/david/services/sponzor/?idSponzor=".$id;
$curl = curl_init($urlGet);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$sponzor = new Sponzor();
$sponzor->jsonDeserialize($data[0]);
}

?>