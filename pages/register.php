<?php
include "DB.php";

$db = new DB();

$pageTitle = 'Register';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  $errors = [];

  $post_user = trim($_POST['user']);
  $post_email = trim($_POST['email']);
  $post_password = trim($_POST['password']);

  if( strlen( $post_user ) === 0 ) {
    $errors['user'] = 'User is required';
  } else {
    $user = $post_user;
  }

  if( strlen( $post_email ) === 0 ) {
    $errors['email'] = 'Email is required';
  } else {
    $email = $post_email;
    if( $db->getUser($email) ) {
      $errors['exist'] = "User with {$email} already exists";
      // redirect('/login');
    }
  }

  if( strlen( $post_password ) === 0 ) {
    $errors['password'] = 'Password is required';
  } else {
    $password = $post_password;
  }

  if( empty($errors) ) {  
    $db->createUser($user, $email, password_hash($password, PASSWORD_BCRYPT), 'user');

    $_SESSION['user'] = [
      'name' => $user,
      'email' => $email,
      'role' => 'user'
    ];
    
    redirect('/');
  }

}

include "includes/tpl_register.php";
