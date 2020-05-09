<?php
echo '<a class =' . (($page == "Home") ? "'active' " : "'' ") . 'href="index.php?page=Home"> Home </a>';
echo '<a class =' . (($page == "SolarSystem") ? "'active' " : "'' ") . 'href="index.php?page=SolarSystem"> System </a>';
echo '<a class =' . (($page == "Galaxy") ? "'active' " : "'' ") . 'href="index.php?page=Galaxy"> Galaxy </a>';
echo '<a class =' . (($page == "News") ? "'active' " : "'' ") . 'href="index.php?page=News"> News </a>';
echo '<a class =' . (($page == "Survey") ? "'active' " : "'' ") . 'href="index.php?page=Survey"> Survey </a>';
?>