<?php


class Comments extends Db_object{

	protected static $db_table = "comments";
	protected static $db_table_fields = array('id','photo_id','author','comment');

	public $id;
	public $photo_id;
	public $author;
	public $comment;


	public static function create_comment($photo_id,$author,$body){

		if(!empty($photo_id) && !empty($author) && !empty($body)){

			$comment = new Comments();

			$comment->photo_id = $photo_id;
			$comment->author = $author;
			$comment->comment = $body;

			return $comment;
		}
		else{
			echo $photo_id.$user_id.$body;
			return false;
		}
	}

	public static function find_comments($photo_id){

		$sql = "SELECT *FROM ". self::$db_table ." WHERE photo_id='$photo_id' ORDER BY photo_id ASC";

		return self::find_this_query($sql);

	}

	public static function find_all_for_comments($offset,$limit){
		global $db;
		
		$sql = "SELECT  p.id as id,c.id as comment_id,p.filename as filename ,c.author as author,c.comment as comment FROM photos p,comments c WHERE p.id=c.photo_id LIMIT $limit OFFSET $offset";

		

		return $db->query($sql);
	}





}

$comment = new Comments();















?>