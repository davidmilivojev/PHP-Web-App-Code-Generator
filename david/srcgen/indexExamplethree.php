<?php
require_once '/lib/class/Examplethree.php';

$targetURL;
if (!empty($_GET["search"])) $targetURL = "http://localhost/appname/services/searchexthree/?search=".$_GET["search"];
else $targetURL = "http://localhost/appname/services/examplethrees";

$curl = curl_init($targetURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);

$examplethrees = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $examplethree = new Examplethree();
    $examplethree->jsonDeserialize($data[$i]);
    array_push($examplethrees, $examplethree);
}

?>

<?php  include ('parts/actions/view/actionExampletwoView.php'); ?>
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
    <h1>Lista Examplethree</h1>
    <div class="wrapper">
      <div class="content">
        <div class="admin-panel">
          <form name="trazi-filter" method="GET" action="indexExamplethree.php">
            <select class="filtKonf" name="search">
            <option value="default">---</option>
            <?php  require_once "parts/actions/actionExampletwo.php"; ?>
            </select>
              <input type="submit" name="filt" value="Filtriraj">
          </form>
          <a class="all-events" href="indexExamplethree.php">Prikazi sve</a>
          <div class="clr">
          </div>
        </div>
        <?php  require_once "parts/partExampletwo.php"; ?>
        	<?php foreach($examplethrees as $k): ?>
            <div class="index-items">
              <div class="index-item-header">
              </div>
              <h2>Namethree: <?php echo $k->get_namethree(); ?></h2>
              <p>Datethree: <?php
                $time = strtotime($k->get_datethree());
                $myFormatForView = date("d.m.Y.", $time)." u ". date("G:i",$time)."h";
                echo $myFormatForView; ?>
              </p>
              <p>Dateendthree: <?php
                $time = strtotime($k->get_dateendthree());
                $myFormatForView = date("d.m.Y.", $time)." u ". date("G:i",$time)."h";
                echo $myFormatForView; ?>
              </p>
              <p>Exampletwo: <?php echo $k->get_exampletwo()->get_nametwo(); ?></p>
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