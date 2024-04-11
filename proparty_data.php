<?php
    include_once('dbconnection.php');
    $sql="select * from proparty";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>location user</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css"> 
    <style>
        .text-color{
            /* text-shadow:5px 6px 5px yellow;
            color:red; */
            /* font-size:10px; */
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
                        <div class="col-sm-12 col-md-9 bg-warning">
                        <h4 class="ml-4 text-white pt-2"><i class="fas fa-building"></i>&nbsp Add Your Proparty Type</h4>
                        </div>
                        <div class="col-sm-12 col-md-3 bg-warning  text-center">
                            <a href="propartytype.php "><span class="mt-1 text-white btn btn-outline-danger fs-5 "> <i class="fas fa-building"></i> Add Proparty </span></a> 
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
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                        </div>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Proparty Type</th>
                                <th>Status</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach($result as $row){
                            ?>
                            <tr>   
                                <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['propartytype'] ?></td>
                                <td><?php
                                        if($row['status']==0){
                                            ?>
                                            <i class="fa fa-toggle-on text-danger"style="font-size:20px"<?php echo $row['status']; ?>>inactive</i>
                                        <?php
                                        }else{
                                            ?>
                                            <i class="fa fa-toggle-on text-success"style="font-size:20px"<?php echo $row['status']; ?>>active</i>
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="propartytype.php?id=<?php echo $row['id']?>"><i class="fa fa-edit" style="font-size:20px"></i></a>&nbsp &nbsp
                                    <a href="proparty_delete.php?id=<?php echo $row['id']?>" onclick="return confirm('!! Do you really want to delete recored ');"><i class='fas fa-trash-alt text-danger' style="font-size:20px"></i></a>
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
// }
// else{
//     header('location:../frantcode/login.php');
// }
?>