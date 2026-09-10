<?php

include "../includes/session.php";
    checkLogin();
include "../config/database.php";

$error = "";

if(isset($_POST['save'])){
    $product = $_POST['product_name'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

   if($category == "" || $supplier == ""){
        $error = "Please select category and supplier.";
    } else { 
        $query = " INSERT INTO products ( product_name, category_id, supplier_id, quantity, price )
            VALUES ( '$product', '$category', '$supplier', '$quantity', '$price' ) ";
        if(mysqli_query($conn,$query)){
            header("Location: ../products.php");
            exit();
        } else { 
            $error = "Database Error: " . mysqli_error($conn); 
        }
    }
} ?>


<!DOCTYPE html>
<html>
<head>
<title> Add Product </title>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3> Add Product </h3>
            </div>
    <div class="card-body">
            <?php if($error!=""){ ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div> <?php } ?>

<form method="POST">
    <label> Product Name </label>
        <input type="text" name="product_name" class="form-control mb-3" required> 
    <label> Category </label> 
<select name="category" class="form-control mb-3" required> 
    <option value=""> Select Category </option>
        <?php  $categories=mysqli_query( $conn, "SELECT * FROM categories" );
            while($c=mysqli_fetch_assoc($categories)){ ?>
    <option value="<?php echo $c['id']; ?>">
        <?php echo $c['category_name']; ?>  </option>
            <?php } ?>
</select>
    <label> Supplier </label>
<select name="supplier" class="form-control mb-3" required> 
    <option value=""> Select Supplier  </option>
        <?php $suppliers=mysqli_query( $conn, "SELECT * FROM suppliers"  );
    while($s=mysqli_fetch_assoc($suppliers)){  ?>
    <option value="<?php echo $s['id']; ?>">
        <?php echo $s['supplier_name']; ?> </option> 
            <?php } ?>
</select>
<label> Quantity </label>
    <input type="number" name="quantity" class="form-control mb-3" min="0" required>
<label> Price </label>
    <input type="number"  name="price"  class="form-control mb-3" step="0.01"  min="0"  required>  
<button  name="save" class="btn btn-success"> Save Product  </button>
<a href="../products.php" class="btn btn-secondary">  Cancel  </a>

</form>
</div>
</div>
</div>
</body>
</html>