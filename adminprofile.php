<?php
    include_once('dbconnection.php');
    if(isset($_SESSION['id']) && isset($_SESSION['email'])){
    $sql = " select * from users where email ='".$_SESSION['email']."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
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
            height:40px;
        }
        .text-color1{
        /* text-shadow:5px 6px 5px yellow; */
        color:white;
        /* text-transform: uppercase; */
    }
    table, th, td {
     border: 1px solid black;
     font-size:15px;
     text-align:center;
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
                    <div class="">
                        <h5 class="text-center border my  text-color1 pt-2 ">
                            <span><?php echo $_SESSION['name']; ?></span> &nbsp &nbsp
                            <span><?php echo $_SESSION['email'];?></span>
                        </h5>        
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10 mt-4">
                            <div class="container border table-responsive">
                            <div class="heading bg-info mt-2">
                                <h4 class="pt-2 pb-2">Saurya Hotel</h4>
                            </div>
                            <table class="table mt-4">
                                <tr>
                                    <th>User Name</th>
                                    <td colspan="3" class="text-center "><?php echo $row['name']?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td class="text-center"><?php echo $row['email']?></td>
                                    <th>Phone No</th>
                                    <td class="text-center"><?php echo $row['phone']?></td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td class="text-center"><?php echo $row['state']?></td>
                                    <th>Distric</th>
                                    <td class="text-center"><?php echo $row['distric']?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td class="text-center"><?php echo $row['gender']?></td>
                                    <th>Date of Birth</th>
                                    <td class="text-center"><?php echo $row['dob']?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td class="text-center"><?php echo $row['address']?></td>
                                    <th>Room Type</th>
                                    <td class="text-center"><?php echo $row['roomtype']?></td>
                                </tr>
                                <tr>
                                    <th>Check_in_date</th>
                                    <td class="text-center"><?php echo $row['check_in_date']?></td>
                                    <th>Check_out_date</th>
                                    <td class="text-center"><?php echo $row['check_out_date']?></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>

</html>
<?php
}
else{
    header('location:../frantcode/login.php');
}
?>