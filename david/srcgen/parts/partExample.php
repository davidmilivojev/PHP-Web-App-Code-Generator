<?php
    if (!empty($_GET["search"]))
      {
        echo "<div class=\"index-items-search\">";
        echo "<h2>Name:";
        echo $exampleone->get_name();
        echo "</h2>";
        echo "<p>Description:";
        echo $exampleone->get_description();
        echo "</p>";
        echo "<p>Exampletwo:";
        if ($exampleone->get_exampletwo()!=NULL) echo $exampleone->get_exampletwo()->get_nametwo();
        echo "</p>";
        echo "</div>";
      }
?>