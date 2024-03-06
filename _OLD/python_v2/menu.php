<?php
    $page_name = basename($_SERVER['PHP_SELF']);
    $i=1;
    // echo $_SESSION['lang']; // debug
?>
<ul class="nav col-13 col-md-auto mb-2 justify-content-center mb-md-0">
    <li>
        <a href="./page-01.php" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 1) echo "link-success";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 1) echo "./page-02.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 2) echo "link-success"; else echo "link-secondary";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 2) echo "./page-03.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 3) echo "link-success"; else echo "link-secondary";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 3) echo "./page-04.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 4) echo "link-success"; else echo "link-secondary";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 4) echo "./page-05.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 5) echo "link-success"; else echo "link-secondary";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 5) echo "./page-06.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 6) echo "link-success"; else echo "link-secondary";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 6) echo "./page-07.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 7) echo "link-success"; else echo "link-secondary";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 7) echo "./page-08.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 8) echo "link-success"; else echo "link-secondary";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
    <li>
        <a href="<?php if (intval($_SESSION['page_level_reached']) > 8) echo "./page-09.php"; else  echo "#";?>" class="nav-link px-2 <?php if (intval($_SESSION['page_level_reached']) > 9) echo "link-success"; else echo "link-secondary";?>">
        <?php echo $i; ?>. <?php echo $menu_entry[$i][$_SESSION['lang']]; ?>
        </a>
        <?php $i++; ?>
    </li>
</ul>