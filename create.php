<?php 

include('config.php');



session_start(); /* Starts the session */

if(isset($_POST['Submit'])&&!empty($_POST['Submit'])) {
  
  $usern = $_POST['Username'];

  $password = $_POST['Password'];
  $confirm = $_POST['Confirm'];
  $email = $_POST['Email'];
  $checkuser = "SELECT * FROM public.users WHERE username = '$usern';"; 
  $sameuserdata = pg_query($db_connection, $checkuser); 
  
  $usercount = pg_num_rows($sameuserdata);
  // Check password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 7) {
        
        $msg ="<span style='color:red'>Password should be at least 7 characters in length and should include at least one upper case letter, lower case letter, one number, and one special character.</span>";
    } else {
        
    if ($usercount == 0) {

        

  if ($confirm != $password)
  {
    $msg="<span style='color:red'>Passwords Must Match!</span>";
    $usern = "";
  $password = "";
  $confirm = "";
  $email = "";
  }
  else
  {
  $sql = "INSERT INTO public.users (username, password, email)
    VALUES ('".$usern."', '".sha1($password)."', '".$email."');";
  
  $sql2 = "INSERT INTO public.accounts (username, twitter, facebook, instagram, reddit)
    VALUES ('".$usern."', 'n/a', 'n/a', 'n/a', 'n/a');";
    pg_query($db_connection,$sql); 
    pg_query($db_connection,$sql2);
    header("location:index.php");
    exit;
       
  
}
} else {
    $msg="<span style='color:red'>Username Taken!</span>";
}
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
      <td colspan="2" align="left" valign="top"><h3>Create An Account</h3></td>
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