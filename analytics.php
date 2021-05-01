
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
                <div class="sidebar-item">
                    <a href="index.php">Dashboard</a>
                </div>
                <div class="sidebar-item">
                <a href="connect.php">Connect Account</a>
                </div>
                <div class="sidebar-current">
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
                <div class="title">Analytics</div>

                
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
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Interactions');
        var i;
        <?php 
         $currDate = date("Y-m-d");
        ?>
        for (i = 0; i < 30; i++)
        {
            <?php 
            
            $currDate = strtotime("-1 day", $currDate);
            
            ?>
            data.addRows([[<?php echo($currDate); ?>, 7]]);
        }
        
        
        
        

        // Set chart options
        var options = {'title':'Likes',
                       'width':500,
                       'height':300};

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