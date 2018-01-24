<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexPredavanje.php');

require_once '/lib/class/Predavanje.php';

if (!empty($_POST['action']))
{

   $urlPOST = "http://localhost/david/services/dodajpredavanje";
   $curl_post_data = array(
        'Naziv' => $_POST['Naziv'],         'Predavaci' => $_POST['Predavaci'],         'Pocetak' => $_POST['Pocetak']." ".$_POST['PocetakVreme'].":00",         'Kraj' => $_POST['Kraj']." ".$_POST['KrajVreme'].":00",         'Konferencija' => $_POST['Konferencija']    );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /david/controlPanelPredavanje.php');

}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>david</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <header>
        <div class="wrapper">
          <nav class="menu">
            <!-- <ul>
              <li>Home</li>
              <li>List</li>
              <li>User</li>
              <li>Login</li>
              <li>Logout</li>
            </ul> -->
            <?php  require_once "parts/mainmenu.php"; ?>
          </nav>
          <div class="search">
            <?php include('side_menu.php'); ?>
          </div>
          <div class="clr"></div>
        </div>
    </header>
  <img class="banner" src="images/banner.svg" alt="">
  <h1>Kreiranje Predavanje</h1>
  <div class="wrapper">
      <div class="content">
          <form name="konf"method="post" action="createPredavanje.php">
          <table>
            <tr>
              <td>Naziv:</td>
              <td><input type="text" alt="inp" size="40" name="Naziv" required oninvalid="setCustomValidity('Unesite naziv konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
            </tr>
            <tr>
              <td valign="top">Predavaci:</td>
              <td><textarea name="Predavaci" cols="30" rows="5" required oninvalid="setCustomValidity('Unesite opis konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}"></textarea></td>
            </tr>
            <tr>
              <td>Pocetak:</td>
              <td>
                <input type="date" name="Pocetak">
                <input type="time" name="PocetakVreme">
              </td>
            </tr>
            <tr>
              <td>Kraj:</td>
              <td>
                <input type="date" name="Kraj">
                <input type="time" name="KrajVreme">
              </td>
            </tr>
            <?php  include ('parts/actions/views/actionKonferencijaViews.php'); ?>
            <tr>
              <td colspan="2" align="center">
                <input type="hidden" name="action" value="create" >
                <input type="submit" value="Snimi" >
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <div class="footer-top">
    </div>
    <footer>
      <div class="wrapper">
        <p>Design by: David Milivojev</p>
      </div>
    </footer>
  </body>
</html>