<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexExampletwo.php');

require_once '/lib/class/Exampletwo.php';

if (!empty($_POST['action']))
{

   $urlPOST = "http://localhost/appname/services/editexampletwo";
   $curl_post_data = array(
     'id' => $_POST['id'],
          'Nametwo' => $_POST['Nametwo'],           'Datetwo' => $_POST['Datetwo']." ".$_POST['DatetwoVreme'].":00",           'Descriptiontwo' => $_POST['Descriptiontwo']        );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /appname/controlPanelExampletwo.php');

}

if (!empty($_GET['id']))
{
   $id = $_GET['id']; // iz url adrese edit.php?id=XXX
   $urlGet = "http://localhost/appname/services/exampletwoone/?idExampletwo=".$id;
   $curl = curl_init($urlGet);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   $data = json_decode($response);

   $exampletwo = new Exampletwo();
   $exampletwo->jsonDeserialize($data[0]);

}
else header('Location: controlPanelExampletwo.php');
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
  <h1>Izmena konferencije:  <?php echo $exampletwo->get_nametwo(); ?></h1>
  <div class="wrapper">
      <div class="content">
      <?php $varcbx = $exampletwo ?>
          <form name="konf"method="post" action="editExampletwo.php">
          <table>
            <tr>
              <td>Nametwo:</td>
              <td><input type="text" alt="inp" size="40" name="Nametwo" value="<?php echo $exampletwo->get_nametwo(); ?>" required oninvalid="setCustomValidity('Unesite naziv konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
            </tr>
            <tr>
              <td>Datetwo:</td>
              <td>
                <input type="date" name="Datetwo" value="<?php
                  $time = strtotime($exampletwo->get_datetwo());
                  $myFormatForView = date("Y-m-d", $time);
                  echo $myFormatForView; ?>">
                <input type="time" name="DatetwoVreme" value="<?php
                  $time = strtotime($exampletwo->get_datetwo());
                  $myFormatForView = date("h:m",$time);
                  echo $myFormatForView; ?>" >
              </td>
            </tr>
            <tr>
              <td valign="top">Descriptiontwo:</td>
              <td><textarea name="Descriptiontwo" cols="30" rows="5" required oninvalid="setCustomValidity('Unesite opis konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}"><?php echo $exampletwo->get_descriptiontwo(); ?></textarea></td>
            </tr>
            <tr>
            <td colspan="2" align="center">
            <input type="hidden" name="action" value="edit" >
            <input type="hidden" name="id" id="id" value="<?php echo $exampletwo->get_idExampletwo(); ?>" >
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