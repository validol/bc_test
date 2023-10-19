<?php
include "DB.php";

$db = new DB();

$products = $db->getProductsAll();

$pageTitle = 'Home';

include "includes/tpl_home.php";
?>
