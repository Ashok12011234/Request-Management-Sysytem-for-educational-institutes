<?php
include '../db_config.php';

    $id = $_GET['id'];



      $sql = "SELECT name  FROM teacher  ";
      $result = $db->query($sql);?>
      <div class="form-group mb-3 row">
                
            
                
              
       <label for="ty123" class="form-label col-4">TO</label>
            <select name="request_to"  class="form-control col-8" aria-label="Default select example" id="ty123" required class="custom-select" autofocus="" >
          
            
                        
                      
<?php
            if ($db->query($sql) == TRUE) {
              
                while($row = $result->fetch_assoc()) {?>

                
                  <option value="<?php echo $row['name']; ?>"> <?php echo $row['name'];?></option>  
                 <?php }
                 ?>
                 </select>
                 </div>

<?php



            } else {
                echo "Error ";
    

            }
            







?>