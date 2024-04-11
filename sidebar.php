<?php 
    include_once "head.php" ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html{font-size:0.9rem;}
    </style>
</head>
<body>
    <aside class="main-sidebar bg-muted  sidebar-dark-primary elevation-4">
       
        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/Photo Dharmendra Kumar.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?php echo $_SESSION['name'];?></a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar bg-muted" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar bg-muted">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="hoteldetail.php" class="nav-link">
                    <i class="nav-icon fa fa-hotel"></i>
                    <p>View Hotel</p>  
                </a>
                </li>
                <li class="nav-item">
                <a href="allusertable.php" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p> View user </p> 
                </a>
                </li>
                <li class="nav-item">
                <a href="location_data.php" class="nav-link">
                    <i class="nav-icon fa fa-map-marker"></i>
                    <p> Add Location </p> 
                </a>
                </li>
                <li class="nav-item">
                <a href="roomtype_data.php" class="nav-link">
                    <i class="nav-icon fa fa-bed"></i>
                    <p> Room Type </p> 
                </a>
                </li>
                <li class="nav-item">
                <a href="proparty_data.php" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p> Property Type </p> 
                </a>
                </li>
                <!-- <li class="nav-item">
                <a href="manageroom.php" class="nav-link">
                    <i class="nav-icon fa fa-file"></i>
                    <p> Manageroom </p> 
                </a>
                </li> -->

                <li class="nav-item">
                <a href="manageroomdata.php" class="nav-link">
                    <i class="nav-icon fa fa-file"></i>
                    <p> Manageroom </p> 
                </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>      
</body>
</html>
