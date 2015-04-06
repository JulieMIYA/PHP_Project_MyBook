<?php
include_once('libs/session.php');
include_once('classes/manageUser.php');
include_once('statics/header.php');
include_once('statics/showphoto.php');
$user=new ManageUser();

?>
			<div id="searchresult">
				  	<?php
					if(isset($_GET['add'])){
						$tobeadd=$_GET['add'];
						if($user->AddFriend($session_name,$tobeadd)){
							echo "<div class='alert alert-success' role='alert'>Well done! You already followed ".$tobeadd."</div>";
						}
					}
					if(isset($_GET['remove'])){
						
						$toberemove=$_GET['remove'];
						if($user->RemoveFri($session_name,$toberemove)){
							echo "<div class='alert alert-success' role='alert'>Well done! No longer follow ".$toberemove."</div>";
						}
					}					
					if(isset($_POST['search'])||isset($_GET['add'])||isset($_GET['remove'])){
						if(isset($_POST['search'])) $searchname=$_POST["searchname"];
						else {
							if(isset($_GET['add'])) $searchname=$_GET['add'];
							else $searchname=$_GET['remove'];
						}
					    $isexist=$user->GetUserInfo($searchname);
					    if($isexist){	
					        $searchedinfo=$isexist[0];			  	
				     		echo "<div class='panel panel-default'> 
						     		<div class='panel-body'>";
						     			ShowPhoto($searchname);
							     	echo"<div id='searchedinfo'>
							     			<p id='searchedname'> $searchname</p>
							     			<h4>Profile: $searchedinfo[2]</h4>
							     		</div>";
							    $followed=$user->Followed($session_name,$searchname);
							    $following=$user->Following($session_name,$searchname);
							    if($following==0){
					     			$action="<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Follow";
						     		echo "<div>
						     			<a href='search.php?add=".$searchname."'>
						     			<button type='button' class='btn btn-primary'>$action</button>
						     			</a>
						     		</div>";
							    }else{
							    	// echo "<div>
						     	// 		<a href='members.php?remove=".$searchname.">";
						     		if($following+$followed==2){
						     			echo "<div class='btn-group'>
										  <button type='button' class='btn btn-success'><span class='glyphicon glyphicon-resize-horizontal' aria-hidden='true' data-toggle='dropdown' aria-expanded='false'></span>
										  ";
						     										     		
						     		}
						     		elseif ($following==1){
						     			echo "<div class='btn-group'>
										  <button type='button' class='btn btn-success'><span class='glyphicon glyphicon-ok' aria-hidden='true' data-toggle='dropdown' aria-expanded='false'></span>
										  ";
						     		}	
						     		echo"Followed</button>
										  <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
										    <span class='caret'></span>
										    <span class='sr-only'>Toggle Dropdown</span>
										  </button>
										  <ul class='dropdown-menu' role='menu'>
										    <li><a href='search.php?remove=".$searchname."'>Unfollow</a></li>
										  </ul>
										</div>";			     			
					     		}
							     echo "				     		
						     		</div>
								 </div>";

				     	}else{
				     		echo "<div class='alert alert-danger' role='alert'>Oops! This user doesn't exist!</div>";
				     	}

				     }
					?>
				  				
			</div>
	    </div>
	    <script>
 		$(document).ready(function () {
        $('.btn btn-success dropdown-toggle').dropdown();
    });
</script>	
	</body>
</html>
