<?php

$examplethree = new Examplethree();

if (!empty($_GET["search"]))
{

$id = $_GET['search']; // iz url adrese edit.php?id=XXX
$urlGet = "http://localhost/appname/services/examplethree/?idtr=".$id;
$curl = curl_init($urlGet);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$examplethree = new Examplethree();
$examplethree->jsonDeserialize($data[0]);
}

?>