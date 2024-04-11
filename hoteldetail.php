<?php
    // session_start();
    include_once('dbconnection.php');
    $sql="select * from users";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>all user</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css"> 
    
    <style>
        .text-color{
            text-shadow:5px 6px 5px yellow;
            color:red;
            text-transform: uppercase;
        } 
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once('navbar.php'); ?>
        <?php include_once('sidebar.php'); ?>
        <div class="content-wrapper bg-white">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-12">
                            <marquee behavior="alternate" direction="" class="text-color">
                            <h1 class="ml-4 text-color">All Hotel Details</h1>
                            </marquee>
                        </div>
                    </div>
                                    
                </div>
                <div class="container-fluid">
                <div class="row border">   
                    <div class="col-sm-12 col-md-12">
                    <div class="table-responsive pr-4 ">         
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hotel Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Address</th>
                                <th>curnt_date</th>
                                <th>Time</th>
                                <th>Edit</th>
                                <th>Show</th>
                                <th>Delete</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach($result as $row){
                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['address']?></td>
                                <td>
                                    <?php
                                        $datetime=$row['curnt_date'];
                                        $dateOnly = date('d-m-Y', strtotime($datetime));
                                        $timeOnly = date('H:i:s', strtotime($datetime));
                                        echo $dateOnly;
                                    ?>
                                </td>
                                <td><?php echo  $timeOnly ?></td>
                                <td><a href="#"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                                <td><a href="#"><i class="fa fa-eye" style="font-size:24px"></i></a></td>
                                <td><a href=""><i class='fas fa-trash-alt text-danger' style='font-size:24px'></i></a></td>
                            </tr>

                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<script>
    new DataTable('#example');
</script>
<?php
    include_once('footer.php');
?>
</body>
<?php
     include_once('jsheader.php');
?>

</html>