<!-- <?php
    // session_start();
    // include_once('dbconnection.php');
    // if(isset($_POST['add'])){
    //     $product_name=$_POST['product_name'];
    //     $prise=$_POST['prise'];
    //     $data="insert into product1(product_name,prise)values('$product_name','$prise')";
    //     mysqli_query($conn,$data);
    //     $_SESSION['error']="Add User successfully";
    //     header('location:demo.php');
    //     exit();
    // }
    // $check=0;
    // $product_name="";
    // $prise="";
    // if(isset($_GET['id'])){
    //     $check=1;
    //     $id=$_GET['id'];
    //     $update="select * from product1 where id= '$id'";
    //     $run=mysqli_query($conn,$update);
    //     while($row = mysqli_fetch_assoc($run)){
    //         $product_name=$row['product_name'];
    //         $prise=$row['prise'];
    //     }
    // }
    // if(isset($_POST['update'])){
    //     $product_name=$_POST['product_name'];
    //     $prise=$_POST['prise'];
    //     $sql="update product1 set product_name='$product_name',prise='$prise' where id='$id'";
    //     $update=mysqli_query($conn,$sql);
    //     if($update){
    //     $_SESSION['error']="Update User successfully";
    //     header('location:demo.php');
    //     exit();
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Demo</title>
</head>
<body>
    <div class="container">
        <div class="heding">
            <h4>
                <?php
                    // if($check==0){
                    //     echo "Add user";
                    // }
                    // else{
                    //     echo "Update user";
                    // }
                ?>
            </h4>
        <?php
        // if(isset($_SESSION['error'])){
        //     echo $_SESSION['error'];
        //     unset($_SESSION['error']);
        // }
        ?>
        </div>
    <form method="POST">
        <label for="">User Product Name</label><br>
        <input type="text" name="product_name" value="<?php// echo $product_name; ?>"/><br>
        <label for="">Product Prise</label><br>
        <input type="text" name="prise" value="<?php //echo $prise; ?>" /><br>
        <?php
            // if($check==0){
            //     echo '<input type="submit" name="add" value="Add" class="btn bt-info bg-info mt-4">';
            // }
            // else{
            //     echo '<input type="submit" name="update" value="update" class="btn bt-info bg-info mt-4">';
            // }
        ?>
    </form>
<br><br>
    <table class="table border">
            <tr>
                    <th>id</th>
                    <th>Product_name</th>
                    <th>Prise</th>
                    <th>Action</th>
            </tr>
            <?php
                // $sql1="select * from product1";
                // $result=mysqli_query($conn,$sql1);
                // $i=1;
                // while($row=mysqli_fetch_assoc($result)){
            ?>
            <tbody>
                <tr>
                    <td><?php// echo $i++ ?></td>
                    <td><?php //echo $row['product_name'] ?></td>
                    <td><?php //echo $row['prise'] ?></td>
                    <td>
                        <a href="demo.php?id=<?php// echo $row['id'] ?>">Edit</a>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php //echo $row['id'] ?>"/>
                            <input type="submit" name="submit" value="Delete">
                        </form>
                       
                    </td>
                </tr>
            </tbody>
            <?php
               // }
            ?>
    </table>
    </div>
</body>
</html> -->