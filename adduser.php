<?php
    include_once('dbconnection.php');
    if(isset($_POST['add'])){
        $name= $_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $state=$_POST['state'];
        $distric=$_POST['distric'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $check_in_date=$_POST['check_in_date'];
        $check_out_date=$_POST['check_out_date'];
        $roomtype=$_POST['roomtype'];
        $message=$_POST['message'];
        $password=$_POST['password'];
        $data="insert into users(name,email,phone,state,distric,gender,dob,address,check_in_date,check_out_date,roomtype,message,password)values('$name','$email',$phone,'$state','$distric','$gender','$dob','$address','$check_in_date','$check_out_date','$roomtype','$message','$password')";
        $run=mysqli_query($conn,$data);
        $_SESSION['error']="Add User successfully";
        header('location:adduser.php');
        exit();
    }
    $check = 0;
    $name= "";
    $email="";
    $phone="";
    $state="";
    $distric="";
    $gender="";
    $dob="";
    $address="";
    $check_in_date="";
    $check_out_date="";
    $roomtype="";
    $message="";
   
    if(isset($_GET['id'])){
        $check =1;
        $id=$_GET['id'];
        $update="select * from users where id= '$id'";
        $run=mysqli_query($conn,$update);
        while($row = mysqli_fetch_assoc($run)){
            $name= $row['name'];
            $email=$row['email'];
            $phone=$row['phone'];
            $state=$row['state'];
            $distric=$row['distric'];
            $gender=$row['gender'];
            $dob=$row['dob'];
            $address=$row['address'];
            $check_in_date=$row['check_in_date'];
            $check_out_date=$row['check_out_date'];
            $roomtype=$row['roomtype'];
            $message=$row['message'];
            $password=$row['password'];
        }
    }
    if(isset($_POST['update'])){
        $name= $_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $state=$_POST['state'];
        $distric=$_POST['distric'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $check_in_date=$_POST['check_in_date'];
        $check_out_date=$_POST['check_out_date'];
        $roomtype=$_POST['roomtype'];
        $message=$_POST['message'];
        $password=$_POST['password'];
        $sql="update users set name='$name',email='$email',phone='$phone',state='$state',distric='$distric',gender='$gender',dob='$dob',address='$address',check_in_date='$check_in_date',check_out_date='$check_out_date',roomtype='$roomtype',message='$message',password='$password' where id='$id'";
        $update=mysqli_query($conn,$sql);
        if($update){
        $_SESSION['error']="Update User successfully";
        header('location:allusertable.php');
        exit();
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <style>
        .my {
	        box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
            background-color:#63778a;
            height:50px;
        }
        .text-color1{
        /* text-shadow:5px 6px 5px ; */
        color:white;
        text-transform: uppercase;
    }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once('navbar.php')?>
        <?php include_once('sidebar.php'); ?>
        <div class="content-wrapper bg-white">
            <!-- Content header form -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mt-4 mb-2">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8 border">
                            <div class="">
                                <h1 class="text-center border my pt-2 text-color1">
                                <?php
                                    if($check==0){
                                        echo "New User add detals";
                                    }
                                    else{
                                        echo "User update  detals";
                                    }
                                ?>
                                </h1>
                                <h5 class="text-center mt-4 text-danger">
                                    <?php
                                        if(isset($_SESSION['error'])){
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                        }
                                    ?>
                                    </h5>
                            </div>
                        <div class="container">
                            <form method="POST">
                                <div class="form-group mt-4">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="<?php echo $name;?>" />
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="<?php echo $email; ?>" required>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" name="phone" value="<?php echo $phone; ?>" required>
                                    </div>
                                </div>
                                <?php
                                    if($check==0){
                                ?>
                                <div class="form-group">
                                    <label for="gender">State:</label>
                                    <select class="form-control" id="" name="state">
                                        <option value="">Select State</option>
                                        <option value="up">UP</option>
                                        <option value="uk">Uttra Khand</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <div class="form-group">
                                    <label for="gender">State:</label>
                                    <select class="form-control" id="" name="state">
                                        <option value="">Select State</option>
                                        <option value="up" <?php echo $state=='up'? 'selected':'' ?>>UP</option>
                                        <option value="uk" <?php echo $state=='uk'? 'selected':'' ?>>Uttra Khand</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <?php
                                    }
                                 ?>   
                                 <?php
                                    if($check==0){
                                 ?>
                                <div class="form-group">
                                    <label for="gender">Distric:</label>
                                    <select class="form-control" id="gender" name="distric" value="<?php echo $distric; ?>">
                                        <option value="">Select Distric</option>
                                        <option value="aligarh">Aligarh</option>
                                        <option value="noida">Noida</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <?php
                                }
                                else{
                                ?>
                                    <div class="form-group">
                                    <label for="gender">Distric:</label>
                                    <select class="form-control" id="gender" name="distric">
                                        <option value="">Select Distric</option>
                                        <option value="aligarh" <?php echo $distric=='aligarh'? 'selected':''?>>Aligarh</option>
                                        <option value="noida" <?php echo $distric=='noida'? 'selected':''?>>Noida</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <?php
                                }
                                ?>
                                <?php
                                    if($check==0){
                                ?>
                                <div class="form-group">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" id="gender" name="gender" value="<?php echo $gender; ?>">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <?php
                                }
                                else{
                                    ?>
                                    <div class="form-group">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" id="gender" name="gender" >
                                        <option value="">Select Gender</option>
                                        <option value="male" <?php echo $gender=='male'? 'selected':''?>>Male</option>
                                        <option value="female" <?php echo $gender=='female'? 'selected':''?>>Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="city">Address:</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter your address" name="address" value="<?php echo $address; ?>" />
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 form-group">
                                        <label for="checkInDate" class="form-label">Check-in Date</label>
                                        <input type="date" class="form-control" id="checkInDate" name="check_in_date"value="<?php echo $check_in_date; ?>" required>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="checkOutDate" class="form-label">Check-out Date</label>
                                        <input type="date" class="form-control" id="checkOutDate" name="check_out_date" value="<?php echo $check_out_date; ?>" required>
                                    </div>
                                </div>
                                <?php
                                     if($check==0){
                                ?>
                                <div class="form-group">
                                    <label for="roomType" class="form-label">Room Type</label>
                                    <select class="form-control" id="roomType" name="roomtype" required>
                                        <option value="">Select Room Type</option>
                                        <option value="single" >Single</option>
                                        <option value="double" >Double</option>
                                        <option value="suite" >Suite</option>
                                    </select>
                                </div>
                                <?php
                                }
                                else{
                                ?>
                                <div class="form-group">
                                    <label for="roomType" class="form-label">Room Type</label>
                                    <select class="form-control" id="roomType" name="roomtype" required>
                                        <option value="">Select Room Type</option>
                                        <option value="single"<?php echo $roomtype=='single'? 'selected':'' ?> >Single</option>
                                        <option value="double" <?php echo $roomtype=='double'? 'selected':'' ?>>Double</option>
                                        <option value="suite" <?php echo $roomtype=='suite'? 'selected':'' ?>>Suite</option>
                                    </select>
                                </div>
                                <?php
                                }
                                ?>

                                <!-- <div class="form-group">
                                    <label for="city">Any comments?</label>
                                    <textarea  type="text" class="form-control" id="city" placeholder="Enter your message" name="message" value="<?php echo $message; ?>"></textarea >
                                </div> -->
                                <div class="form-group">
                                    <label for="city">Password</label>
                                    <input type="password" class="form-control" id="city" placeholder="Enter your Password" name="password" value="<?php echo $password; ?>" />
                                </div>
                               <div class="form-group">
                                <?php
                                    if($check==0){
                                        echo '<input type="submit" name="add" value="Submit" class="btn bt-info bg-info mt-2">';
                                    }
                                    else{
                                        echo '<input type="submit" name="update" value="update" class="btn bt-info bg-info mt-2">';
                                    }
                                ?>
                               </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>


</html>
