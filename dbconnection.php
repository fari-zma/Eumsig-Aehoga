<?php

    $server     =   "localhost";
    $username   =   "root";
    $password   =   "";
    $database   =   "eumsig_aehoga";

    try {
        $connection = mysqli_connect($server, $username, $password, $database);
        
        if($connection){
//            echo "Database connection was successfull.";
            echo "<br><br>";
        }
    }
    catch(Exception $errormsg) {
        echo $errormsg->getMessage()."<br>";
    }

?> 