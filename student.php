<!Doctype>
<html>
<head>

<style>
.form{
text-align:center;
background-color:yellowgreen;
	width:40%;
	margin-left:450px;
	margin-top:30px;
	border-radius:10px;
}

</style>


</head>


<body>
<form method ="post">
<div class ="form">

<h3>Student Registration form</h3><br><hr>
<label for ="name">Name</label><br><br>
<input type ="text" name ="name"><br><br>

<label for ="email">Email</label><br><br>
<input type ="email" name ="email"><br><br>

<label for ="password">Password</label><br><br>
<input type ="password" name ="password"><br><br>

<label for ="roll_no" >Roll No</label><br><br>
<input type ="number" name ="roll_no"><br><br>

<label for ="class">Class</label><br><br>
<input type ="number" name ="class"><br><br>

<label for="section">Section</label><br><br>
<input type="password" name ="section"><br><br>

<input type ="submit" name ="submit">

<div>

</form>
</body>


</html>

<?php

$conn = new mysqli("localhost","root","","crud");
if($conn){
	if(isset($_POST['submit'])){
		
		$name =$_POST['name'];
		$email =$_POST['email'];
		$password =$_POST['password'];
		$roll_no = $_POST['roll_no'];
		$class =$_POST['class'];
		$section =$_POST['section'];
		
				
	    
		
		$sql = 'INSERT INTO admin (name,email,password,rollno,class,section) VALUES ("'.$name.'","'.$email.'","'.$password.'","'.$roll_no.'","'.$class.'","'.$section.'")';
      	if(mysqli_query($conn,$sql)){
			echo "Record Inserted successfully";		
		} 
		else{
			echo "Could not inserted".mysqli_error($conn);
		}
       		
 
	}
	
	
}else{
	echo "Connection error";
	
	
}





?>
