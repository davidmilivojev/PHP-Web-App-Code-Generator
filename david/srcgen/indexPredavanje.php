<?php
require_once '/lib/class/Predavanje.php';

$targetURL;
if (!empty($_GET["search"])) $targetURL = "http://localhost/david/services/predavanjepretraga/?search=".$_GET["search"];
else $targetURL = "http://localhost/david/services/predavanja";

$curl = curl_init($targetURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$predavanja = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $predavanje = new Predavanje();
    $predavanje->jsonDeserialize($data[$i]);
    array_push($predavanja, $predavanje);
}

?>

<?php  include ('parts/actions/view/actionKonferencijaView.php'); ?>
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
    <h1>Lista Predavanje</h1>
    <div class="wrapper">
      <div class="content">
        <div class="admin-panel">
          <form name="trazi-filter" method="GET" action="indexPredavanje.php">
            <select class="filtKonf" name="search">
            <option value="default">---</option>
            <?php  require_once "parts/actions/actionKonferencija.php"; ?>
            </select>
              <input type="submit" name="filt" value="Filtriraj">
          </form>
          <a class="all-events" href="indexPredavanje.php">Prikazi sve</a>
          <div class="clr">
          </div>
        </div>
        <?php  require_once "parts/partKonferencija.php"; ?>
        	<?php foreach($predavanja as $k): ?>
            <div class="index-items">
              <div class="index-item-header">
              </div>
              <h2>Naziv: <?php echo $k->get_naziv(); ?></h2>
              <p>Predavaci: <?php echo $k->get_predavaci(); ?></p>
              <p>Pocetak: <?php
                $time = strtotime($k->get_pocetak());
                $myFormatForView = date("d.m.Y.", $time)." u ". date("G:i",$time)."h";
                echo $myFormatForView; ?>
              </p>
              <p>Kraj: <?php
                $time = strtotime($k->get_kraj());
                $myFormatForView = date("d.m.Y.", $time)." u ". date("G:i",$time)."h";
                echo $myFormatForView; ?>
              </p>
              <p>Konferencija: <?php echo $k->get_konferencija()->get_naziv(); ?></p>
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