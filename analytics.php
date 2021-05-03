<?php 
    session_start();
    include('config.php');
    
    $name = $_SESSION['users']['username'];
    $twitter_handle = $_SESSION['users']['twitter'];
    $sentiment = shell_exec('python sentiment.py' . escapeshellarg($twitter_handle));
?>
<html>
    <head>
        <title>Panorama Template</title>
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
                <br>
                <div class="title">Twitter Sentiment: <?php echo($sentiment) ?></div>

                
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        
        data.addColumn('number', 'Interactions');
        data.addColumn('number', 'Date');
        
        <?php 
           $data = array(
               array(0,rand(1,30)),
               array(1,rand(1,30)),
               array(2,rand(1,30)),
               array(3,rand(1,30)),
               array(4,rand(1,30)),
               array(5,rand(1,30)),
               array(6,rand(1,30)),
               array(7,rand(1,30)),
               array(8,rand(1,30)),
               array(9,rand(1,30)));
               
            
            
        ?>
        data.addRows(<?php echo(json_encode($data)); ?>);
        
        
        
        

        // Set chart options
        var options = {'title':'Likes',
                       'width':500,
                       'height':300,
                       hAxis : {
                           gridlines : {color: '#333', minSpacing: 2}
                       }
                       };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        
        chart.draw(data, options);
      }
    </script>
 

 
    <!--Div that will hold the pie chart-->
            <div id="chart_div"></div>


            </div>
        </div>
    </body>
</html>
