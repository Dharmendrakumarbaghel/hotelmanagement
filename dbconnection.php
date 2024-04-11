<?php
    $server="Localhost";
    $username="root";
    $password="";
    $dbname="demo";
    $conn=mysqli_connect($server,$username,$password,$dbname);
    if(!$conn){
        echo "connection field";
    }
?>