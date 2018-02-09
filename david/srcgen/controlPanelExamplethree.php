<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexExamplethree.php');


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
    <h1>Administracija - Examplethree</h1>
    <div class="wrapper">
      <div class="content">
        <div class="admin-panel">
          <form name="trazi-filter" method="GET" action="controlPanelExamplethree.php">
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

        <h4 class="create-konf"><a href="createExamplethree.php">Kreiranje Examplethree</a></h4>
        <?php foreach($examplethrees as $k): ?>
          <div class="access-items">
            <h2 class="access-title control">
            Namethree: <?php echo $k->get_namethree(); ?>
            </h2>
            <form alt="edit"name="edit<?php echo $k->get_idtr(); ?>" method="GET" action="editExamplethree.php">
              <input type="hidden" name="id" value="<?php echo $k->get_idtr(); ?>"/>
              <input type="Button" value="Izmeni" onclick="document.edit<?php echo $k->get_idtr(); ?>.submit()"/>
            </form>
            <form alt="delete" name="delete<?php echo $k->get_idtr(); ?>" method="POST" action="deleteExamplethree.php">
              <input type="hidden" name="id" id="id" value="<?php echo $k->get_idtr(); ?>"/>
              <input type="Button" value="Obrisi" onclick="document.delete<?php echo $k->get_idtr(); ?>.submit()"/>
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