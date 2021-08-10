<?php include '../navbar.php' ?>

          <!--Body content-->
          <div class="container">
            <br>
            <h4>Use the form below to change your password.</h4>
            <hr>
            <br>
            <?php if(isset($_SESSION['msgpw'])){?>
                <p style="color: red;"><?php echo $_SESSION['msgpw'];?></p><br>
           <?php }?>
            
            <div class="row my-5 mx-2">
              <div class="col-sm-1 col-md-2"></div> <!-- Left space-->
              <div class="col-sm-10 col-md-8">
                <!-- form-container -->
                <form action="change_pw_process.php" method="POST">
                  <div class="form-group mb-3 row">
                    <label for="current-password" class="form-label col-4">Current Password</label>
                    <input required class="form-control col-8" type="password" name="pw_old" id="">
                   
                  </div>

                  <div class="form-group mb-3 row">
                    <label for="current-password" class="form-label col-4">New Password</label>
                    <input required class="form-control col-8" type="password" name="pw_new1" id="">
                   
                  </div>
                  <div class="form-group mb-3 row">
                    <label for="current-password" class="form-label col-4">Repeat New Password</label>
                    <input  required class="form-control col-8" type="password" name="pw_new2" id="">
                   
                  </div>
                  
                 
                  
                  
                  <br>
                  <div class="text-center mb-3">
                    <button class="btn btn-dark btn-md ml-4 mr-4" ></i>Change Password</button>
                  </div>

                </form>
                
                <br><br><hr>
               <a href="index.php"> <button class="btn btn-primary">Click here to go to home</button> </a>
              </div>
              <div class="col-sm-1 col-md-2"></div> <!-- Right-side -->
            </div>
          </div>

<?php include'../footer.php';