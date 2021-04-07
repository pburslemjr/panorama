

<?php

    echo 'Connection test : ';
    
    $connection = pg_connect("host=csce-315-db.engr.tamu.edu dbname=db_group4_project3 user=paul_b_tamu password=227007259");
    if($connection) {
       echo 'connected';
    } else {
        echo 'there has been an error connecting';
    } 
?>
