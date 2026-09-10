<?php
include "../includes/session.php";
    checkLogin();
include "../config/database.php";
if(isset($_POST['save'])){
    $name=$_POST['supplier_name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
mysqli_query($conn, "INSERT INTO suppliers (supplier_name,contact,email) VALUES ('$name','$contact','$email')" );
header("Location:../suppliers.php");
} ?>

<!DOCTYPE html>
<html>
<head>
<title>Add Supplier</title>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2> Add Supplier </h2>
<form method="POST">
    <input name="supplier_name" class="form-control mb-3" placeholder="Supplier Name" required> 
    <input name="contact" class="form-control mb-3" placeholder="Contact Number"> 
    <input name="email" class="form-control mb-3" placeholder="Email"> 
    <button name="save" class="btn btn-success"> Save Supplier </button>
    <a href="../suppliers.php" class="btn btn-secondary"> Cancel </a> 
</form>
</div>
</body>
</html>