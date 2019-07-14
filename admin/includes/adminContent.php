            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>
                        <?php
                            
                            // $result_set = User::find_all_users(); 
                           
                            // while($row = mysqli_fetch_array($result_set)){
                            //     echo $row['name'];
                            // }

                        $users = User::find_all_users();

                        foreach ($users as $user) {
                            echo $user->name;
                        }


                        ?>
                        <h3>By ID</h3>
                        <?php
                        
                           $me = User::findUserById(1);

                           echo $me->name;
                          

                        ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>