<?php

    $hostnmae="localhost";
    $username="root";
    $password="";
    $dbname="test";


    $db = mysqli_connect($hostnmae,$username,$password,$dbname);

    if($db)
    {
        echo "connection established";
    }else
    {
        echo "connection error".mysqli_error($db);
    }


?>