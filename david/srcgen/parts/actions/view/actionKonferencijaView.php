<?php

$konferencija = new Konferencija();

if (!empty($_GET["search"]))
{

$id = $_GET['search']; // iz url adrese edit.php?id=XXX
$urlGet = "http://localhost/david/services/konferencija/?idKonferencija=".$id;
$curl = curl_init($urlGet);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$konferencija = new Konferencija();
$konferencija->jsonDeserialize($data[0]);
}

?>