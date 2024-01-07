<?php 

$name = "";
$email = "";
$password = "";

$errorMessage = "";
$successMessage ="";

$connection = new mysqli("localhost","root","","crud");

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$name = $_POST['name'];
	$email= $_POST['email'];
	$password =$_POST['password'];
	
	do{
		if(empty($name)||empty($email)||empty($password)){
			$errorMessage = "All the fields are required";
			break;
		} 	
		
		
		
		//Add new clients to  database//
		
		$sql ='INSERT INTO admin(name,email,password) VALUES("'.$name.'","'.$email.'","'.$password.'")';
		
		
		
		$result= $connection->query($sql);
		
		print_r($result);
		
    if(!$result){
		$errorMessage="Invalid query:" .$connection->error;
		break;
		
	}
		
	$name = "";
    $email = "";
   $password ="";
	
	$successMessage = "Client added successfully";
	
	header("location:http://localhost/crud/dashboard.php/create.php");
	exit();
	
	
}while(false);


}


?>






<!Doctype>
<html>
<head>
<link rel ="stylesheet" href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

<div class ="container my-5">
<h2>New Admin</h2>

<?php
if(!empty($errorMessage)){
	
	echo "<strong>$errorMessage</strong>";
	
}

?>


<form method="post">

<div class ="row mb-3">
<label class ="col-sm-3 col-form-label">Name</label>
<div class ="col sm-6">
<input type ="text" class ="form-contral" name="name" value ="<?php echo $name; ?>"	>
</div>
</div>

<div class ="row mb-3">
<label class ="col-sm-3 col-form-label">Email</label>
<div class ="col sm-6">
<input type ="email" class ="form-contral" name="email" value ="<?php echo $email; ?>">
</div>
</div>

<div class ="row mb-3">
<label class ="col-sm-3 col-form-label">Password</label>
<div class ="col sm-6">
<input type ="password" class ="form-contral" name="password" value ="<?php echo $password; ?>"	>
</div>
</div>
 
 
 <?php
 if(!empty($successMessage)){
	 echo "<strong>$successMessage</strong>";
	 
	  
 }
 
 
 ?>
 
 
 
<div class ="row mb-3">
<div class = "offset-sm-3 col-sm-3 d-grid">
<button type ="submit" class ="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
<a class ="btn btn-outline-primary" href="http://localhost/crud/dashboard.php/create.php" role ="button">Cancel</a>
</div>

</form>

</div>



</body>

</html>


