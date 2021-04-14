<?php 

include('config.php');



session_start(); /* Starts the session */

if(isset($_POST['Submit'])&&!empty($_POST['Submit'])){
  echo(" SUBMIT was set!");
  $usern = $_POST['Username'];
  $hashpassword = $_POST['Password'];
  $confirm = $_POST['Confirm'];
  if ($confirm != $hashpassword)
  {
    $msg="<span style='color:res'>Passwords Must Match!</span>";
  }
  else
  {
  $sql = "INSERT INTO public.users (username, password, email)
    VALUES ('".$usern."', '".sha1($hashpassword)."', '".$usern."');";
  
  
    pg_query($db_connection,$sql); 
  
    header("location:index.php");
    exit;
       
  
}
}
?>


<form action="" method="post" name="Create_Form">
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
      <td align="right">Email</td>
      <td><input name="Email" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Confirm Password</td>
      <td><input name="Confirm" type="password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Create Account" class="Button3"></td>
    </tr>
  </table>
</form>