<?php
  // $page_next comes from the page-xx or quiz-xx functions
  echo "<a href=\"./".$page_next."\"><button type=\"button\" class=\"btn btn-secondary btn-lg\" id=\"btnNext\">";
  echo $gui_text[1][$lang]." ❯";
  echo "</button>";
  echo "</a>";
?>