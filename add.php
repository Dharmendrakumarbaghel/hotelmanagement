<?php
    session_start();
    include_once('dbconnection.php');
    if(isset($_POST['add'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $data="insert into users (name,email,phone,address)values('$name','$email',$phone,'$address')";
        mysqli_query($conn,$data);
        $_SESSION['error']="ADD user Successfully";
        header('location:add.php');
        exit();
    }
    $check=0;
    $name="";
    $email="";
    $phone="";
    $address="";
    if(isset($_GET['id'])){
        $check=1;
        $id=$_GET['id'];
        $update="select * from users where id='$id'";
        $run=mysqli_query($conn,$update);
        while($row=mysqli_fetch_assoc($run)){
            $name=$row['name'];
            $email=$row['email'];
            $phone=$row['phone'];
            $address=$row['address'];
        }
    }
    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $sql="update users set name='$name',email='$email',phone='$phone',address='$address' where id='$id'";
        $update=mysqli_query($conn,$sql);
        if($update){
            $_SESSION['error']="user update Successfully";
        header('location:add.php');
        exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3>
            <?php
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
            ?>
        </h3>
        <form method="POST">
            <label for="">Name</label><br>
            <input type="text" name="name" value="<?php echo $name ?>"><br>
            <label for="">Email</label><br>
            <input type="text" name="email" value="<?php echo $email ?>"><br>
            <label for="">Phone</label><br>
            <input type="text" name="phone" value="<?php echo $phone ?>"><br>
            <label for="">Address</label><br>
            <input type="text" name="address" value="<?php echo $address ?>"><br>
            <?php
                if($check==0){
                    echo '<input type="submit" name="add" value="Registration" class="btn bt-info bg-info mt-2" />';
                }
                else{
                    echo '<input type="submit" name="update" value="update" class="btn bt-info bg-info mt-2">';
                }
            ?>
        </form>
        <br><br>
        <table class="table border">
            <tr>
                <th>ID</th>
                <th>Nmae</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
                $i=1;
                $sql="select * from users";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){    
            ?>
            <tbody>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['phone']?></td>
                        <td><?php echo $row['address']?></td>
                        <td><a href="add.php?id=<?php echo $row['id'] ?>">edit</a></td>
                    </tr>
            </tbody>
            <?php
                }
                ?>
        </table>
    </div>
</body>
</html>