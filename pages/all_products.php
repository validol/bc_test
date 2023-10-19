<?php
if( !isAdmin() ) {
  redirect('/');
}

include 'DB.php';

$db = new DB();

$products = $db->getProductsAll();

header('Content-type: application/json');
echo json_encode($products);