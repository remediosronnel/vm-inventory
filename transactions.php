<?php
include "includes/session.php";
        checkLogin();
include "config/database.php";

$query = mysqli_query($conn, " SELECT  transactions.*, products.product_name 
    FROM transactions
    LEFT JOIN products
    ON transactions.product_id = products.id
    ORDER BY transactions.id DESC "  );
?>

<!DOCTYPE html>
<html>
<head>
<title> Inventory Transactions </title>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h2> Inventory Transactions </h2>
                <a href="transaction/add_transaction.php" class="btn btn-primary"> + New Transaction </a> 
        </div>  <hr>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
    </thead>
<tbody> <?php while($row=mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['product_name']; ?>  </td>
            <td>  <?php 
                        if($row['transaction_type']=="IN"){
                            echo "<span class='badge bg-success'>STOCK IN</span>";
                        }else{
                            echo "<span class='badge bg-danger'>STOCK OUT</span>";
                        } ?></td>
            <td> <?php echo $row['quantity']; ?> </td>
            <td> <?php echo $row['transaction_date']; ?> </td>
        </tr> <?php } ?>
</tbody>
</table>
    <a href="dashboard.php" class="btn btn-secondary"> Back Dashboard </a>
    </div>
</body>

</html>