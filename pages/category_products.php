<?php
if( !isAdmin() ) {
  redirect('/');
}

include 'DB.php';

$db = new DB();

if( isset($_GET['id']) ) {
  $categoryId = $_GET['id'];

  $products = $db->getCategoryProducts( $categoryId );
}

header('Content-type: application/json');
echo json_encode($products);
