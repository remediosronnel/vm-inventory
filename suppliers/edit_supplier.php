<?php
include "../includes/session.php";
    checkLogin();
include "../config/database.php";
    $id=$_GET['id'];
    $result=mysqli_query($conn, "SELECT * FROM suppliers WHERE id=$id" );
    $supplier=mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $name=$_POST['supplier_name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    mysqli_query($conn, "UPDATE suppliers SET supplier_name='$name', contact='$contact', email='$email' 
    WHERE id=$id" );
header("Location:../suppliers.php"); }
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Supplier</title>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>  Edit Supplier </h2>
<form method="POST">
    <input name="supplier_name" value="<?php echo $supplier['supplier_name']; ?>" class="form-control mb-3">
    <input name="contact" value="<?php echo $supplier['contact']; ?>" class="form-control mb-3"> 
    <input name="email"  value="<?php echo $supplier['email']; ?>" class="form-control mb-3">
    <button name="update"  class="btn btn-primary">  Update  </button>
</form>
</div>
</body>
</html>