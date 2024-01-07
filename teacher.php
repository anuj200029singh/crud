<!Doctype>
<html>

<head>
<style>
.form{
	
	text-align:center;
	background-color:yellowgreen;
	width:40%;
	margin-left:450px;
	margin-top:100px;
	border-radius:10px;
	
}

</style>
</head>

<body>

<form method="post">
<div class ="form">

<h3>Teacher Registration Form </h3><hr>
Name:<input type ="text" name ="name"><br><br><br>
Email:<input type ="email" name ="email"><br><br><br>
Password:<input type ="password" name ="password"><br><br><br>
TeacherId:<input type ="password" name ="teacherid"><br><br><br>
Subject:<input type ="text" name ="subject"><br><br><br>
<input type ="submit" name="submit">

</div>

</form>

</body>

</html>

<?php

$conn = new mysqli("localhost","root","","crud");

if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$teacherid =$_POST['teacherid'];
	$subject = $_POST['subject'];

$sql = 'INSERT INTO admin(name,email,password,teacherid,subject) VALUES("'.$name.'","'.$email.'","'.$password.'","'.$teacherid.'","'.$subject.'")';	
	
	if(mysqli_query($conn,$sql)){
		echo "Data inserted successfully";
	}else{
		echo"Connection errro".mysqli_error($conn);
		
	}
	
	
}else{
	echo "Data not inserted successfully";
}

?>
