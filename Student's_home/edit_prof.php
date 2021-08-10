<?php include '../navbar.php' ?>

          <!--Body content-->
          <div class="container-fluid">
          <div class="container">
            <h4>Your profile details</h4>
            <hr><br>
            <div class="row my-5 mx-2">
              <div class="col-sm-1 col-md-2"></div> <!-- Left space-->
              <div class="col-sm-10 col-md-8">
                <!-- form-container -->
             <?php

$sql = "SELECT id, index_no,name, year,course,Email, Phone_no, Address, Zip FROM student WHERE name='{$_SESSION['name']}'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {?>
  
 
                  <form action="edit_prof_proc.php" method="POST">
                    <div class="mb-3 row">
                      <label for="userid" class="form-label col-4">User ID</label>
                      <input type="text" class="form-control col-8" id="userid" aria-describedby="" value="<?php echo $row['id']; ?>"  disabled>
            
                    </div>

                    <div class="mb-3 row">
                      <label for="userid" class="form-label col-4">Full Name</label>
                      <input type="text" class="form-control col-8" id="userid" aria-describedby="" value="<?php echo $row['name']; ?>"  disabled>
            
                    </div>

                    

                    <div class="mb-3 row">
                      <label for="userid" class="form-label col-4">ID No</label>
                      <input type="text" class="form-control col-8" id="userid" aria-describedby="" value="<?php echo $row['index_no']; ?>"  disabled>
            
                    </div>

                    <div class="mb-3 row">
                      <label for="userid" class="form-label col-4">Account type</label>
                      <input type="text" class="form-control col-8" id="userid" aria-describedby="" value="Student"  disabled>
            
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="Email" value="<?php echo $row['Email']; ?>" class="form-control" id="inputEmail4">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Phone NO</label>
                        <input type="text" name="Phone_no" class="form-control" value="<?php echo $row['Phone_no']; ?>" id="inputPassword4">
                      </div>
                    </div>
                   
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">Address</label>
                        <input type="text"  name="Address"  value="<?php echo $row['Address']; ?>" class="form-control" id="inputCity">
                      </div>
                      
                      <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text"  name="Zip"  value="<?php echo $row['Zip']; ?>" class="form-control" id="inputZip">
                      </div>
                    </div>
                   <br>
      
                    <div class="d-felx text-center">
                      <button type="submit" class="btn btn-dark">Change details</button>
                    </div>
                    
                  </form>
                  <?php
  }
}
?>
                
              </div>
              <div class="col-sm-1 col-md-2"></div> <!-- Right-side -->
            </div>
          </div>
          </div>

<?php include'../footer.php';