<?php
//post.php
	$post_alert="";
	include_once('classes/managePost.php');
	include_once('statics/showphoto.php');
	// include_once('libs/session.php');
	$post=new ManagePost();
	// $text=$_POST['text'];
	// $a=$_POST['post'];
	// echo $a."  ".$text;
	
	if(isset($_POST['post'])){
		$username=$_SESSION['username'];
		$text=$_POST['text'];
		
		$time = date("Y-m-d H:i:s");
		// echo $username."  ".$text;
		if($post->createPost($username,$time,$text)){
			// echo "created a post successfully";
			$post_alert="Posted successfully";			
		}
		else{
			// echo "not successfully";
			$post_alert="The Post Failed";
		}
	  }
	  function showPosts($allPost){
	  	// global $post;
	  	// $allPost=$post->getAllPost($username);
	  	 foreach($allPost as $key => $value){
	  	 	$name=$value['username'];
	    	 echo "<li class='list-group-item'>";
	    	 if (file_exists("uploads/$name.jpg")){
				echo "<div class='thumbnail'> <img src='uploads/$name.jpg'></div>";
	   		}
	   		else{
	   			echo "<div class='thumbnail'> <img src='uploads/default-user.jpg'></div>";
	   		}
	   		echo "<div class='namebar'><h4><a href='?view=".$value['username']."'>".$value['username']."</a></h4></div>";
	    	echo "<div class='posttext'>".$value['post_text']."</div>";
	    	echo "<div class='posttime'>".$value['post_time']."</div></li>";
	    }
	  }

?>