<?php include("includes/header.php"); ?>

<?php
  
  $msg = "";

  if(isset($_POST['store'])){
    $user = new User();
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['pass'];

    if(User::user_exist($user->email) == TRUE){
      $msg = '<div class="text-danger">This email already exist</div>';
    }
    else{
       if($user->create() == TRUE){
        $msg = "You Added a User";
      }
      else{
        $msg = "Something Went Wrong";
      }
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
            <div class="col-md-8">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">Add User</div>
                  <?php


                    echo '<div class="text-success">'. $msg .'</div>';

                  ?>
                </div>
                <div class="panel-body">
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                      <input type="text" name="name" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" placeholder="email" class="form-control" autocomplete="Off">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" placeholder="Password" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="store" class="form-control btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>