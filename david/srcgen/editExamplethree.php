<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexExamplethree.php');

require_once '/lib/class/Examplethree.php';

if (!empty($_POST['action']))
{

   $urlPOST = "http://localhost/appname/services/editexamplethree";
   $curl_post_data = array(
     'id' => $_POST['id'],
          'Namethree' => $_POST['Namethree'],           'Datethree' => $_POST['Datethree']." ".$_POST['DatethreeVreme'].":00",           'Dateendthree' => $_POST['Dateendthree']." ".$_POST['DateendthreeVreme'].":00",         'Exampletwo' => $_POST['Exampletwo']        );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /appname/controlPanelExamplethree.php');

}

if (!empty($_GET['id']))
{
   $id = $_GET['id']; // iz url adrese edit.php?id=XXX
   $urlGet = "http://localhost/appname/services/examplethree/?idtr=".$id;
   $curl = curl_init($urlGet);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   $data = json_decode($response);

   $examplethree = new Examplethree();
   $examplethree->jsonDeserialize($data[0]);

}
else header('Location: controlPanelExamplethree.php');
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
  <h1>Izmena konferencije:  <?php echo $examplethree->get_namethree(); ?></h1>
  <div class="wrapper">
      <div class="content">
      <?php $varcbx = $examplethree ?>
          <form name="konf"method="post" action="editExamplethree.php">
          <table>
            <tr>
              <td>Namethree:</td>
              <td><input type="text" alt="inp" size="40" name="Namethree" value="<?php echo $examplethree->get_namethree(); ?>" required oninvalid="setCustomValidity('Unesite naziv konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
            </tr>
            <tr>
              <td>Datethree:</td>
              <td>
                <input type="date" name="Datethree" value="<?php
                  $time = strtotime($examplethree->get_datethree());
                  $myFormatForView = date("Y-m-d", $time);
                  echo $myFormatForView; ?>">
                <input type="time" name="DatethreeVreme" value="<?php
                  $time = strtotime($examplethree->get_datethree());
                  $myFormatForView = date("h:m",$time);
                  echo $myFormatForView; ?>" >
              </td>
            </tr>
            <tr>
              <td>Dateendthree:</td>
              <td>
                <input type="date" name="Dateendthree" value="<?php
                  $time = strtotime($examplethree->get_dateendthree());
                  $myFormatForView = date("Y-m-d", $time);
                  echo $myFormatForView; ?>">
                <input type="time" name="DateendthreeVreme" value="<?php
                  $time = strtotime($examplethree->get_dateendthree());
                  $myFormatForView = date("h:m",$time);
                  echo $myFormatForView; ?>" >
              </td>
            </tr>
            <?php  require_once "parts/actions/edit/actionExampletwoEdit.php"; ?>
            <tr>
            <td colspan="2" align="center">
            <input type="hidden" name="action" value="edit" >
            <input type="hidden" name="id" id="id" value="<?php echo $examplethree->get_idtr(); ?>" >
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