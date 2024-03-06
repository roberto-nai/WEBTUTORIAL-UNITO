<?php
      if (intval($_SESSION['page_level_reached']) < $next_level && $next_level != $last_level) // quiz needed if not in the last page
      {
        echo "<a href=\"./quiz-".$page_order.".php\"><button type=\"button\" class=\"btn btn-secondary btn-lg\" id=\"btnNext\">";
        echo "NEXT ❯";
        echo "</button>";
        echo "</a>";
      }
      else 
      {
        if ($next_level != $last_level) // at level 8 the tutorial is finished
        {
          echo "<a href=\"./page-0".$next_level.".php\"><button type=\"button\" class=\"btn btn-secondary btn-lg\" id=\"btnNext\">";
          echo "NEXT ❯";
          echo "</button>";
          echo "</a>";
        }
      }
?>