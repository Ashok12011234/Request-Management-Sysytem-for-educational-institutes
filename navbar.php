<?php
session_start(); 
if (isset($_SESSION['name'])==false){
  header("location: ../");
}

if(isset($_SESSION['status'])==false){
  $_SESSION['status'] ="all";
}
if(isset($_SESSION['page_no'])==false){
    $_SESSION['page_no'] ="1";
  }



?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Students Home</title>

    <link rel="stylesheet" href="Navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <style>
        a :hover {
            color: rgb(50, 50, 155);
        }
    </style>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center">
                <a class="navbar-brand" href="#"><img src="logoH.png" alt="logo" height="100" width="100"></a>
            </div>
            <div class="list-group list-group-flush">

                <br><br><br><br>

                <button onclick="location.href = '../student_send_request';" class="btn btn-success btn-md ml-4 mr-4"><i
                        class="fa fa-plus text-white"></i> &nbsp;Add Request</button><br><br><br>
                <a href="../Student's_home/all.php" class="list-group-item list-group-item-action bg-light">All</a>
                <a href="../Student's_home/pending.php"
                    class="list-group-item list-group-item-action bg-light">Pending</a>
                <a href="../Student's_home/accepted.php"
                    class="list-group-item list-group-item-action bg-light">Accepted</a>
                <a href="../Student's_home/decilined.php"
                    class="list-group-item list-group-item-action bg-light">Declined</a>

            </div>
        </div>


        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!--Navigation bar-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-icon-top">

                <button class="btn btn-sm btn-warning" id="menu-toggle"> <i class="fa fa-exchange"></i></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-home"></i></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <?php echo $_SESSION['name']; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="../Student's_home/edit_prof.php">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Student's_home/change_pw.php">Change Password</a>
                            </div>
                        </li>

                        <?php
                             
                  $sql2 =  "SELECT time, request_to, request_type, detail FROM request WHERE reqiest_from ='{$_SESSION['name']}' and is_read='unread'";
                  $sql = "SELECT time, id,request_to, request_type, detail FROM request WHERE reqiest_from ='{$_SESSION['name']}' and is_read='unread' ORDER BY time DESC, is_read DESC LIMIT 5 ";
                  include '../db_config.php';
                  
                $result = $db->query($sql2);
                $num_of_noti =  $result->num_rows;
                

                ?>
                        <!--bell-->
                        <li class="nav-item dropdown bell">
                            <a class="nav-link text-light" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell">
                                    <span class="badge" style="color: red;"><?php echo $num_of_noti;?></span>
                                </i>
                            </a>
                            <ul class="dropdown-menu bell">
                                <li class="head text-light bg-dark">
                                    <div class="container">

                                        <span>Notifications (<?php echo $num_of_noti;?>)</span>
                                      

                                </li>


                                <?php


                                          $result = $db->query($sql);

                                                          if ($result->num_rows > 0) {
                                                            $i=0;
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                              $i++;
                                                            ?>
                                <li class="notification-box <?php if($i%2==0){ echo'bg-light';}?>">

                                    <div class="container">

                                        <a href="request_view.php?id=<?php echo $row['id'];?>"> <strong class="text-dark"><?php echo $row['request_to'];?> -
                                                <?php echo $row['request_type'];?></strong></a>
                                        <div>
                                            
                                        </div>
                                        <br>
                                        <small
                                            class="text-info"><?php echo date_format(date_create($row['time']),"d/m/Y |  h:i A");?></small>

                                    </div>
                                </li>

                                <?php
                                                            }
                                                          } else {
                                                            echo "No mails to display";
                                                          }
                                        

                                        ?>






                                <li class="footer bg-dark text-center">
                                    <a href="all.php" class="text-light">View All</a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-question-circle"></i></a>
                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="log_out.php"><i class="fa fa-sign-out"></i></i></a>
                        </li>
                    </ul>

                </div>
            </nav>

            <!--Body content-->
            


            

  