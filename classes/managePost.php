<?php
	include_once('db.php');
	class ManagePost{
		public $link;

		function __construct(){
			$db_connection= new dbConnection();
			$this->link= $db_connection->connect();
		    //return $this->link;
		}
		function createPost($username,$time,$text){
			$query=$this->link->prepare("INSERT INTO post (username,post_text,post_time)VALUES(?,?,?)");
			$values=array($username,$text,$time);
			$query->execute($values);
			$counts= $query->rowCount();
			return $counts;
		}
		function getAllPost($username){
			$query=$this->link->prepare("SELECT * FROM post where username IN
				(select followed from friends where follower='$username')or 
				username ='$username' ORDER BY post_time DESC");
			$query->execute();
			$allPost =$query->fetchAll();
			return $allPost;
		}
		function getThePost($username){
			$query=$this->link->prepare("SELECT * FROM post where username ='$username' ORDER BY post_time DESC");
			$query->execute();
			$allPost =$query->fetchAll();
			return $allPost;
		}
	}	
?>