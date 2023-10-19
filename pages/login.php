<?php
include "DB.php";

$db = new DB();

$pageTitle = 'Login';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  $errors = [];
  
  $post_email = trim($_POST["email"]);
  $post_password = trim($_POST["password"]);

  if( strlen( $post_email ) === 0 ) {
    $errors['email'] = 'Email is required';
  } else {
    $email = $post_email;
  }
  
  if( strlen( $post_password ) === 0 ) {
    $errors['password'] = 'Password is required';
  } else {
    $password = $post_password;

    $user = $db->getUser($email);
    
    if(!$user) {
      $errors['user'] = 'User does not exist';
    }
    
    if( $user ) {
      if( !password_verify( $password, $user->password) ) {
        $errors['password'] = 'Password is incorrect';
      }
    }
  }
  
  if( empty($errors) ) {    
    if( $user ) {
      $_SESSION['user'] = [
        'name' => $user->name,
        'email' => $user->email,
        'role' => $user->role
      ];
    }
    // session_regenerate_id(true);

    redirect('/');
  }

}

include "includes/tpl_login.php";
