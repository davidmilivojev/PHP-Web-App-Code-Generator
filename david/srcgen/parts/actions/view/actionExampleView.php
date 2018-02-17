<?php

$exampleone = new Example();

if (!empty($_GET["search"]))
{

$id = $_GET['search']; // iz url adrese edit.php?id=XXX
$urlGet = "http://localhost/appname/services/exampleone/?idExample=".$id;
$curl = curl_init($urlGet);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$exampleone = new Example();
$exampleone->jsonDeserialize($data[0]);
}

?>