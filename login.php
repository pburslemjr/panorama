<?php 

include('config.php');



session_start(); /* Starts the session */

if(isset($_POST['Submit'])&&!empty($_POST['Submit'])){
  echo(" SUBMIT was set!");
  $usern = $_POST['Username'];
  $hashpassword = $_POST['Password'];
  $sql ="SELECT * FROM public.users WHERE username = '".$usern."' AND password = '".md5($hashpassword)."';";
  echo(" Running command: $sql");
  $data = pg_query($db_connection,$sql); 
  $login_check = pg_num_rows($data);
  echo(" number of rows: $login_check");
  if($login_check != 1){ 
      
      echo "Login Successfully";  
      $msg="<span style='color:red'>Invalid Login Details</span>";  
  }else{
      
      echo "Invalid Details";
      $msg="<span style='color:red'>Invalid Login Details</span>";
  }
}
else
{
  echo(" SUBMIT was not set!");
}


 /*Check Login form submitted*//* if(isset($_POST['Submit'])) {
$username = isset($_POST['Username']) ? $_POST['Username'] : '';
$password = isset($_POST['Password']) ? $_POST['Password'] : '';

$query = $db_connection->prepare("select * from public.users where username= '".pg_escape_string($_POST['Username'])."' and password ='". );
$query->bindParam("username", $username, PDO::PARAM_STR);
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);
$num_rows = pg_num_rows($result);
if ($num_rows > 0)
{
  echo "Number of rows over 0";
} else {
  echo "Less than 1 rows";
}

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
}*/
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