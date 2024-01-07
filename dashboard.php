<!Doctype>
<html>

<head>
<link rel ="stylesheet" href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".delete-btn").click(function(event){
    event.preventDefault();   
 let person= prompt("Do you want to delete ?");
 
 if(person!=null){
	 
	 document.getElementById("demo").innerHTML =  " => " +person+ " " +"The Form has been deleted ? " ;
 }
  });
});
</script>




</head>

<body>
<p id="demo"></p>

<h3>Welcome to Dashboard</h3><br><br>



<div class="container my-5">
<h2>Lists of admin</h2>
<a class ="btn btn-primary" href="http://localhost/crud/create.php/" role="button">New admin</a><br>
<table class ="table">
<thead>
<tr>
<td>id</td>
<td>Name</td>
<td>Email</td>
<td>Password</td>
<td>Roll NO</td>
<td>Class</td>
<td>Section</td>
<td>teacherid</td>
<td>subject</td>
</tr>
</thead>

<tbody>

<?php

$servername ="localhost";
$usename ="root";
$password ="";
$dbname="crud";

//Create connection //

$conn = new mysqli($servername ,$usename,$password ,$dbname);

//Check connection //
if($conn->connect_error){
	die("connection failed:".$conn->connect_error);
}
// Read all row from the database table //

$sql = "SELECT * FROM  admin ";
$result = $conn->query($sql);
if(!$result){
	die("Invalid Query:".$connection_error);
	
}
//Read data of each row //

while($row=$result->fetch_assoc()){
	
	echo"<tr>
<td>$row[id]</td>
<td>$row[name]</td>
<td>$row[email]</td>
<td>$row[password]</td>
<td>$row[rollno]</td>
<td>$row[class]</td>
<td>$row[section]</td>
<td>$row[teacherid]</td>
<td>$row[subject]</td>
<td>
<a class ='btn btn-primary btn-sm' href='http://localhost/crud/edit.php/?id=$row[id]'>Edit</a>
<a class = 'btn btn-danger btn-sm delete-btn' href='http://localhost/crud/delete.php/?id=$row[id]'>Delete</a>


</td>


</tr> ";
}


?>




</tbody>
</table>


</div>


</body>

</html>