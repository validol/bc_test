<?php

function d($val) {
  echo '<pre>';
  var_dump($val);
  echo '</pre>';
}

function dd($val) {
  d($val);
  die();
}

function isActive($url) {
  return $_SERVER["REQUEST_URI"] === $url;
}

function abort() {
  http_response_code(404);
  include 'includes/tpl_404.php';
}

function redirect($path) {
  header("location: {$path}");
  exit();
}

function authorize($authorized) {
  if( !$authorized ) {
    abort();
  }
}

function isAdmin() {
  if( !isset($_SESSION['user']) ) {
    return;
  }
  return $_SESSION['user']['role'] === 'admin';
}

function isValidEmail($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}