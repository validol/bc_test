<?php
if( !isAdmin() ){
  redirect('/');
}

include "DB.php";

$db = new DB();
$categories = $db->getCategoriesAll();
$manufacturers = $db->getManufacturersAll();

$pageTitle = 'Create';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  $errors = [];

  $post_title = trim($_POST['title']);
  $post_category = trim($_POST['category']);
  $post_category_new = trim($_POST['category_new']);
  $post_manufacturer = trim($_POST['manufacturer']);
  $post_manufacturer_new = trim($_POST['manufacturer_new']);
  $post_in_stock = trim($_POST['in_stock']);

  if( strlen($post_title) === 0 ) {
    $errors['title'] = 'Title is required';
  } else {
    $title = $post_title;
  }

  if( strlen($post_category) === 0 && strlen($post_category_new) === 0 ) {
    $errors['category'] = 'Category is required';
  } else {
    $category = $post_category;
  }

  if( strlen($post_manufacturer) === 0 && strlen($post_manufacturer_new) === 0 ) {
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
    
    if( strlen($post_category_new) !== 0  ) {
      $categoryId = $db->addCategory( $post_category_new );
    }
    
    if( strlen($post_manufacturer_new) !== 0  ) {
      $manufacturerId = $db->addManufacturer( $post_manufacturer_new );
    }
    
    if(strlen($post_category) === 0) {
      $db->addProduct($title, $categoryId, $manufacturerId, $in_stock);
    } else {
      $db->addProduct($title, $category, $manufacturer, $in_stock);
    }

    redirect('/dashboard');
  }
}

include "includes/tpl_product_crud.php";

