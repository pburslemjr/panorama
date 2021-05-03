<?php session_start(); /* Starts the session */
if(!isset($_SESSION['users']['username'])){

header("location:login.php");
exit;
}
else{
   
    $name = $_SESSION['users']['username'];
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
                            <img src="PlaceholderIcon.png" class="dashboard-button">
                        </th>
                        <th>
                            <img src="PlaceholderIcon.png" class="dashboard-button">
                        </th>
                    </tr>
                    <tr class="dashboard-button-label">
                        <td>
                            Link 1
                        </td>
                        <td>
                            Link 2
                        </td>
                        <td>
                            <p id="testAPI"></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>

