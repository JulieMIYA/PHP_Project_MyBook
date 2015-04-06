
<?php 
	include_once 'libs/user_info.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- <script src=="js/OSC.js"></script> -->
		<script src="js/jquery-1.11.2.js"></script>
	    <script src="js/bootstrap.min.js"></script>
		<link rel='stylesheet' type='text/css' href='css/bootstrap-3.3.4/css/bootstrap.css'/>
		<link rel='stylesheet' href='css/styles.css' type='text/css'/>
		<title>MyBook</title>
	</head>
	<body>
	<nav class='navbar'>
		<div class='navbar-inner'>
			<a class='navbar-brand' href='#'>MyBook</a>
			<?php 
			if(isset($error)){
				echo'<div class="alert alert-error">'.$error.'</div>';
			}
		?>
			<form action="index.php" method="post">
				<div class="logincube">
					<input type="submit" value="login" name="login" id="login" class="btn btn-success" />
				    <label for="username">Username</label>
					<input type="text" name="username" id="username"/>
				    <label for="password">Password</label>
					<input type="password" name="password" id="password"/><br>
				    
				  
				</div>
			<form>
		</div>
	</nav>
<div class='painting'>
	<p class='welcome'>Welcome to MyBook!</p>
	<p class='description'>Wanna learn more friends around the world? Come here!</p>
	<div id='container'>
		<h1>SIGN UP FOR A FREE <span>MyBook</span> ACCOUNT</h1>
		<?php
		if(isset($rerror)){
				echo'<div class="alert alert-error">'.$rerror.'</div>';
			}
		?>
        <form method='post' action='index.php'>    
		       <div class='form'>
		           <input type='text' name='user' id='user' placeholder='username' />
		           <label for='username'>At least 4 characters. Uppercase letters, lowercase letters and numbers only.</label><br>

		           <input type='password' name='pass' id='pass' placeholder='password'/>
		           <label for='password'>At least 4 characters. Use a mix of upper and lowercase for a strong password.</label><br>

		           <input type='password' name='cpass' id='cpassword' placeholder='password' />
		           <label for='cpassword'>Type the password again.</label><br>
		           <input type="submit" value="register" name="register" id="register" class="btn btn-success"/>
		       </div>
   		</form>
   	</div>

<br><br><br>
	<footer>
		<p>  &copy MyBook</p>
	</footer>
 </div>
</body>
</html>