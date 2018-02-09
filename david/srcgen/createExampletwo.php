<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexExampletwo.php');

require_once '/lib/class/Exampletwo.php';

if (!empty($_POST['action']))
{

   $urlPOST = "http://localhost/appname/services/addexampletwo";
   $curl_post_data = array(
        'Nametwo' => $_POST['Nametwo'],         'Datetwo' => $_POST['Datetwo']." ".$_POST['DatetwoVreme'].":00",         'Descriptiontwo' => $_POST['Descriptiontwo']    );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /appname/controlPanelExampletwo.php');

}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>appname</title>
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
  <h1>Kreiranje Exampletwo</h1>
  <div class="wrapper">
      <div class="content">
          <form name="konf"method="post" action="createExampletwo.php">
          <table>
            <tr>
              <td>Nametwo:</td>
              <td><input type="text" alt="inp" size="40" name="Nametwo" required oninvalid="setCustomValidity('Unesite naziv konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
            </tr>
            <tr>
              <td>Datetwo:</td>
              <td>
                <input type="date" name="Datetwo">
                <input type="time" name="DatetwoVreme">
              </td>
            </tr>
            <tr>
              <td valign="top">Descriptiontwo:</td>
              <td><textarea name="Descriptiontwo" cols="30" rows="5" required oninvalid="setCustomValidity('Unesite opis konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}"></textarea></td>
            </tr>
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