<?php include '../navbar.php' ?>

<div class="container">
    
    
        <div class="row my-5 mx-2">
          <div class="col-sm-1 col-md-2"></div> <!-- Left space-->
          <div class="col-sm-10 col-md-8">
            <!-- form-container -->

            <?php
            include '../db_config.php' ;
            $sql = "SELECT index_no, year, course  FROM student where name='{$_SESSION['name']}' ";
            $result = $db->query($sql);?>
            <form action="submit.php" method="POST"  >
            <?php
            if ($db->query($sql) == TRUE) {
              
                while($row = $result->fetch_assoc()) {?>
            

                <div id="result"></div>
                             
              <div class="mb-3 row">
                <label for="userid" class="form-label col-4">ID No</label>
                <input type="text" readonly name="index_no" value="<?php echo $row['index_no'];?>" class="form-control col-8" id="userid" aria-describedby="">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
              </div>
              <div class="mb-3 row">
                <label for="UserName" class="form-label col-4">Name</label>
                <input type="name" readonly name="reqiest_from"  value="<?php echo $_SESSION['name'];?>" class="form-control col-8" id="UserName">
              </div>
              <div class="form-group mb-3 row">
                <label for="req_type" class="form-label col-4">Request Type</label>
                <select name="request_type" class="form-control col-8" id="req_type" aria-label="Default select example">
                  <option selected>Add-Drop</option>
                  <option >Extend-Dead line</option>
                  <option >Repeat-Exam</option>
                  <option>Rearrange-Practical</option>
                  <option >Extend-Dead line</option>
                  <option >Ask-Leave</option>
                  <option >Others</option>
                </select>
              </div>
              <div class="row">
                <div class="mb-3 col-md">
                  <div class="row">
                    <label for="year" class="form-label col">Year</label>
                    <input type="number" name="year" readonly value="<?php echo $row['year'];?>" class="form-control col" min="1" max="4" value="1" id="year">
                  </div>
                </div>
                <div class="form-group col-md mb-3">
                  <div class="row">
                    <label for="course" class="form-label col">Course</label>
                    <input id="course"type="text" name="course" readonly value="<?php echo $row['course'];?>" class="form-control col">
                  </div>
                </div>
              </div>
              <br>

              <?php } } ?>
              <div class="mb-3">
                <label for="detailsTextArea" class="form-label">Detail</label>
                <textarea name="detail" class="form-control" id="word_count" onkeyup="fun();" cols="30" rows="10"></textarea>
                Total word count: <span id="display_count">0</span> words. Words left: <span id="word_left">150</span>
              </div>
              <br>
             
              <br>
              <div class="text-center mb-3">
                <button name="submit" class="btn btn-dark btn-md ml-4 mr-4"></i>Submit Request</button>
              </div>

            </form>
          </div>
          <div class="col-sm-1 col-md-2"></div> <!-- Right-side -->
        </div>
      </div>




<script src="script.js"></script>
<?php include '../footer.php' ?>