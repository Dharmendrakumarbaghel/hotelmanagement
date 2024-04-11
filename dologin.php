<?php
    //session_start();
    include_once('../phpcode/dbconnection.php');
    // Function to get the client's IP address
    function getIpAddress() {
    // Whether IP is from the remote address
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Whether IP is from a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Whether IP is from the remote address
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
    }
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        if($email==''){
            $_SESSION['error']="Please fill email";
            header('location:login.php');
            exit();
        }
        else{
            $sql="select * from users where email='$email'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==0){
                $_SESSION['error']="Pleas user note exsit";
                header('location:login.php');
                exit();
            }
            else{
                $row=mysqli_fetch_assoc($result);
                if($email===$row['email'] && $password===$row['password']){
                    $_SESSION['id']=$row['id'];
                    $_SESSION['name']=$row['name'];
                    $_SESSION['email']=$row['email'];
                    // Your login authentication logic goes here
                    // Assuming authentication is successful

                    // Get the IP address
                    $ipaddress = getIpAddress();

                    // Insert login information into the database
                    $sql1 = "INSERT INTO login (ipaddress) VALUES ('$ipaddress')";
      
                    $result1 = mysqli_query($conn, $sql1);
      
                    // header('location:index.php');
                    
                    header('location:../phpcode/index.php');


                }
                else{
                    $_SESSION['error']="Pleas user does not match email and password";
                    header('location:login.php');
                    exit();
                }
            }
        }
    }
    else{

    }
?>