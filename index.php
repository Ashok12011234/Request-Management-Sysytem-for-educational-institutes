<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="signUpPage.css" />
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: rgba(0,0,0,0.1);
            background-size: cover;
            background-clip: border-box;
            
        }
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body class="text-center">
    <form class="form-signin" action = "process_sign_in.php" method="POST">
        <img class="mb-4" src="logoH.png" alt="" width="120" height="120">
        <h4>Request Management System</h4>
        <h6>Hartley College</h6>
        <div class="container1">
            <h1 class="h3 mb-3 font-weight-normal logo" style="color: rgb(33, 33, 36);">Please sign in</h1>
            <hr>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4 col-form-label" style="font: 20px rgb(33, 33, 36);">User Name</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class='fas fa-user-alt' style='font-size:17px;color:rgb(33, 33, 36);margin:auto'></i></span>
                        <input type="text" name="user_name" class="form-control" id="text" >
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4 col-form-label" style="font: 20px rgb(33, 33, 36);">Password</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class='fas fa-key' style='font-size:17px;color:rgb(33, 33, 36);margin:auto'></i></span>
                        <input type="password" name="password" class="form-control" id="Password" >
                    </div>
                </div>
            </div>
            <p class="mt-3 mb-3"><a href="#" style="text-decoration: none;">Forgot password?</a></p>
            <?php
           if(isset($_SESSION['loggedin'])) {?>
            <p class="mt-3 mb-3 " style="color: red;"> <?php echo $_SESSION['err_msg']; ?>  </p>

<?php
           }
           ?>
            
            <button class="btn btn-lg btn-dark btn-block" style="width:50%;" type="submit">Sign in</button>
        </div>
        
    </form>
    </body>
</body>
  
</html>
