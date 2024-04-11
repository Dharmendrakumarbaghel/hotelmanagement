<?php
    include_once('dbconnection.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="delete from proparty where id=$id";
        mysqli_query($conn,$sql);
        // $_SESSION['error']="User delete successfully";
        header('location:proparty_data.php');
        exit();
    }
?>