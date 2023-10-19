<?php

$urlPath = parse_url($_SERVER['REQUEST_URI'])['path'];

switch ($urlPath) {
  case '':
  case '/':
    include 'pages/home.php';
    break;

  case '/login':
    include 'pages/login.php';
    break;
  
  case '/logout':
    include 'pages/logout.php';
    break;

  case '/register':
    include 'pages/register.php';
    break;

  case '/product':
    include 'pages/product_show.php';
    break;
  
  case '/dashboard':
    include 'pages/dashboard.php';
    break;

 case '/product/create':
    include 'pages/product_create.php';
    break;
  
  case '/product/edit':
    include 'pages/product_edit.php';
    break;
    
  case '/category_products':
    include 'pages/category_products.php';
    break;

  case '/manufacturer_products':
    include 'pages/manufacturer_products.php';
    break;
  
  case '/products_all':
    include 'pages/all_products.php';
    break;
  
  default:
    abort(404);
    break;
}