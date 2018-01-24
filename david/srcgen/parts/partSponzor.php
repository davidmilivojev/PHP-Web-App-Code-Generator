<?php
    if (!empty($_GET["search"]))
      {
        echo "<div class=\"index-items-search\">";
        echo "<h2>Naziv:";
        echo $sponzor->get_naziv();
        echo "</h2>";
        echo "<p>Kompanija:";
        echo $sponzor->get_kompanija();
        echo "</p>";
        echo "</div>";
      }
?>