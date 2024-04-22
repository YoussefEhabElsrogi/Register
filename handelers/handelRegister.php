<?php

// search require VS include
// search require_once VS include_once
// search session and cookie
// foreach
// isset and unset in php 

require_once './../config/connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $errors = [];

  $name = htmlspecialchars(htmlentities(stripslashes(trim($_POST['name']))));
  $email = htmlspecialchars(htmlentities(stripslashes(trim($_POST['email']))));
  $password = htmlspecialchars(htmlentities(stripslashes(trim($_POST['password']))));

  // valid name
  if (empty($name)) {
    $errors[] = 'Name is required!';
  } elseif (strlen($name) < 3) {
    $errors[] = 'Name must be greater than 3 chars';
  } elseif (strlen($name) > 15) {
    $errors[] = 'Name must be smaller than 15 chars';
  }

  // valid email
  if (empty($email)) {
    $errors[] = 'Email is required';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'This is not email enter the valid email';
  }

  // valid password
  if (empty($password)) {
    $errors[] = 'Password is required';
  } elseif (strlen($password) < 8) {
    $errors[] = 'Password must be greater than 3 chars';
  } elseif (strlen($password) > 20) {
    $errors[] = 'Password must be smaller than 15 chars';
  }

  if (empty($errors)) {

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert = "INSERT INTO `users` (name,email,password) VALUES ('$name','$email','$hashPassword')";

    mysqli_query($conn, $insert);

    $_SESSION['success'] = 'Your data is registered';

    header("Location: ./../register.php");

    exit;

  } else {

    $_SESSION['errors'] = $errors;

    header("Location: ./../register.php");

    exit;

  }


} else {
  header("Location: ./../register.php");
  exit;
}


