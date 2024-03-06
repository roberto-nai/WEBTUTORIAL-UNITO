<?php
    $page_name = basename($_SERVER['PHP_SELF']);
?>
<ul class="nav col-13 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="./page-01.php" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 1) echo "link-success";?>">1. Introduction & setup</a></li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 1) echo "./page-02.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 2) echo "link-success"; else echo "link-secondary";?>">
        2. Ingredients
        </a>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 2) echo "./page-03.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 3) echo "link-success"; else echo "link-secondary";?>">
        3. Agents
        </a>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 3) echo "./page-04.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 4) echo "link-success"; else echo "link-secondary";?>">
        4. World
        </a>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 4) echo "./page-05.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 5) echo "link-success"; else echo "link-secondary";?>">
            5. Behavior
        </a>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 5) echo "./page-06.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 6) echo "link-success"; else echo "link-secondary";?>">
            6. Simulation
        </a>
    </li>
</ul>