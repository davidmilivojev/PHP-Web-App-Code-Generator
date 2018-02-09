<?php

if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["username"])) header('Location: indexExample.php');


require_once '/lib/class/Example.php';
$curl = curl_init('http://localhost/appname/services/names');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);
$names = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $example = new Example();
    $example->jsonDeserialize($data[$i]);
    array_push($names, $example);
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
    <h1>Administracija - Example</h1>
    <div class="wrapper">
      <div class="content">
        <h4 class="create-konf"><a href="createExample.php">Kreiranje Example</a></h4>
        <?php foreach($names as $k): ?>
          <div class="access-items">
            <h2 class="access-title control">
            Name: <?php echo $k->get_name(); ?>
            </h2>
            <form alt="edit"name="edit<?php echo $k->get_idExample(); ?>" method="GET" action="editExample.php">
              <input type="hidden" name="id" value="<?php echo $k->get_idExample(); ?>"/>
              <input type="Button" value="Izmeni" onclick="document.edit<?php echo $k->get_idExample(); ?>.submit()"/>
            </form>
            <form alt="delete" name="delete<?php echo $k->get_idExample(); ?>" method="POST" action="deleteExample.php">
              <input type="hidden" name="id" id="id" value="<?php echo $k->get_idExample(); ?>"/>
              <input type="Button" value="Obrisi" onclick="document.delete<?php echo $k->get_idExample(); ?>.submit()"/>
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