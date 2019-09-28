<?php 
  include("includes/header.php"); 

 $msg = "";

  if(isset($_POST['update'])){

      $photo = new Photo();
      $photo->id = $_POST['id'];
      $photo->title = $_POST['title'];
      $photo->description = $_POST['description'];

    

      if($photo->save()){
        $msg = "Photo Uploaded Successfully";
      }
      else{
        $msg = join("<br>",$photo->errors);
      }



  }

  if(empty($_GET['id'])){
    redirect("photo.php");
  }

  $photo = new Photo(); 
  $photo = $photo->findById($_GET['id']);

 

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

    <!-- /.container-fluid -->

    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="panel col-md-10">
                            <div class="panel-heading">
                                All Photos
                                 <?php echo $msg;   ?>
                            </div>
                            <div class="panel-body">

                                <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <a href="#" class="thumbnail"><img src="<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->title; ?>" ></a>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $photo->title; ?>">
                                        <input type="hidden" name="id" value="<?php echo $photo->id;  ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="summernote" cols="30" rows="10"><?php echo $photo->description; ?></textarea>
                                    </div>
                                 
                                    
                                        
                                
                                   

                                   

                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-primary" name="update">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                                 <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span>  27 Aug 2019
                                  </p>
                                  <p class="text ">
                                    Photo ID: <span class="data photo_id_box"> <?php echo $photo->id;  ?></span>
                                  </p>
                                  <p class="text">
                                    Filename: <span class="data"><?php echo $photo->filename;  ?></span>
                                  </p>
                                 <p class="text">
                                  File Type: <span class="data"><?php echo $photo->type;  ?></span>
                                 </p>
                                 <p class="text">
                                   File Size: <span class="data"><?php echo $photo->size;  ?></span>
                                 </p>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>   
                              </div>
                            </div>          
                        </div>
                    </div>


                </div>

              
            </div>
        </div>
    </div>

    </div>
    <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>