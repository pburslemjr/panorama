<?php session_start(); /* Starts the session */
if(!isset($_SESSION['users']['username'])){

header("location:login.php");
exit;
}
else{
    $name = $_SESSION['users']['username'];
    include('config.php');
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
        echo($twitter_username);
        $facebook_username = $userinfo["facebook"];
        $reddit_username = $userinfo["reddit"];
        
        if ($twitter_username != "n/a")
        {
            $_SESSION['users']['twitter'] = $twitter_username;
        }
        if ($facebook_username != "n/a")
        {
            $facebook_status = "Connected to account: $facebook_username";
        }
        if ($reddit_username != "n/a")
        {
            $_SESSION['users']['reddit'] = $reddit_username;
        }
    }

   
    if(!isset($_SESSION['users']['twitter']))
    {
        $twitterlikes = "Account not connected!";

    }
    else
    {
        $twitter = $_SESSION['users']['twitter'];
        echo($twitter);
        $twitterlikes = shell_exec('python twitterlikes.py ' . escapeshellarg($twitter));
        echo($twitterlikes);
        $twitterretweets = shell_exec('python twitterretweets.py ' . escapeshellarg($twitter));
    }
    
    if(!isset($_SESSION['users']['reddit']))
    {
        $redditkarma = "Account not connected!";

    }
    else
    {
        $reddit = $_SESSION['users']['reddit'];
        echo($reddit);
        $redditkarma = shell_exec('python reddit_total_karma.py ' . escapeshellarg($reddit));
        echo($redditkarma);
        $redditratio = shell_exec('python reddit_upvote_ratio.py ' . escapeshellarg($reddit));
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
                <a href="index.php">
                    <div class="sidebar-item">  
                        Dashboard
                    </div>
                </a>
                <a href="connect.php">
                    <div class="sidebar-item">
                        Connect Account
                    </div>
                </a>
                <a href="analytics.php">
                    <div class="sidebar-item">
                        Analytics
                    </div>
                </a>
                <a href="settings.php">
                    <div class="sidebar-item">
                        Settings
                    </div>
                </a>
                <div class="sidebar-info">
                    Panorama v1.0.0 <br>
                    <a href="about:blank">About</a><br>
                    <a href="https://panorama-csce315.herokuapp.com/logout.php">Log Out</a>
                </div>
            </div> 
            <div class="main-content">
                <div class="title" id="dashboardTitle"> <?php echo("Welcome, {$name}!"); ?> </div>
                <hr>
                <table class="dashboard-button-table">
                    <tr>
                        <th>
                            <div class="card">
                                <h4><b>Tweet Statistics (Past 10 posts)</b></h4>
                                <img src="tSquare.png" alt="Avatar" style="width:100%">
                                <div class="container">
                                    <p>Likes:</p>
                                    <h1><?php echo($twitterlikes); ?></h1>
                                    <br>
                                    <p>Retweets:</p>
                                    <h1><?php echo($twitterretweets); ?></h1>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="card">
                                <h4><b>Reddit Statistics</b></h4>
                                <img src="reddit_icon.jpg" alt="Avatar" style="width:100%">
                                <div class="container">
                                    <p>Karma:</p>
                                    <h1><?php echo($redditkarma); ?></h1>
                                    <br>
                                    <p>Account Upvote Ratio:</p>
                                    <h1><?php echo($redditratio); ?>%</h1>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <!-- <tr class="dashboard-button-label">
                        <td>
                            Link 1
                        </td>
                        <td>
                            Link 2
                        </td>
                        <td>
                            <p id="testAPI"></p>
                        </td>
                    </tr> -->
                </table>
            </div>
        </div>
    </body>
</html>

