<?php

$name = new Name();

if (!empty($_GET["search"]))
{

$id = $_GET['search']; // iz url adrese edit.php?id=XXX
$urlGet = "http://localhost/appname/services/name/?idExample=".$id;
$curl = curl_init($urlGet);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$name = new Name();
$name->jsonDeserialize($data[0]);
}

?>