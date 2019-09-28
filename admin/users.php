<?php include("includes/header.php"); ?>

<?php
$msg= "";
if(isset($_POST['add_user'])){
  $user = new User();
  $user->name = $_POST['username'];
  $user->email = $_POST['email'];
  $user->password = $_POST['password'];

  if($user->create()){
    $msg = '<div class="text-success"><h4>You Created a User</h4></div>';
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

            <div class="panel">
              <div class="panel-heading">
                                     <!-- Button trigger modal -->
                  <?php  echo $msg; ?>
                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    ADD User
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Add User:</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                            <div class="form-group">
                              <input type="text" name="username" placeholder="Username" required="required" class="form-control">
                            </div>
                            <div class="form-group">
                              <input type="email" name="email" placeholder="Email" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" placeholder="Password" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                              <input type="submit" value="ADD" name="add_user" class="btn btn-primary">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                                </div>
              <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Username</th>
                          <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $users = User::find_all();

                          foreach ($users as $user) {
                        

                        ?>
                        <tr>
                          <td><?php echo $user->id;   ?></td>
                          <td><?php echo $user->name;   ?></td>
                          <td><?php echo $user->email;   ?></td>
                        </tr>

                      <?php  } ?>
                    </tbody>
                </table>
              </div>
            </div>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
  <script>
    $('#myModal').modal(options)
  </script>