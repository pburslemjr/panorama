<?php session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
echo("Oops no user data");
header("location:login.php");
exit;
}
else{
    $name = $_SESSION['users']['username'];
echo("Welcome, {$name}!");
}
?>

