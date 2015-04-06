<?php
include_once('classes/manageUser.php');

	function showFriendList($username){
		$user=new ManageUser();
		$allFriend=$user->GetFriends($username);
		echo" <div class='friendlist'>
		    <ul class='nav nav-default nav-stacked'>
			  	<li role='presentation' class='active'>Following</li>";
				foreach ($allFriend as $key => $value) {
						echo "<li role='presentation'><a href='homepage.php?view=".$value[0]."'>".$value[0]."</a></li>";
					}	
			
			echo "</ul></div>";
	}
    
?>