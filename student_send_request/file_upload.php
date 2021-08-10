<?php 

include '../navbar.php' ;
$_SESSION['upload']= TRUE;
?>

<div class="container">
    <br><br>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading"><i class="fa fa-check" aria-hidden="true"></i> Successful</h4>
  <p>You can insert images and documents to submit evidance to your Request. It will be easier to recipient to process if you send some attachments </p>
  <hr>
  <p class="mb-0">If you want to add submission, upload the files and click submit, or click No Thanks</p>
</div>

<br>
<a href="../Student's_home/"> <button class="btn btn-secondary"> No Thanks</button> </a>
 <br><hr><br>
<form action="attach.php" method="post" enctype="multipart/form-data">
<div class="mb-3">
    <h4 class="display-4">Do you want to attach some documents??</h4>
    <br>
                    <label for="formFileMultiple" class="form-label">Upload any required documents</label>
                    <input name="file" class="form-control" type="file" id="formFileMultiple" multiple>
                    <br>
                    <input type="submit" class= "btn btn-info"name="submit" value="Attach">
                    
                  </div>
   
    
    
</form>



</div>


<?php include '../footer.php'; ?>