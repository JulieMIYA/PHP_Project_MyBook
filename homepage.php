<?php 
	
	include_once ('statics/header.php');
	include_once('libs/post_info.php');  
	include_once('statics/friendlist.php') ;
	
	//SELECT * FROM post where `username` 
	// IN (select `followed` from friends where `follower`='rourou') OR `username` ='rourou' ORDER BY post_time ASC 
?>
		
		<div id='message_form' >
			<form action='homepage.php' method='post'>				
					<div class='panel panel-success'>
				    	<div class='panel-footer'>Update Status&nbsp;&nbsp;&nbsp;
				    		    <input type='submit' value='Post' name='post' id='post' class='btn btn-success'/>
					    		<!-- <button type='submit' name='post' id='post' class='btn btn-default '> -->			
				    	</div>
				    	<textarea class='form-control' name='text' id='text' rows='4'></textarea>
				    </div>
			</form>
		</div>
		<?php  showFriendList($session_name);?>
		<div id='post_form'>
		    <ul class='list-group'>
<?php 
		if(isset($_GET['view'])){
	    	$viewedname=$_GET['view'];
	    	showPosts($post->getThePost($viewedname));
		}else{
			showPosts($post->getAllPost($session_name));
		}
?> 				
			</ul>
		</div>
    <script>
	$(document).ready(function() {
		$( "#home" ).attr( "class", "active" );
	}
	</script>
<?php 
include_once('statics/footer.php');
?>