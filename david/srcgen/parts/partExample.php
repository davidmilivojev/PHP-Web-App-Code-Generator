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
        echo "</div>";
      }
?>