<?php
include("mysql.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$result = $connect->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

if($result->num_rows === 1){
    $_SESSION['username'] = $username;
    header('Location: forum.php');
}
else{
    header('Location: index.html');
}

