<?php

if(isset($_SESSION['page_no'])==false){
  $_SESSION['page_no'] =1;
}


?>
<?php include '../navbar.php' ?>

          <!--Body content-->
          <div class="container-fluid">
            
          <h4 class="display-4"> <?php echo "<i class='fa fa-envelope-o' aria-hidden='true'></i>"." ".ucfirst($_SESSION['status'])." Requests"; ?></h4>
          
          <?php
          
          if(isset($_SESSION['upload'])){ echo "<p class='text-success '> Your last entry was submitted succesfully </p>";} 
          unset($_SESSION['upload']); 
          ?>
          
                <div>
                  
                </div>
                <div class="list-group">
                <?php
                include '../db_config.php';
                
                $offset = $_SESSION['page_no']*10 - 10;
                if($offset<0){
                  $offset=0;
                }
                
                if($_SESSION['status'] !="all"){
                  $sql2 =  "SELECT id, is_read, request_to, request_type, detail FROM request WHERE reqiest_from ='{$_SESSION['name']}' and status='{$_SESSION['status']}'";
                  $sql = "SELECT id,is_read, request_to, request_type, detail FROM request WHERE reqiest_from ='{$_SESSION['name']}' and status='{$_SESSION['status']}' ORDER BY time DESC  LIMIT 10 OFFSET $offset ";
                  }
                  else{
                    $sql2 =  "SELECT id,is_read, request_to, request_type, detail FROM request WHERE reqiest_from ='{$_SESSION['name']}'";
                  $sql = "SELECT id,is_read, request_to, request_type, detail FROM request WHERE reqiest_from ='{$_SESSION['name']}' ORDER BY  time DESC  LIMIT 10 OFFSET $offset ";

                  }
                $result = $db->query($sql2);
                $num_of_pages =  $result->num_rows/10;
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                   ?>

                    <a href="request_view.php?id=<?php echo $row['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                    
                    
                    
                      <h5 class="mb-1"><span class="pr-5"><?php echo $row['request_to'] ?> </span>  - <span class="pl-5"> <?php echo $row['request_type'] ?></span></h5>
                      <h5 > <i class="fa 
                      <?php if($row['is_read']=="read"){ 
                        echo'fa-check'; }
                      else {
                         echo'fa-times'; 
                         }?>" aria-hidden="true"></i>
                         <?php echo $row['is_read'] ?></h5>
                    </div>
                    <p class="mb-1"><?php echo $row['detail'] ?></p>
                    
                  </a>

                   <?php
                  }
                } else {
                  echo "No mails to display";
                }

                ?>

    
                </div>
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center mt-3">

                  

                    <li class="page-item <?php if($_SESSION['page_no'] <=1){ ?> disabled <?php }?>">
                    
                    
                        <a class="page-link" href="go_pre.php"tabindex="-1"  >Previous</a>

                   
                      
                    </li>
                    <?php if($_SESSION['page_no'] >1){ ?>
                    <li class="page-item"><a class="page-link" href="go_pre.php"><?php echo $_SESSION['page_no']-1 ;?></a></li>
                     <?php
                     }
                           ?>
                    <li class="page-item active"><a class="page-link" href="#"><?php echo $_SESSION['page_no']; ?></a></li>
                    <?php
                   
                    if($_SESSION['page_no']<ceil($num_of_pages)){ ?>
                            <li class="page-item"><a class="page-link" href="go_next.php"><?php echo $_SESSION['page_no']+1; ?></a></li>
                    
                                    

<?php
                    }?>
<li class="page-item <?php if($_SESSION['page_no']>ceil($num_of_pages)-1){ ?> disabled <?php }?>">
<a class="page-link" href="go_next.php">Next</a>
                    </li>
                  </ul>
                  <p style="text-align: center;" class="lead"> Showing page <?php echo $_SESSION['page_no']; ?> of <?php echo ceil($num_of_pages); ?></p>
                  <p style="text-align: right;" class="lead"> Total Entries : <?php echo $num_of_pages*10; ?> </p>
                </nav>
          </div>

    <?php include'../footer.php';