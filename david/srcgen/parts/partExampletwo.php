<?php
    if (!empty($_GET["search"]))
      {
        echo "<div class=\"index-items-search\">";
        echo "<h2>Nametwo:";
        echo $exampletwoone->get_nametwo();
        echo "</h2>";
        echo "<p>Descriptiontwo:";
        echo $exampletwoone->get_descriptiontwo();
        echo "</p>";
        echo "</div>";
      }
?>