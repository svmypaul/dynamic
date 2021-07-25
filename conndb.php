<?php
        error_reporting(0);

        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "dotcode");
        
        // Check connection
        if($conn === false){
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }
        else{
            echo "";
        }
        ?>