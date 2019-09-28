<?php include("includes/header.php"); ?>
<?php 
$page = !empty($_GET['page']) ? (int)$_GET['page']: 1;

$items_per_page = 3;
$items_total_count = Comments::count_all();

$paginate = new Paginate($page,$items_per_page,$items_total_count);






$msg = "";
if(isset($_GET['id'])){
  $comment = new Comments();
  $comment->id = $_GET['id'];

  if($comment->delete()){
    echo '
        <script>
          alert("You Deleted a Photo");

          window.open("comments.php","_self");

        </script>
    ';

  }
  else{
    $msg = '<div class="text-danger"><h3>Something Went Wrong</h3></div>';
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

          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                Coments
              </div>
            </div>
            <div class="pnale-body">
              <?php echo $msg;  ?>
              <table class="table">
                <thead>
                  <th>Photo</th>
                  <th>Author</th>
                  <th>Comments</th>
                  <th>Browse</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                  <?php
                    $comments = Comments::find_all_for_comments($paginate->offset(),$items_per_page);

                    while($row= mysqli_fetch_array($comments)) {
                    

                  ?>
                  <tr>
                    <td><img src="images/<?php echo htmlentities($row['filename']);   ?>" alt="" height="110px" width="107px"></td>
                    <td><?php  echo htmlentities($row['author']);   ?></td>
                    <td><?php  echo htmlentities($row['comment']);   ?></td>
                    <td><a href="photo.php?id=<?php  echo htmlentities($row['id']);   ?>" traget="_blank">Visit</a></td>
                    <td><a href="<?php  echo $_SERVER['PHP_SELF'] ."?id=" .htmlentities($row['comment_id']);   ?>"class="btn btn-danger">Delete</a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- /#page-wrapper -->

        <nav aria-label="...">
          <ul class="pagination">
            <li class="disabled">
              <span>
                <span aria-hidden="true">&laquo;</span>
              </span>
            </li>
            <?php   
              for($i=1;$i<=$paginate->page_total();$i++){
                if($i== $paginate->current_page){
                  echo "<li class='active'><span><a href='comments.php?page={$i}' style='color:#ffffff;'>{$i}</a></span></li>";
                }
                else{
                  echo "<li><span><a href='comments.php?page={$i}'>{$i}</a></span></li>";

                } 
              }

            ?>
            
            ...
          </ul>
        </nav>

  <?php include("includes/footer.php"); ?>