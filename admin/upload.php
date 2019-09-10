<?php include("includes/header.php"); ?>

<?php

$msg = "";
if(isset($_POST['submit'])){


  $photo = new Photo();
  $photo->title = $_POST['title'];
  $photo->description = $_POST['descr'];
  $photo->set_file($_FILES['file']);


  if($photo->save()){
    $msg = "Photo Uploaded Successfully";
  }
  else{
    $msg = join("<br>",$photo->errors);
  }



}


?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
           <?php 

           include_once('includes/top_menu.php'); 
           include_once('includes/sidebar.php');

           ?>
           
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <!-- /.container-fluid -->

            
              <div class="row">
                <div class="col-md-8 col-ms-12 col-xs-12">
                    <div class="panel">
                      <div class="panel-header">
                          Upload Image:
                          <?php echo $msg;   ?>
                      </div>
                      <div class="panel-body">
                          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Image Title</label>
                                  <input type="text" name="title" placeholder="Title" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Description</label>
                                  <textarea name="descr" id="" cols="30" rows="10" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Upload</label>
                                  <input type="file" name="file" id="">
                              </div>
                              <div class="form-group">
                                
                                  <input type="submit" value="Store" class="btn btn-primary" name="submit">
                              </div>
                          </form>
                      </div>
                    </div>
                </div>
              </div>
            <

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>