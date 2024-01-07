<!Doctype>
<html>

<head>
<style>
.login{
	text-align:center;
	background-color:skyblue;
	width:30%;
	margin-left:500px;
	margin-top:100px;
	border-radius:10px;
	
}


</style>

</head>

<body>

<form method = "post">
<div class="login">
<h3>Teacher Login form</h3><hr><br>
<label for="email">Email</label><br>
<input ttype ="email" name ="email"><br><br>

<label for ="password">Password</label><br><br>
<input type ="password" name ="password"><br><br>

<input type ="submit" name ="submit">

</div>

</form>
</body>

</html>

<?php

session_start();

if(isset($_POST['submit'])){
$host="localhost";
$user ="root";
$pass="";
$db="crud";

    $email = $_POST['email'];
	   $password = $_POST['password'];

	$conn =new mysqli($host,$user,$pass,$db);
     
	   
	   $sql ="SELECT * FROM admin WHERE email ='$email' AND password ='$password'";
	   $result =$conn->query($sql);
	   
	
	 
	 if(mysqli_num_rows($result)>=1){
$_SESSION['auth']='true' ;

echo "You are logged in " ;
header ("Location:");
exit();
}
	   
     
	 else{
		 echo "Connection error";
		 
	 }
  
 
 }
?>