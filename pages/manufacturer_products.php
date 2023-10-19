<?php
if( !isAdmin() ) {
  redirect('/');
}

include 'DB.php';

$db = new DB();

if( isset($_GET['id']) ) {
  $manufacturerId = $_GET['id'];

  $products = $db->getManufacturersProducts( $manufacturerId );
}

header('Content-type: application/json');
echo json_encode($products);
