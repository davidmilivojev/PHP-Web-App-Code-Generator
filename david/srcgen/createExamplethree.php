<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexExamplethree.php');

require_once '/lib/class/Examplethree.php';

if (!empty($_POST['action']))
{

   $urlPOST = "http://localhost/appname/services/addexamplethree";
   $curl_post_data = array(
        'Namethree' => $_POST['Namethree'],         'Datethree' => $_POST['Datethree']." ".$_POST['DatethreeVreme'].":00",         'Dateendthree' => $_POST['Dateendthree']." ".$_POST['DateendthreeVreme'].":00",         'Exampletwo' => $_POST['Exampletwo']    );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /appname/controlPanelExamplethree.php');

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
  <h1>Kreiranje Examplethree</h1>
  <div class="wrapper">
      <div class="content">
          <form name="konf"method="post" action="createExamplethree.php">
          <table>
            <tr>
              <td>Namethree:</td>
              <td><input type="text" alt="inp" size="40" name="Namethree" required oninvalid="setCustomValidity('Unesite naziv konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
            </tr>
            <tr>
              <td>Datethree:</td>
              <td>
                <input type="date" name="Datethree">
                <input type="time" name="DatethreeVreme">
              </td>
            </tr>
            <tr>
              <td>Dateendthree:</td>
              <td>
                <input type="date" name="Dateendthree">
                <input type="time" name="DateendthreeVreme">
              </td>
            </tr>
            <?php  include ('parts/actions/views/actionExampletwoViews.php'); ?>
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