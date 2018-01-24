<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexKonferencija.php');

require_once '/lib/class/Konferencija.php';

if (!empty($_POST['action']))
{

   $urlPOST = "http://localhost/david/services/izmenikonferenciju";
   $curl_post_data = array(
     'id' => $_POST['id'],
          'Naziv' => $_POST['Naziv'],           'Opis' => $_POST['Opis'],         'Rang' => $_POST['Rang'],         'Sponzor' => $_POST['Sponzor']        );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /david/controlPanelKonferencija.php');

}

if (!empty($_GET['id']))
{
   $id = $_GET['id']; // iz url adrese edit.php?id=XXX
   $urlGet = "http://localhost/david/services/konferencija/?idKonferencija=".$id;
   $curl = curl_init($urlGet);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   $data = json_decode($response);

   $konferencija = new Konferencija();
   $konferencija->jsonDeserialize($data[0]);

}
else header('Location: controlPanelKonferencija.php');
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
  <h1>Izmena konferencije:  <?php echo $konferencija->get_naziv(); ?></h1>
  <div class="wrapper">
      <div class="content">
      <?php $varcbx = $konferencija ?>
          <form name="konf"method="post" action="editKonferencija.php">
          <table>
            <tr>
              <td>Naziv:</td>
              <td><input type="text" alt="inp" size="40" name="Naziv" value="<?php echo $konferencija->get_naziv(); ?>" required oninvalid="setCustomValidity('Unesite naziv konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}" /></td>
            </tr>
            <tr>
              <td valign="top">Opis:</td>
              <td><textarea name="Opis" cols="30" rows="5" required oninvalid="setCustomValidity('Unesite opis konferencije... ')" onchange="try{setCustomValidity('')}catch(e){}"><?php echo $konferencija->get_opis(); ?></textarea></td>
            </tr>
            <?php  require_once "parts/actions/edit/actionRangEdit.php"; ?>
            <?php  require_once "parts/actions/edit/actionSponzorEdit.php"; ?>
            <tr>
            <td colspan="2" align="center">
            <input type="hidden" name="action" value="edit" >
            <input type="hidden" name="id" id="id" value="<?php echo $konferencija->get_idKonferencija(); ?>" >
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