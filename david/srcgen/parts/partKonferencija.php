<?php
    if (!empty($_GET["search"]))
      {
        echo "<div class=\"index-items-search\">";
        echo "<h2>Naziv:";
        echo $konferencija->get_naziv();
        echo "</h2>";
        echo "<p>Opis:";
        echo $konferencija->get_opis();
        echo "</p>";
        echo "<p>Rang:";
        if ($konferencija->get_rang()!=NULL) echo $konferencija->get_rang()->get_nazivrang();
        echo "</p>";
        echo "<p>Sponzor:";
        if ($konferencija->get_sponzor()!=NULL) echo $konferencija->get_sponzor()->get_naziv();
        echo "</p>";
        echo "</div>";
      }
?>