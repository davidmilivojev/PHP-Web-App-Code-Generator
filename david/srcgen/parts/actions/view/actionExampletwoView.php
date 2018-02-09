<?php

$exampletwo = new Exampletwo();

if (!empty($_GET["search"]))
{

$id = $_GET['search']; // iz url adrese edit.php?id=XXX
$urlGet = "http://localhost/appname/services/exampletwo/?idExampletwo=".$id;
$curl = curl_init($urlGet);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$exampletwo = new Exampletwo();
$exampletwo->jsonDeserialize($data[0]);
}

?>