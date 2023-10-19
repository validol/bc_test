<?php
if( !isAdmin() ) {
  redirect('/');
}

include "DB.php";

$db = new DB();
$product = $db->getProduct($_GET['id']);
$categories = $db->getCategoriesAll();
$manufacturers = $db->getManufacturersAll();

$pageTitle = 'Edit';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  $errors = [];

  $post_title = trim($_POST['title']);
  $post_category = trim($_POST['category']);
  $post_manufacturer = trim($_POST['manufacturer']);
  $post_in_stock = trim($_POST['in_stock']);

  if( strlen($post_title) === 0 ) {
    $errors['title'] = 'Title is required';
  } else {
    $title = $post_title;
  }

  if( strlen($post_category) === 0 ) {
    $errors['category'] = 'Category is required';
  } else {
    $category = $post_category;
  }

  if( strlen($post_manufacturer) === 0 ) {
    $errors['manufacturer'] = 'Manufacturer is required';
  } else {
    $manufacturer = $post_manufacturer;
  }

  if( strlen($post_in_stock) === 0 ) {
    $errors['in_stock'] = 'Stock value is required';
  } else {
    if( $post_in_stock === "in") {
      $in_stock = "1";
    } else {
      $in_stock = "0";
    }
  }

  if( empty($errors) ) {
    $db->updateProduct($product->id, [
      'title' => $title, 
      'category' => $category, 
      'manufacturer' => $manufacturer, 
      'in_stock' => $in_stock
    ]);

    redirect('/dashboard');
  }
}

include "includes/tpl_product_crud.php";

