<?php
	include_once ('db.php');//manage table user and friend
	class ManageUser{
		public $link;

		function __construct(){
			$db_connection= new dbConnection();
			$this->link= $db_connection->connect();
		}

		function registerUsers($username,$password){
			try{
				$query= $this->link->prepare("INSERT INTO members(user,pass) VALUES(?,?)");
				$value=array($username,$password);
				$query->execute($value);
			}catch(PDOException $e)
		    {
		    	echo "System error! Fail to register" . $e->getMessage();
		    }
		    $counts= $query->rowCount();
			return $counts;
		}	
		function CheckUser($username){
			$query=$this->link->query("SELECT * FROM members WHERE user='$username'") ;
			$rowcount=$query->rowCount();
			return $rowcount;
		}
		function GetUserInfo($username){
			$query=$this->link->query("SELECT * FROM members WHERE user='$username'") ;
			$rowcount=$query->rowCount();
			if($rowcount!== 1){
				return $rowcount;
			}
			else {
				$result =$query->fetchAll();
				return $result;
			}
		}

		function UpdateProfile($username,$profile){
			try{
				$query=$this->link->prepare("UPDATE members SET profile='$profile' WHERE user='$username'");
				$query->execute();
			}
			catch(PDOException $e)
		    {
		    	echo "System error! Fail to update your profile" . $e->getMessage();
		    }
		}

		function Following($user,$searched){
			$query=$this->link->query("SELECT *FROM friends WHERE followed='$searched' AND follower='$user'");
			$query->execute();
			$rowcount=$query->rowCount();
			return $rowcount;
		}

		function Followed($user,$searched){
			$query=$this->link->query("SELECT *FROM friends WHERE follower='$searched' AND followed='$user'");
			$query->execute();
			$rowcount=$query->rowCount();
			return $rowcount;
		}

		function AddFriend($user,$searched){
			$query=$this->link->prepare("INSERT INTO friends(followed,follower) VALUES (?,?)");
			$value=array($searched,$user);
			$query->execute($value);
			$counts= $query->rowCount();
			return $counts;
		}

		function RemoveFri($user,$searched){
			try{
				$query=$this->link->prepare("DELETE FROM friends WHERE follower='$user' AND followed='$searched' ");
				$query->execute();
				$counts= $query->rowCount();
				return $counts;
			}
			catch(PDOException $e)
		    {
		    	echo "System error! Fail to remove this friend! Try again later" . $e->getMessage();
		    }
		}
		function GetFriends($username){
			$query=$this->link->prepare("SELECT followed FROM friends WHERE follower='$username'");
			$query->execute();
			$allFriends=$query->fetchAll();
			return $allFriends;
		}
	}
?>