<?php

include "includes/session.php";
    checkLogin();
include "config/database.php";

$query = " SELECT  products.*, categories.category_name, suppliers.supplier_name 
FROM products
LEFT JOIN categories
ON products.category_id = categories.id
LEFT JOIN suppliers
ON products.supplier_id = suppliers.id ";

$result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html>
<head>
<title> Products    </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h2> Product Management </h2>
                <a href="products/add_product.php" class="btn btn-primary shadow">
                    <i class="bi bi-plus-circle"></i> Add Product 
                </a>
        </div>
            <hr>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['product_name']; ?> </td>
            <td> <?php echo $row['category_name']; ?>   </td>
            <td> <?php echo $row['supplier_name']; ?> </td>
            <td> <?php echo $row['quantity']; ?> </td>
            <td> ₱<?php echo number_format($row['price'],2); ?> </td>
            <td> <a href="products/edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"> Edit </a>
                <a  href="products/delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')"> Delete </a> </td>
        </tr> <?php } ?>
    </tbody>
</table>
    <a href="dashboard.php" class="btn btn-secondary"> Back Dashboard </a>
</div>
</body>
</html>