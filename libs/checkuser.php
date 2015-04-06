<?php
include_once('classes/manageUser.php');
$user=new ManagerUser();
if (isset($_POST['user'])){
	$username=$_POST['user'];
	if($user->CheckUser($username))
		echo "<span class='taken'>&nbsp;&#x2718; " ."Sorry, this username is taken</span>";
	else 
		echo "<span class='available'>&nbsp;&#x2714; "."This username $user is available</span>";
	}
}
?>