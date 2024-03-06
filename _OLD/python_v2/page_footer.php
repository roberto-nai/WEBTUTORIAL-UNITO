<?php
      if (intval($_SESSION['page_level_reached']) < $next_level && $next_level != $last_level) // quiz needed if not in the last page
      {
        echo "<a href=\"./quiz-".$page_order.".php\"><button type=\"button\" class=\"btn btn-secondary btn-lg\" id=\"btnNext\">";
        echo $gui_text[1][$lang]." ❯";
        echo "</button>";
        echo "</a>";
      }
      else 
      {
        if ($next_level != $last_level) // at level xxx the tutorial is finished
        {
          if ($next_level >= 10)
          {
            $page_php = "page-".$next_level.".php";
          }
          else
          {
            $page_php = "page-0".$next_level.".php";
          }
          echo "<a href=\"./".$page_php."\"><button type=\"button\" class=\"btn btn-secondary btn-lg\" id=\"btnNext\">";
          echo $gui_text[1][$lang]." ❯";
          echo "</button>";
          echo "</a>";
        }
      }
?>