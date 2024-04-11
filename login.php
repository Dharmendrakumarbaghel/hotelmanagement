<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Login</title>
    <style>
      
      .text-color{
        text-shadow:5px 6px 5px yellow;
        color:red;
        text-transform: uppercase;
    }
    .text-color1{
        text-shadow:5px 6px 5px yellow;
        color:red;
        /* text-transform: uppercase; */
    }
    .btn-back-color{
        background-image: linear-gradient(red, yellow);
    }
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    </style>

</head>
<?php
    include_once('header.php');
    include_once('head.php');
?>

<body>
    <?php
        include_once('silde.php');
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card  mb-2" style="border-radius: 20px; border: 1px solid blue;">
                    <section class="vh-100">
                        <div class="container py-5 h-100">
                            <div class="row d-flex align-items-center justify-content-center h-100">
                                <div class="col-md-8 col-lg-5 col-xl-5">
                                    <img src="img\draw2.svg" class="img-fluid" alt="Phone image">
                                </div>
                                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                                    <form action="dologin.php" method="POST">
                                      <div class="text-danger text-center">
                                        <?php
                                          if(isset($_SESSION['error'])){
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                          }
                                        ?>
                                      </div>
                                       <label for="">Email</label>  
                                        <div class="input-group mb-4">
                                            <span class="input-group-text bg-primary">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="email" id="form1Example13" name="email"class="form-control" placeholder="please enter your email" />
                                        </div>
                                        Password 
                                        <div class="input-group mb-4">
                                            <span class="input-group-text bg-primary">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" id="form1Example13" name="password"class="form-control " placeholder="please enter your password" />
                                        </div>
                                        <div class="d-flex justify-content-around align-items-center mb-4">
                                            Checkbox
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""id="form1Example3" checked />
                                                <label class="form-check-label" for="form1Example3"> Remember me
                                                </label>
                                            </div>
                                            <a href="#!">Forgot password?</a>
                                        </div>
                                        Submit button
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                                </form>
                                </div>
                            </div>
                        </div>
                  </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>