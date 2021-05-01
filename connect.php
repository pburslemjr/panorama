
<?php 
    session_start();
    include('config.php');
    $twitter_status = "Not connected";
    $name = $_SESSION['users']['username'];
    echo($name);
    $getusersql ="SELECT * FROM public.accounts WHERE username = '".$name."';";
    $data = pg_query($db_connection,$getusersql); 
    $login_check = pg_num_rows($data);
    
    if($login_check != 1){ 
        
      echo("Error");
      
    }
    else
    {
        $twitter_username = $data["twitter"];
        if ($twitter_username != "n/a")
        {
            $twitter_status = "Connected to account: " + $twitter_username;
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
            <div class="main-content">
                <br>
                <div class="title">Connect Account</div>
                <div class="card">
                    <img src="twitter_icon.jpg" alt="Twitter" style="width:100%">
                    <h1>Twitter</h1>
                    <p class="title">Status: <?php echo($twitter_status);?></p>
                    
                    <a href="#">Connect Now</a>
                    
                    
                </div>
            </div>
        </div>
    </body>
</html>