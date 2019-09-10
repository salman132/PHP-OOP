<?php 



require_once('includes/init.php');

    if(!$session->is_signed_in()){

       redirect("login.php");
       die();
    }
    if(empty($_GET['id'])){
    	redirect("login.php");
    	die();
    }

    if(isset($_GET['id'])){
    	$id = $_GET['id'];
    	$photo = new Photo();

    	$photo = Photo::findById($id);

    	$photo->id;

    	if(!empty($photo)){
    		$photo->delete();
    		unlink($photo->picture_path());
    		redirect("photo.php");
    	}
    	else{
    		redirect("photo.php"); 
    	}


    	
    }









?>