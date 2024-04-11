<?php
    include_once('dbconnection.php');
    if(isset($_POST['add'])){
        $location= $_POST['location'];
        $room_type= $_POST['room_type'];
        $propartytype= $_POST['propartytype'];
        $totalroom=$_POST['totalroom'];
        $price=$_POST['price'];
        $data="insert into manageroomdata (location_id,room_type_id,propartytype_id,toarlroom,price)values('$location','$room_type','$propartytype','$totalroom','$price')";
        $run=mysqli_query($conn,$data);
        print_r($run);
        $_SESSION['error']="Add Room successfully";
        header('location:manageroom.php');
        exit();
    }
    $check = 0;
    $room_type= "";
    $status="";
    if(isset($_GET['id'])){
        $check =1;
        $id=$_GET['id'];
        $update="select * from roomtype where id= '$id'";
        $run=mysqli_query($conn,$update);
        while($row = mysqli_fetch_assoc($run)){
            $room_type= $row['room_type'];
            $status=$row['status'];
        }
    }
    if(isset($_POST['update'])){
        $room_type= $_POST['room_type'];
        $status=$_POST['status'];

        $sql="update roomtype set room_type='$room_type',status='$status' where id='$id'";
        $update=mysqli_query($conn,$sql);
        if($update){
        $_SESSION['error']="Roomtype Update successfully";
        header('location:roomtype_data.php');
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
                        <!-- <div class="col-sm-2"></div> -->
                        <div class="col-sm-12 border">
                            <div class="">
                                <h1 class="text-center border my pt-2 text-color1">
                                <?php
                                    if($check==0){
                                        echo "Manage room Type ";
                                    }
                                    else{
                                        echo " update manage room type ";
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
                                <div class="row mb-3">
                                    <div class="col-sm-6 form-group">
                                        <label for="name">Add Location:</label>
                                        <select name="location" class="form-control">
                                                    <?php
                                                    // SQL query to fetch all data from the database
                                                    $sql = "SELECT * FROM location where status=1";
                                                    $result = mysqli_query($conn,$sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value='" . $row['id'] . "'>" . $row['addlocation'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>
                                                </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                    <label for="name">Add Room type:</label>
                                    <select name="room_type" class="form-control">
                                                    <?php
                                                    // SQL query to fetch all data from the database
                                                    $sql = "SELECT * FROM roomtype where status=1";
                                                    $result = mysqli_query($conn,$sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result))
                                                         {
                                                            echo "<option value='" . $row['id'] . "'>" . $row['room_type'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>
                                                </select>

                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-6 form-group">
                                        <label for="name">Add Proparty:</label>
                                        <select name="propartytype" class="form-control">
                                                    <?php
                                                    // SQL query to fetch all data from the database
                                                    $sql = "SELECT * FROM proparty where status=1";
                                                    $result = mysqli_query($conn,$sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value='" . $row['id'] . "'>" . $row['propartytype'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }

                                                    
                                                    ?>
                                                </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="name">Total Room:</label>
                                        <input type="number" name="totalroom" class="form-control">   
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 form-group">
                                        <label for="name">Price:</label>
                                        <input type="text" name="price" class="form-control"> 
                                    </div>
                                    <div class="col-sm-6 form-group mt-4">
                                        <!-- <input type="submit" name="submit" value="submit" class="form-control"> -->
                                    <?php
                                    if($check==0){
                                        echo '<input type="submit" name="add" value="Submit" class="btn bt-info bg-info mt-2 form-control">';
                                    }
                                    else{
                                        echo '<input type="submit" name="update" value="update" class="btn bt-info bg-info mt-2 form-control">';
                                    }
                                ?>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        </div>
                        <!-- <div class="col-sm-2"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>
</html>
