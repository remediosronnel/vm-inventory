<?php
include "../includes/session.php";
    checkLogin();
include "../config/database.php";
    $id = $_GET['id'];
    $data = mysqli_query( $conn, "SELECT * FROM products WHERE id=$id"  );
    $product = mysqli_fetch_assoc($data);

if(!$product){
    die("Product not found");  }

if(isset($_POST['update'])){
    $name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $query = "  UPDATE products SET  product_name='$name', quantity='$quantity',  price='$price'  WHERE id=$id ";
    if(mysqli_query($conn,$query)){
        header("Location: ../products.php");  
        exit();  }
} ?>

<!DOCTYPE html>
<html>
<head>
<title> Edit Product </title>

<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning">
                    <h3> Edit Product  </h3>
            </div>
                <div class="card-body">
<form method="POST">
    <label> Product Name </label>
        <input type="text"  name="product_name"  class="form-control mb-3"  value="<?php echo $product['product_name']; ?>" equired>
    <label> Quantity  </label>
        <input type="number" name="quantity" class="form-control mb-3"  value="<?php echo $product['quantity']; ?>" required>
    <label> Price  </label>
        <input type="number" step="0.01"  name="price" class="form-control mb-3" value="<?php echo $product['price']; ?>" required>
    <button name="update" class="btn btn-primary"> Update Product </button>
    <a href="../products.php" class="btn btn-secondary"> Cancel </a>
</form>
</div>
</div>
</div>
</body>
</html>