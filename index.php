<?php session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
echo("Oops no user data");
header("location:login.php");
exit;
}
?>

testing! login successful