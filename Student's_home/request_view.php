<?php include '../navbar.php' ?>
<style>
  .comment {
    display: flex;
    border-radius: 3px;
    margin-bottom: 45px;
    flex-wrap: wrap;
  }

  .comment.user-comment {
    color: #808080;
  }

  .comment.author-comment {
    color: #60686d;
    justify-content: flex-end;
  }

  /* User and time info */

  .comment .info {
    width: 17%;
  }

  .comment.user-comment .info {
    text-align: right;
  }

  .comment.author-comment .info {
    order: 3;
  }


  .comment .info a {
    /* User name */
    display: block;
    text-decoration: none;
    color: #656c71;
    font-weight: bold;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    padding: 10px 0 3px 0;
  }

  .comment .info span {
    /* Time */
    font-size: 11px;
    color: #9ca7af;
  }


  /* The comment text */

  .comment p {
    line-height: 1.5;
    padding: 18px 22px;
    width: 50%;
    position: relative;
    word-wrap: break-word;
  }

  .comment.user-comment p {
    background-color: #f3f3f3;
  }

  .comment.author-comment p {
    background-color: #e2f8ff;
    order: 1;
  }

  .user-comment p:after {
    content: '';
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #ffffff;
    border: 2px solid #f3f3f3;
    left: -8px;
    top: 18px;
  }

  .author-comment p:after {
    content: '';
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #ffffff;
    border: 2px solid #e2f8ff;
    right: -8px;
    top: 18px;
  }
</style>
<div class="container">
  <br><br>
  <?php
              $sql = "SELECT is_read, request_to, request_type, detail,status, image FROM request WHERE id='{$_GET['id']}'";
              $result = $db->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

              
              
              
              
              
              ?>
  <h4> <span><?php echo $row['request_to'];?></span><span> - </span><span><?php echo $row['request_type'];?> &nbsp;
    </span></h4>

  <hr>


  <div class="card" style="width: 100%;">

    <div class="card-body">

      <p class="card-text"><?php echo $row['detail'];?>
      </p>

    </div>
  </div>
  <?php if(isset($row['image'])) {?>
  <br>
  <a href="../student_send_request/uploads/<?php echo $row['image'];?>" target="_blank" style="text-decoration: none;">
    <i class="fa fa-file" style="font-size:24px"> </i> View Submitted Files</a>
  <?php }
                else{
                    echo '<br>';
                    echo'No files were submitted';}
                    ?>
  <br><br>
  <div class="text-center"> Your request is <?php echo $row['is_read'];?> </div>
  <div class="text-center text-info"> Your request is <?php echo $row['status'];?> </div>
  <br>
  <div class="d-flex justify-content-center">
    <!-- 
              
             <div class="progress" style="height: 1px;width:50%;">
              <div class="progress-bar" role="progressbar" style="width:50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
               
              </div> 
              </div>
                -->
  </div>

  <br>
  <hr>
  <br>
  <div class=" container ">

    <form action="chat_pro.php" method="post">
      <div class="input-group mb-3">
        <input type="text" name="msg" id="saman" class="form-control" placeholder="Add any comment.............."
          aria-label="Recipient's username" aria-describedby="basic-addon2">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      </div>
      <div class="d-md-flex justify-content-md-end">
        <button class="btn btn-primary">Send</button>
      </div>
  </div>
  </form>
  <br><br>
  <h4 class="text-primary  dsplay" style="text-align: center;">Chat History</h4>

  <br>


  <div class="container comment-section">




    <?php
              $sql = "SELECT frm ,time,message FROM chat WHERE id='{$_GET['id']}' order by time ";
              $result = $db->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while($row1 = $result->fetch_assoc()) {

            if($row1['frm']==$_SESSION['name'])    {
              
              
                  
              
              ?>


    <div class="row comment author-comment">

      <div class=" info">
        <a href="#">You</a>
        <span><?php echo substr($row1['time'],0,19)  ;?></span>
      </div>


      <div class="body col-8 d-flex justify-content-end">
        <p><?php echo $row1['message'] ;?>
        </p>
      </div>
    </div>
    <?php }
    else{
   ?>
    <div class="row comment user-comment">

      <div class="info ">
        <a href="#"><?php echo $row['request_to'];?></a>
        <span><?php echo substr($row1['time'],0,19) ;?></span>
      </div>


      <div class="body col-8">
        <p><?php echo $row1['message'];?></p>
      </div>
    </div>


    <?php
    } 
    ?>



    <?php }}?></div>
  <hr>




  <hr>













  <?php }
              }
              
            
              ?>

  <br>
</div>





<script src="script.js"></script>
<?php include '../footer.php' ?>