<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexExample.php');

require_once '/lib/class/Example.php';

if (!empty($_POST['action']))
{

   $urlPOST = "http://localhost/appname/services/editexample";
   $curl_post_data = array(
     'id' => $_POST['id'],
          'Name' => $_POST['Name'],           'Description' => $_POST['Description'],         'Exampletwo' => $_POST['Exampletwo']        );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /appname/controlPanelExample.php');

}

if (!empty($_GET['id']))
{
   $id = $_GET['id']; // iz url adrese edit.php?id=XXX
   $urlGet = "http://localhost/appname/services/exampleone/?idExample=".$id;
   $curl = curl_init($urlGet);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   $data = json_decode($response);

   $example = new Example();
   $example->jsonDeserialize($data[0]);

}
else header('Location: controlPanelExample.php');
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
  <h1>Izmena konferencije:  <?php echo $example->get_name(); ?></h1>
  <div class="wrapper">
      <div class="content">
      <?php $varcbx = $example ?>
          <form name="konf"method="post" action="editExample.php">
          <table>
            <tr>
              <td>Name:</td>
              <td><input type="text" alt="inp" size="40" name="Name" value="<?php echo $example->get_name(); ?>" required oninvalid="setCustomValidity('Unesite naziv konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
            </tr>
            <tr>
              <td valign="top">Description:</td>
              <td><textarea name="Description" cols="30" rows="5" required oninvalid="setCustomValidity('Unesite opis konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}"><?php echo $example->get_description(); ?></textarea></td>
            </tr>
            <?php  require_once "parts/actions/edit/actionExampletwoEdit.php"; ?>
            <tr>
            <td colspan="2" align="center">
            <input type="hidden" name="action" value="edit" >
            <input type="hidden" name="id" id="id" value="<?php echo $example->get_idExample(); ?>" >
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