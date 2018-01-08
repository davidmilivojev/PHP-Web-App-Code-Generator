<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexKonferencija.php');


require_once '/lib/class/Konferencija.php';

$curl = curl_init('http://localhost/david/services/konferencije');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);
$konferencije = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $konferencija = new Konferencija();
    $konferencija->jsonDeserialize($data[$i]);
    array_push($konferencije, $konferencija);
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
    <h1>Administracija - Konferencija</h1>
    <div class="wrapper">
      <div class="content">
        <h4 class="create-konf"><a href="createKonferencija.php">Kreiranje Konferencija</a></h4>
        <?php foreach($konferencije as $k): ?>
          <div class="access-items">
            <h2 class="access-title control">
            Naziv: <?php echo $k->get_naziv(); ?>
            </h2>
            <form alt="edit"name="edit<?php echo $k->get_idKonferencija(); ?>" method="GET" action="editKonferencija.php">
              <input type="hidden" name="id" value="<?php echo $k->get_idKonferencija(); ?>"/>
              <input type="Button" value="Izmeni" onclick="document.edit<?php echo $k->get_idKonferencija(); ?>.submit()"/>
            </form>
            <form alt="delete" name="delete<?php echo $k->get_idKonferencija(); ?>" method="POST" action="deleteKonferencija.php">
              <input type="hidden" name="id" id="id" value="<?php echo $k->get_idKonferencija(); ?>"/>
              <input type="Button" value="Obrisi" onclick="document.delete<?php echo $k->get_idKonferencija(); ?>.submit()"/>
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