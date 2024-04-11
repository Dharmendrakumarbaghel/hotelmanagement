<?php
    session_start();
    $server="localhost";
    $username="root";
    $password="";
    $dbname="hotelmanagement";
    $conn=mysqli_connect($server,$username,$password,$dbname);
    if(!$conn){
        echo "Connection field";
    }
?>