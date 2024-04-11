<?php
    include_once('dbconnection.php');
    if(isset($_POST['add'])){
        $addlocation= $_POST['addlocation'];
        $status=$_POST['status'];
        $data="insert into location (addlocation,status)values('$addlocation','$status')";
        $run=mysqli_query($conn,$data);
        $_SESSION['error']="Add location successfully";
        header('location:location_data.php');
        exit();
    }
    $check = 0;
    $addlocation= "";
    $status="";
    if(isset($_GET['id'])){
        $check =1;
        $id=$_GET['id'];
        $update="select * from location where id= '$id'";
        $run=mysqli_query($conn,$update);
        while($row = mysqli_fetch_assoc($run)){
            $addlocation= $row['addlocation'];
            $status=$row['status'];
        }
    }
    if(isset($_POST['update'])){
        $addlocation= $_POST['addlocation'];
        $status=$_POST['status'];

        $sql="update location set addlocation='$addlocation',status='$status' where id='$id'";
        $update=mysqli_query($conn,$sql);
        if($update){
        $_SESSION['error']="Update User successfully";
        header('location:location_data.php');
        exit();
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Add Location</title>
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
                                        echo "New User add location";
                                    }
                                    else{
                                        echo "User update location";
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
                                    <label for="name">Addlication:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your location" name="addlocation" value="<?php echo $addlocation;?>" />
                                </div>
                                <?php
                                    if($check==0){
                                ?>
                                <div class="form-group mt-4">
                                    <label for="name">Status:</label>
                                    <select class="form-control" id="" name="status">
                                        <option value="">Select status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Unactive</option>
                                    </select>
                                </div>
                                <?php
                                    }
                                    else{
                                        ?>
                                        <div class="form-group">
                                        <label for="name">Status:</label>
                                    <select class="form-control" id="" name="status">
                                        <option value="">Select status</option>
                                        <option value="1"<?php echo $status=='1'? 'selected':'' ?>>Active</option>
                                        <option value="0"<?php echo $status=='0'? 'selected':'' ?>>Unactive</option>
                                    </select>
                                </div>
                                <?php
                                    }
                                 ?>   
                                <!-- <?php
                                   // if($check==0){
                                    ?>
                                        <input type="hidden" name="status" value="0" class="form-control">
                                    <?php
                                   // }
                                   // else{
                                        ?>
                                        <div class="form-group mt-4">
                                            <label for="name">Status:</label>
                                            
                                            <input type="text" class="form-control" id="name" placeholder="Enter your status" name="status" value="<?php echo $status;?>" />
                                        </div>
                                        <?php
                                   // }
                                    ?> -->
                            
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
