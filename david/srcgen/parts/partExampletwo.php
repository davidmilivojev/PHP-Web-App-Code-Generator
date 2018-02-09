<?php
    if (!empty($_GET["search"]))
      {
        echo "<div class=\"index-items-search\">";
        echo "<h2>Nametwo:";
        echo $exampletwo->get_nametwo();
        echo "</h2>";
        echo "<p>Descriptiontwo:";
        echo $exampletwo->get_descriptiontwo();
        echo "</p>";
        echo "</div>";
      }
?>