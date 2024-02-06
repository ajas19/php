<?php

include ('connection.php');


$id = $_GET['id'];

$qury = "delete from student where id = $id";

if(mysqli_query($db,$qury))
{
    header("location:user.php? msg=Recored delete sucessfully ");
}else
{

    
    header('location:user.php');
}


?>