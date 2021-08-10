<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Home</title>

    <link rel="stylesheet" href="Navbar.css">


    <link rel="stylesheet" href="Navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
        a :hover {
            color: rgb(50, 50, 155);
        }
    </style>

</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-icon-top">



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">



            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link " href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    
                </li>




                <li class="nav-item">
                    <a class="nav-link" href="log_out.php"><i class="fa fa-sign-out"></i></i></a>
                </li>
            </ul>

        </div>
    </nav>


    <!--Body content-->
    <div class="container">
        <form action="process.php" method="POST">
        <br><br>
        <h3>Add a user</h3>
        <hr>
        <br><br>
        <div class="row justify-content-md-center">

            <div class="col-lg-4">
                <label for="req_type" class="form-label">Add user's/users' name</label>
            </div>

            <div class="input-group mb-3 col-lg-8">
                <input required type="text" name="name" id="saman" class="form-control" placeholder="User name">

            </div>
        </div>

        <div class="row justify-content-md-center">

            <div class="col-lg-4">
                <label for="req_type" class="form-label">Full name</label>
            </div>

            <div class="input-group mb-3 col-lg-8">
                <input  type="text" id="saman" class="form-control" placeholder="Full name">

            </div>
        </div>

        <div class="row justify-content-md-center">

            <div class="col-lg-4">
                <label for="req_type" class="form-label">ID NO</label>
            </div>

            <div class="input-group mb-3 col-lg-8">
                <input required type="text" id="saman" name="index_no"  class="form-control" placeholder="Register id">

            </div>
        </div>
        





        <br>
        <div class="row justify-content-md-center mb-3">

            <label for="userid" class="form-label col-lg-4">Password</label>
            <input type="text" required name="password"  class="form-control col-lg-8" id="userid" aria-describedby="">

        </div>

        <div class="row mb-3">
            <label for="req_type" class="form-label col-lg-4">Account Type</label>
            <select required class="form-control col-lg-8" name="type"  id="req_type" aria-label="Default select example">
                <option selected>Student </option>
                <option >Teacher</option>
                <option >Admin</option>
            </select>
        </div>
        <br>
        <br>
        <hr>
        <h4>If you want to add students then fill following two</h4> <br> 
        <div class="row justify-content-md-center">

            <div class="col-lg-4">
                <label for="Course" class="form-label">Course</label>
            </div>

            <div class="input-group mb-3 col-lg-8">
                <input type="text" id="Course" name="course"  class="form-control" placeholder="Course">

            </div>
        </div>
        <div class="row justify-content-md-center">

            <div class="col-lg-4">
                <label for="Year" class="form-label">Year</label>
            </div>

            <div class="input-group mb-3 col-lg-8">
                <input type="text" id="Year" name="year"  class="form-control" placeholder="Year">

            </div>
        </div>
        <br>
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-dark btn-md ml-4 mr-4"></i>Add user</button>
        </div>
        <hr>
        <br>

        
        <div class="alert alert-success" role="alert">
        <?php
        if(isset($_GET['success'])){
            echo "User is successfully added";
        }
        ?>
</div>
        </form>
    </div>
    <br>
    

    







</body>

</html>
