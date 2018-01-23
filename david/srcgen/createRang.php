<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexRang.php');

require_once '/lib/class/Rang.php';

if (!empty($_POST['action']))
{

   $urlPOST = "http://localhost/david/services/dodajRang";
   $curl_post_data = array(
        'Nazivrang' => $_POST['Nazivrang'],         'Sponzor' => $_POST['Sponzor']    );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /david/controlPanelRang.php');

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
  <h1>Kreiranje Rang</h1>
  <div class="wrapper">
      <div class="content">
          <form name="konf"method="post" action="createRang.php">
          <table>
            <tr>
              <td>Nazivrang:</td>
              <td><input type="text" alt="inp" size="40" name="Nazivrang" required oninvalid="setCustomValidity('Unesite naziv konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
            </tr>
            <?php  include ('parts/actions/views/actionSponzorViews.php'); ?>
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