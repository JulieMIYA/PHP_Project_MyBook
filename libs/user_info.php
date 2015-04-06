<?php	
  include_once('classes/manageUser.php');

	$user= new ManageUser();
    if(isset($_POST['login']) ){
    	session_start();
    	$username=$_POST['username'];
      $_SESSION['username']=$username;
    	$password=$_POST['password'];
      $error;
      $rerror;
    	if(empty($username)||empty($password)){
    		$error='All fields are required';
       	}else{
       		$isexist=$user->GetUserInfo($username);
       		if ($isexist==0){
       			$error="Username doesn't exist";
       		}else{
       			$true_pw=$user->GetUserInfo($username)[0]['pass'];
				// echo $true_pw;
				if($true_pw!==$password){
				 	$error="Password is incorrect";
			    }
			    else{
			    	$make_sessions=$user->GetUserInfo($username);
					foreach($make_sessions as $userSession){
						$_SESSION['username']=$userSession['user'];
						if(isset($_SESSION['username'])){
							header("location:homepage.php");
						}
					}
			    }
       		}

       	}
    }
    if(isset($_POST['register'])) {
    	session_start(); 
      $username= $_POST['user'];
      $pass=$_POST['pass'];
      $cpass=$_POST['cpass']; 
      if(empty($username)||empty($pass)||empty($cpass))	
        $rerror='All fields are required';
        elseif(strlen($username)<4) $rerror="The length of username should be longer than 4";
        elseif($user->CheckUser($username)==1) $rerror="The username is not avaiable";
        elseif(strlen($pass)<4) $rerror="The length of password should be longer than 4";
        elseif(strtolower($pass)==$pass||strtoupper($pass)==$pass) 
          $rerror="The password should be mixed with both upper and lowercase";
        elseif($pass!==$cpass) $rerror="Two password are not consitent";
        else {
          $_SESSION['username']=$username;
        if ($user->registerUsers($username,$pass)){
          header("location:homepage.php");
        }
      }
    }

   

?>