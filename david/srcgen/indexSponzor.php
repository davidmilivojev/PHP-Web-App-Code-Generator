<?php
require_once '/lib/class/Sponzor.php';

$targetURL;
if (!empty($_GET["search"])) $targetURL = "http://localhost/david/services/sponzorpretraga/?search=".$_GET["search"];
else $targetURL = "http://localhost/david/services/sponzori";

$curl = curl_init($targetURL);
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
    <h1>Lista Sponzor</h1>
    <div class="wrapper">
      <div class="content">
        	<?php foreach($sponzori as $k): ?>
            <div class="index-items">
              <div class="index-item-header">
              </div>
              <h2>Naziv: <?php echo $k->get_naziv(); ?></h2>
              <p>Kompanija: <?php echo $k->get_kompanija(); ?></p>
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