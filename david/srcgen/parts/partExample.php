<?php
    if (!empty($_GET["search"]))
      {
        echo "<div class=\"index-items-search\">";
        echo "<h2>Name:";
        echo $example->get_name();
        echo "</h2>";
        echo "<p>Description:";
        echo $example->get_description();
        echo "</p>";
        echo "<p>Exampletwo:";
        if ($example->get_exampletwo()!=NULL) echo $example->get_exampletwo()->get_nametwo();
        echo "</p>";
        echo "</div>";
      }
?>