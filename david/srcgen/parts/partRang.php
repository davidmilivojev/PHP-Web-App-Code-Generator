<?php
    if (!empty($_GET["search"]))
      {
        echo "<div class=\"index-items-search\">";
        echo "<h2>Nazivrang:";
        echo $rang->get_nazivrang();
        echo "</h2>";
        echo "<p>Sponzor:";
        if ($rang->get_sponzor()!=NULL) echo $rang->get_sponzor()->get_naziv();
        echo "</p>";
        echo "</div>";
      }
?>