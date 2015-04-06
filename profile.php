<?php
//profile.php
	include_once('statics/header.php');
	include_once('libs/profile_info.php');//process the form
	include_once('statics/showphoto.php');
	// $username=$_SESSION['username'];
	if(isset($_POST['uploadphoto'])){
		if (isset($_FILES['image']['name']))
		{
			$saveto = "uploads/$session_name.jpg";
			move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
			$typeok = TRUE;
			switch($_FILES['image']['type'])
			{
				case "image/gif": $src = imagecreatefromgif($saveto); break;
				case "image/jpeg": // Allow both regular and progressive jpegs
				case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
				case "image/png": $src = imagecreatefrompng($saveto); break;
				default: $typeok = FALSE; break;
			}
			if ($typeok)
			{
				list($w, $h) = getimagesize($saveto);
				$max = 100;
				$tw = $w;
				$th = $h;
				if ($w > $h && $max < $w)
				{
					$th = $max / $w * $h;
					$tw = $max;
				}
				elseif ($h > $w && $max < $h)
				{
					$tw = $max / $h * $w;
					$th = $max;
				}
				elseif ($max < $w)
				{
					$tw = $th = $max;
				}
				$tmp = imagecreatetruecolor($tw, $th);
				imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
				// imageconvolution($tmp, array(array(−1, −1, −1),array(−1, 16, −1), array(−1, −1, −1)), 8, 0);
				imagejpeg($tmp, $saveto);
				imagedestroy($tmp);
				imagedestroy($src);
			}
		}
	}
?>
		<div id="profile_form">
		    	<!-- <img src="uploads/rourou.jpg"> -->
		    	<?php
			   //  	// $username=$_SESSION['username'];
			   //  	if (file_exists("uploads/$session_name.jpg")){
						// echo "<div class='thumbnail'> <img src='uploads/$session_name.jpg' ></div>";
			   // 		}
			   // 		else{
			   // 			echo "<div class='thumbnail'> <img src='uploads/default-user.png' ></div>";
			   // 		}
		    		ShowPhoto($session_name);
		    	?>  		
		    	<div class="profiletext">
					<form method='post' action='profile.php' enctype='multipart/form-data'>
						<input type="file" value="Choose image" name="image" id="image">
						<input type="submit" value="Upload Image" name="uploadphoto">
						<h2>Profile: </h2>
						<textarea name="profile" id="profile" cols="80" rows="3" ><?php echo $profiletext; ?></textarea>
						<input type="submit" value="Save" name="saveprofile">
					</form>
				</div>
		</div> 

					      
		    
			
	</div>