<?php
if( !isAdmin() ){
  redirect('/');
}

include "DB.php";

$pageTitle = 'Dashboard';

$db = new DB();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $products = $db->deleteProduct($id);
  redirect('/dashboard');
} else {
  $products = $db->getProductsAll();
  $users = $db->getUsersAll();
  $categories = $db->getCategoriesAll();
  $manufacturers = $db->getManufacturersAll();
}


include "includes/tpl_dashboard.php";
?>