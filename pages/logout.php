<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION = [];
  session_destroy();
  setcookie('PHPSESSID', '', 100);

  redirect('/');
}