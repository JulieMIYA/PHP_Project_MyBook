<?php
function ShowPhoto($username){
	    	// $username=$_SESSION['username'];
	    	if (file_exists("uploads/$username.jpg")){
				echo "<div class='thumbnail'> <img src='uploads/$username.jpg' ></div>";
	   		}
	   		else{
	   			echo "<div class='thumbnail'> <img src='uploads/default-user.jpg' ></div>";
	   		} 	 
		}

?>