<?php session_start(); /* Starts the session */
if(!isset($_SESSION['users']['username'])){

header("location:login.php");
exit;
}
else{
   
    $name = $_SESSION['users']['username'];
    echo("Welcome, {$name}!");
    include 'index.html';

}
?>

<form action="https://panorama-csce315.herokuapp.com/logout.php">
    <input type="submit" value="Log Out" />
</form>

