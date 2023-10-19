<?php
include "DB.php";

$pageTitle = 'Product';

$db = new DB();

if( isset($_GET['id']) ) {
  
  if( $db->getProduct( $_GET['id'] ) ) {
    $product = $db->getProduct( $_GET['id'] );
  }
}

include __DIR__. "/../includes/tpl_product_show.php";
?>