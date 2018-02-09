<ul>
  <li><a href="indexExample.php">Example</a></li>
    <?php
        if(!isset($_SESSION)) session_start();
  			  if (isset($_SESSION["username"]))
  			  {
            echo "<li class=\"dropdown\">";
            echo "<a href=\"#\">Administracija</a>";
            echo "<ul class=\"dropdown-content\">";
            echo "<li><a href=\"controlPanelExample.php\">Example</a></li>";
            echo "</ul>";
            echo "<li><a href=\"user.php\">";
            echo $_SESSION["username"];
            echo "</a></li>";
            echo "<li><a href=\"logout.php\"> Odjavi se </a></li>";
  			  }
  			  else echo "<li><a href=\"login.php\">Prijavi se</a></li>";
    ?>
</ul>