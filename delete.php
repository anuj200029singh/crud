<?php 
if(isset($_GET['id'])){
	$id= $_GET['id'];
	
	$servername = "localhost";
	$username ="root";
	$password="";
	$database ="crud";
	
	//create connection //
	
	$connection  = new mysqli($servername,$username,$password,$database );
	print_r($connection);
	
	
	$sql = "DELETE  from  admin WHERE id =$id" ;
	$connection->query($sql); 

	
}

header("location:http://localhost/crud/dashboard.php/create.php");
exit;


?>

