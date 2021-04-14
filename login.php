<?php 

include('config.php');



session_start(); /* Starts the session */

 /*Check Login form submitted*/ if(isset($_POST['Submit'])){
$username = isset($_POST['Username']) ? $_POST['Username'] : '';
$password = isset($_POST['Password']) ? $_POST['Password'] : '';

$query = $db_connection->prepare("SELECT * FROM users WHERE username=:Username");
$query->bindParam("username", $username, PDO::PARAM_STR);
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);

if (!$result) {
	$msg="<span style='color:red'>Invalid Login Details</span>";
} else {
if (password_verify($password, $result['password'])) {
$_SESSION['users']['username']=$logins[$username];
header("location:index.php");
exit;
} else {
$msg="<span style='color:red'>Invalid Login Details</span>";
}
}

?>
<form action="" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
  </table>
</form>