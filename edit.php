


<?php 

// Database connection //

$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GET METHOD SHOW THE DATA OF THE ADMIN //

    if (!isset($_GET['id'])) {
        header("location:http://localhost/crud/dashboard.php/create.php");
        exit();
    }

    $id = $_GET["id"];

    // Read the row of the selected admin from the database //

    $sql = "SELECT * FROM admin WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:http://localhost/crud/dashboard.php/create.php");
        exit();
    }

    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
} else {
    // POST method update the data of the admin //
    $id = $_GET["id"];

    // Read the row of the selected admin from the database //

    $sql = "SELECT * FROM admin WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($password)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Validate the column names in the UPDATE clause
        if (!in_array('name', array_keys($row)) || !in_array('email', array_keys($row)) || !in_array('password', array_keys($row))) {
            $errorMessage = "Invalid column names in the UPDATE clause";
            break;
        }

        $sql = "UPDATE admin SET name = '$name', email = '$email', password = '$password' WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }

        $successMessage = "Admin updated successfully";

        header("location:http://localhost/crud/dashboard.php/create.php");
        exit();
    } while (true);
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
<h2> Admin</h2>

<?php
if(!empty($errorMessage)){
	
	echo "<strong>$errorMessage</strong>";	
}

?>

<form method="post">

<input type ="hidden"  name ="id" value ="<?php  echo $id; ?>">



<div class ="row mb-3">
<label class ="col-sm-3 col-form-label">Name</label>
<div class ="col sm-6">
<input type ="text" class ="form-control" name="name" value ="<?php echo $name; ?>"	>
</div>
</div>

<div class ="row mb-3">
<label class ="col-sm-3 col-form-label">Email</label>
<div class ="col sm-6">
<input type ="email" class ="form-control" name="email" value ="<?php echo $email; ?>">
</div>
</div>

<div class ="row mb-3">
<label class ="col-sm-3 col-form-label">Password</label>
<div class ="col sm-6">
<input type ="password" class ="form-control" name="password" value ="<?php echo $password; ?>"	>
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

