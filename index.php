<?php session_start(); /* Starts the session */
if(!isset($_SESSION['users']['username'])){

header("location:login.php");
exit;
}
else{
    $name = $_SESSION['users']['username'];
echo("Welcome, {$name}!");
}
?>

