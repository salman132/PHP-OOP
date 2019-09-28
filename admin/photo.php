<?php include("includes/header.php"); ?>

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
                <div class="panel">
                    <div class="panel-heading">
                        All Photos
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Photo</th>
                                  <th>File Name</th>
                                  <th>Title</th>
                                  <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php  
                                $photo = new Photo(); 
                                $photos = $photo->find_all();

                                foreach ($photos as $photo) {
                                  # code...
                               

                              ?>
                                <tr>
                                  <td><img src="<?php echo $photo->picture_path();   ?>" alt="" height="110px" width="107px">
                                  <div class="extra-tool">
                                    <a href=" <?php  echo $photo->id;  ?>">View</a>
                                    <a href="editPhoto.php?id=<?php  echo $photo->id;  ?>">Edit</a>
                                    <a href="deletePhoto.php?id=<?php echo $photo->id    ?>" class="text-danger">Delete</a>
                                  </div>
                                  </td>
                                  <td><?php echo $photo->filename;   ?></td>
                                  <td><?php echo $photo->title;   ?></td>
                                  <td><?php echo $photo->size;   ?></td>
                                </tr>

                              <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>

        </div>
   

  <?php include("includes/footer.php"); ?>
  <script>
      $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    ?>
  })
  </script>