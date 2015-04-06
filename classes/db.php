<?php
class dbConnection {
	public $db_conn;
	public $db_name="mybook";
	public $db_user="root";
	public $db_pass="dba";
	public $servername="localhost";

	function connect(){
		try{
			// $db_conn= new PDO("mysql:host=$this->servername;dbname=$this->db_name",$this->db_user,$this->db_pass);  
 		    $db_conn = new PDO("mysql:host=$this->servername;dbname=$this->db_name", $this->db_user, $this->db_pass);
 		    // echo var_dump($db_conn);
		    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully "; 
            return $db_conn;
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}	
}

?>