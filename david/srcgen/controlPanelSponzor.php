<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexSponzor.php');


require_once '/lib/class/Sponzor.php';
$curl = curl_init('http://localhost/david/services/sponzori');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);
$sponzori = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $sponzor = new Sponzor();
    $sponzor->jsonDeserialize($data[$i]);
    array_push($sponzori, $sponzor);
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
    <h1>Administracija - Sponzor</h1>
    <div class="wrapper">
      <div class="content">
        <h4 class="create-konf"><a href="createSponzor.php">Kreiranje Sponzor</a></h4>
        <?php foreach($sponzori as $k): ?>
          <div class="access-items">
            <h2 class="access-title control">
            Naziv: <?php echo $k->get_naziv(); ?>
            </h2>
            <form alt="edit"name="edit<?php echo $k->get_idSponzor(); ?>" method="GET" action="editSponzor.php">
              <input type="hidden" name="id" value="<?php echo $k->get_idSponzor(); ?>"/>
              <input type="Button" value="Izmeni" onclick="document.edit<?php echo $k->get_idSponzor(); ?>.submit()"/>
            </form>
            <form alt="delete" name="delete<?php echo $k->get_idSponzor(); ?>" method="POST" action="deleteSponzor.php">
              <input type="hidden" name="id" id="id" value="<?php echo $k->get_idSponzor(); ?>"/>
              <input type="Button" value="Obrisi" onclick="document.delete<?php echo $k->get_idSponzor(); ?>.submit()"/>
            </form>
            <div class="clr">
            </div>
          </div>
          <?php endforeach; ?>
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