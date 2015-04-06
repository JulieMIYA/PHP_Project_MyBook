<?php
include_once('libs/session.php');
?>
<!DOCTYPE>
<html>
<head>
	<meta content="charset=UTF-8">
	<script src=="js/OSC.js"></script>
	<script src="js/jquery-1.11.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel='stylesheet' type='text/css' href='css/bootstrap-3.3.4/css/bootstrap.css'/>
	<link rel='stylesheet' type='text/css' href='css/styles.css'/>
	<title>MyBook</title>
	<script>
    $(document).ready(function() {
        $('a[href="' + this.location.pathname + '"]').parent().addClass('active');
    });
</script>
</head>
<body>
	<div class='navbar navbar-default'>
		<div class='navbar-inner'>
			<a class='navbar-brand' href='#'>MyBook</a>
			<div id="searchbar">
				<form class="navbar-form navbar-left" role="search" method="post" action="search.php">
						<div class="form-group">
							<input type="text" class="form-control" name="searchname" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default" name="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</form>
			</div>
			<div id='userbar'>
				<p class="navbar-text "><a href="homepage.php?view=<?php echo $session_name?>"><span class="glyphicon glyphicon-grain" aria-hidden="true">
					<?php echo $session_name. "'s" ;?></p>		
					</a>		
			</div>
		</div>
	</div>
	<div id="mb_container" class="clearfix">
		<div id="sidebar">  
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation" id="home"><a href="homepage.php">
					<span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Home</a></li>
				<li role="presentation" id="profile"><a href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Profile</a></li>
				<li role="presentation" id="messager"><a href="#"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>  Messager</a></li>
				<li role="presentation" id="logout"><a href="libs/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>  Logout</a></li>
		    </ul>
		</div>
		

	
