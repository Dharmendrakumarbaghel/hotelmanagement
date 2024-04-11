<?php
    // session_start();
    include_once ('dbconnection.php');
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $gender=$_POST['gender'];
        if($email== '' && $name=='' && $phone==''){
            $_SESSION['error']="Please fill all fields";
            header('location:adduser.php');
            exit();
        }
        else{
            $data="insert into users(name,email,phone,dob,address,gender)values('$name','$email',$phone,'$dob','$address','$gender')";
            mysqli_query($conn,$data);
            $_SESSION['error']="Add User successfully";
            header('location:adduser.php');
            exit();
        }
    }
    else{

    }
?>