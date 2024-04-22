<?php

$hostName = 'localhost';
$userName = 'root';
$password = '';
$db = 'users';

$conn = mysqli_connect($hostName, $userName, $password, $db);

if (!$conn) {
  die('Connection Falid') . mysqli_connect_error();
}
