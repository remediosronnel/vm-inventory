<?php

include "../includes/session.php";
    checkLogin();
include "../config/database.php";

if(isset($_POST['save'])){
    $product=$_POST['product'];
    $type=$_POST['type'];
    $quantity=$_POST['quantity'];

mysqli_query($conn, " INSERT INTO transactions (product_id,transaction_type,quantity) VALUES ('$product','$type','$quantity') " );

if($type=="IN"){
    mysqli_query($conn, " UPDATE products SET quantity = quantity + $quantity WHERE id=$product " );
} else{
    mysqli_query($conn, " UPDATE products SET quantity = quantity - $quantity WHERE id=$product " );
}

header("Location:../transactions.php");  } ?>

<!DOCTYPE html>
<html>
<head>
<title> Add Transaction </title>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2> New Inventory Transaction </h2>

<form method="POST">
    <label> Product </label>
        <select name="product" class="form-control mb-3">
            <option> Select Product </option>
                <?php $products=mysqli_query($conn, "SELECT * FROM products");
                    while($p=mysqli_fetch_assoc($products)){
                        echo " <option value='".$p['id']."'> ".$p['product_name']." (Current Stock: ".$p['quantity'].") </option> ";} ?>
        </select>
    <label> Transaction Type </label>
        <select  name="type" class="form-control mb-3">
            <option value="IN"> Stock IN </option>
            <option value="OUT"> Stock OUT </option>
        </select>

    <label> Quantity </label>
    <input type="number" name="quantity" class="form-control mb-3" required> 
    <button name="save" class="btn btn-success"> Save Transaction </button>
    <a href="../transactions.php" class="btn btn-secondary">  Cancel  </a>  
</form>
</div>
</body>
</html>