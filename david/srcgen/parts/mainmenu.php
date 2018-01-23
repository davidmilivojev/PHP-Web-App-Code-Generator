<ul>
  <li><a href="indexKonferencija.php">Konferencija</a></li>
  <li><a href="indexRang.php">Rang</a></li>
  <li><a href="indexSponzor.php">Sponzor</a></li>
  <li><a href="indexPredavanje.php">Predavanje</a></li>
    <?php
        if(!isset($_SESSION)) session_start();
  			  if (isset($_SESSION["username"]))
  			  {
            echo "<li class=\"dropdown\">";
            echo "<a href=\"#\">Administracija</a>";
            echo "<ul class=\"dropdown-content\">";
            echo "<li><a href=\"controlPanelKonferencija.php\">Konferencija</a></li>";
            echo "<li><a href=\"controlPanelRang.php\">Rang</a></li>";
            echo "<li><a href=\"controlPanelSponzor.php\">Sponzor</a></li>";
            echo "<li><a href=\"controlPanelPredavanje.php\">Predavanje</a></li>";
            echo "</ul>";
            echo "<li><a href=\"user.php\">";
            echo $_SESSION["username"];
            echo "</a></li>";
            echo "<li><a href=\"logout.php\"> Odjavi se </a></li>";
  			  }
  			  else echo "<li><a href=\"login.php\">Prijavi se</a></li>";
    ?>
</ul>