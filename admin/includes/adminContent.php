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

                        $users = User::find_all();

                        foreach ($users as $user) {
                            echo $user->name;
                        }



                        ?>
                        <h3>Photo</h3>

                        <?php
                            $photos = Photo::find_all();

                            foreach ($photos as $photo) {

                                echo $photo->title;
                            }


                        ?>
                        <h3>By ID</h3>
                        <?php
                        
                           $me = User::findById(2);

                          

                           if(empty($me)){
                             echo "<h3>No record Found</h3>";
                           }
                           else{
                            echo $me->name;
                           }
                          

                        ?>
                        <h3>Inserting</h3>
                        <?php

                        echo SITE_ROOT;


                        // $photo = new Photo();

                        // $photo->title = "Cristiano Ronaldo 7";
                        // $photo->description = "cristiano@cr7.com";
                        // $photo->filename = 'Huf File';
                        // $photo->type = 'png';

                        // $photo->create();

                        // $user = $user->findUserById(11);
                        // $user->delete();


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