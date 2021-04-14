

<?php

    echo 'Connection test : ';
    
    $db_connection = pg_connect("host=ec2-34-225-167-77.compute-1.amazonaws.com port=5432 dbname=dc5as68u5c46ha user=lsezjsbyacoqyu password=e055db75ec95efeb00466767cf176070767ab7d0683d5c4817cffc71f20dd85b connect_timeout=5");
    if($db_connection) {
       echo 'connected';
       
    } else {
        echo 'there has been an error connecting';
    } 
?>
