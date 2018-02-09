<?php
require_once '/lib/class/Exampletwo.php';

$targetURL;
if (!empty($_GET["search"])) $targetURL = "http://localhost/appname/services/searchexampletwo/?search=".$_GET["search"];
else $targetURL = "http://localhost/appname/services/exampletwos";

$curl = curl_init($targetURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$exampletwos = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $exampletwo = new Exampletwo();
    $exampletwo->jsonDeserialize($data[$i]);
    array_push($exampletwos, $exampletwo);
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
    <h1>Lista Exampletwo</h1>
    <div class="wrapper">
      <div class="content">
        	<?php foreach($exampletwos as $k): ?>
            <div class="index-items">
              <div class="index-item-header">
              </div>
              <h2>Nametwo: <?php echo $k->get_nametwo(); ?></h2>
              <p>Datetwo: <?php
                $time = strtotime($k->get_datetwo());
                $myFormatForView = date("d.m.Y.", $time)." u ". date("G:i",$time)."h";
                echo $myFormatForView; ?>
              </p>
              <p>Descriptiontwo: <?php echo $k->get_descriptiontwo(); ?></p>
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