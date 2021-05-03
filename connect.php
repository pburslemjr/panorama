
<?php 
    session_start();
    include('config.php');
    if(isset($_POST['tsubmit'])&&!empty($_POST['tsubmit'])){
        
        $twitteruser = $_POST['tuname'];
        $sql = "INSERT INTO public.accounts (username, twitter)
    VALUES ('".$usern."', '".$twitteruser."');";
    echo($sql);
    pg_query($db_connection,$sql); 
    }
    $twitter_status = "Not connected";
    $facebook_status = "Not connected";
    $reddit_status = "Not connected";
    $name = $_SESSION['users']['username'];
    
    $getusersql ="SELECT * FROM public.accounts WHERE username = '".$name."';";
    
    $data = pg_query($db_connection,$getusersql); 
    $userinfo = pg_fetch_assoc($data);
    $login_check = pg_num_rows($data);
    
    
    if($login_check != 1){ 
        
      echo("Error");
      
    }
    else
    {
        $twitter_username = $userinfo["twitter"];
        $facebook_username = $userinfo["facebook"];
        $reddit_username = $userinfo["reddit"];
        
        if ($twitter_username != "n/a")
        {
            $twitter_status = "Connected to account: $twitter_username";
        }
        if ($facebook_username != "n/a")
        {
            $facebook_status = "Connected to account: $facebook_username";
        }
        if ($reddit_username != "n/a")
        {
            $reddit_status = "Connected to account: $reddit_username";
        }
    }
?>
<html>
    <head>
        <title>Panorama</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="main-body">
            <div class="sidebar">
                <div class="sidebar-logo">
                    <img src="LogoBanner.png" width=100%>
                </div>
                <div class="sidebar-item">
                    <a href="index.php">Dashboard</a>
                </div>
                <div class="sidebar-current">
                <a href="connect.php">Connect Account</a>
                </div>
                <div class="sidebar-item">
                    <a href="analytics.php">Analytics</a>
                </div>
                <div class="sidebar-item">
                    <a href="account.php">Account</a>
                </div>
                <div class="sidebar-item">
                    <a href="settings.php">Settings</a>
                </div>
                <div class="sidebar-info">
                    Panorama v1.0.0 <br>
                    <a href="about:blank">About</a><br>
                    <a href="https://panorama-csce315.herokuapp.com/logout.php">Log Out</a>
                </div>
            </div> 
            <div class="main-content" style="text-align:center">
                <br>
                <div class="title">Connect Account</div>
                <form action="https://panorama-csce315.herokuapp.com/connect.php" method="post">
                    <div class="card">
                        <img src="tSquare.png" alt="Twitter" style="width:100%">
                        <h1>Twitter</h1>
                        <p class="title">Status: <?php echo($twitter_status);?></p>
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Twitter Username" name="tuname" required>
                        <button type="submit" name="tsubmit">Connect</button>                  
                        
                    </div>
                </form>
                <div class="card">
                    <img src="fSquare.png" alt="Facebook" style="width:100%">
                    <h1>Facebook</h1>
                    <p class="title">Status: <?php echo($facebook_status);?></p>
                    
                    <a href="#">Connect Now</a>                   
                    
                </div>
                <div class="card">
                    <img src="reddit_icon.jpg" alt="Reddit" style="width:100%">
                    <h1>Reddit</h1>
                    <p class="title">Status: <?php echo($reddit_status);?></p>
                    
                    <a href="#">Connect Now</a>                   
                    
                </div>
                
            </div>
        </div>
    </body>
</html>
