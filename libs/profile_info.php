<?php
include_once('classes/manageUser.php');
$user= new ManageUser();
	$username=$_SESSION['username'];
	$isexist=$user->GetUserInfo($username);
	if($isexist){
		$profiletext=$isexist[0]['profile'];
	}
	if(isset($_POST['saveprofile'])){
		$profiletext=$_POST['profile'];
		$user->UpdateProfile($session_name,$profiletext);
	}

?>