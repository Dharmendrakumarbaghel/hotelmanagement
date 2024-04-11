<?php
    include_once('dbconnection.php');
    if(isset($_SESSION['id']) && isset($_SESSION['email'])){
    $sql="select * from manageroomdata ";
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
            /* text-shadow:5px 6px 5px yellow;
            color:red; */
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
                        <div class="col-sm-12 col-md-9 bg-primary">
                        <h4 class="ml-4 text-color pt-2"><i class="fas fa-user"></i>&nbsp ManageRoom</h4>
                        </div>
                        <div class="col-sm-12 col-md-3 bg-primary  text-center">
                            <a href="manageroom.php"><span class="mt-1 text-white btn btn-outline-info fs-5"> <i class="fa fa-user-plus "></i> manageroom </span></a> 
                        </div>
                    </div>        
                </div>
                <div class="container-fluid">
                <div class="row border">   
                    <div class="col-sm-12 col-md-12">
                    <div class="table-responsive">         
                    <table id="example" class="display" style="width:100%">
                    <div class="heading text-center h4 text-danger">
                        <?php
                            if(isset($_SESSION['error'])){
                                //echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }

                        ?>
                        </div>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Location_id</th>
                                <th>Room_tupe_id</th>
                                <th>propartytype_id</th>
                                <th>Totalroom</th>
                                <th>Price</th>
                                <th>CruntData</th>
                                <th>Time</th>
                                <th colspans="3" class="text-center">Action Style</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach($result as $row){
                        
                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td>
                                    <?php 
                                        $sql1="select * FROM location INNER JOIN manageroomdata on location.id=manageroomdata.id";
                                        $result1=mysqli_query($conn,$sql1);
                                        $join=mysqli_fetch_assoc($result1);
                                        foreach($result1 as $join){
                                            // print_r($join);
                                            echo $join['addlocation'];
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $sql1="select * FROM roomtype INNER JOIN manageroomdata on roomtype.id=manageroomdata.id ";
                                        $result1=mysqli_query($conn,$sql1);
                                        $join=mysqli_fetch_assoc($result1);
                                        foreach($result1 as $join){
                                            echo $join['room_type'];
                                        }
                                    ?>
                                </td>
                                <td><?php echo $row['propartytype_id'] ?></td>
                                <td><?php echo $row['toarlroom']?></td>
                                <td><?php echo $row['price']?></td>
                                <td>
                                    <?php
                                        $datetime=$row['cratedate'];
                                        $dateOnly = date('d-m-Y', strtotime($datetime));
                                        $timeOnly = date('H:i:s', strtotime($datetime));
                                        echo $dateOnly;
                                    ?>
                                </td>
                                <td><?php echo  $timeOnly ?></td>
                                <td>
                                    <a href="manageroom.php?id=<?php echo $row['id']?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                                    <a href="manageroom.php?id=<?php echo $row['id']?>"><i class="fa fa-eye text-info" style="font-size:20px"></i></a>
                                    <a href="delete.php?id=<?php echo $row['id']?>"><i class='fas fa-trash-alt text-danger' style="font-size:20px"></i></a>
                                </td>
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
<?php
}
else{
    header('location:../frantcode/login.php');
}
?>
