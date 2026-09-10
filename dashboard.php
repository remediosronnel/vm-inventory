<?php
include "includes/session.php";
checkLogin();
include "config/database.php";

$productQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products" ); 
$productCount = mysqli_fetch_assoc($productQuery)['total'];
$categoryQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM categories" );
$categoryCount = mysqli_fetch_assoc($categoryQuery)['total'];
$supplierQuery = mysqli_query( $conn, "SELECT COUNT(*) AS total FROM suppliers"   );
$supplierCount = mysqli_fetch_assoc($supplierQuery)['total'];
$valueQuery = mysqli_query($conn, "SELECT SUM(quantity * price) AS total FROM products" );
$inventoryValue = mysqli_fetch_assoc($valueQuery)['total'] ?? 0;

$lowStockQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products WHERE quantity <= 5 " );
$lowStock = mysqli_fetch_assoc($lowStockQuery)['total'];
$recentTransactions = mysqli_query( $conn, " SELECT transactions.*, products.product_name FROM transactions 
LEFT JOIN products
ON transactions.product_id = products.id
ORDER BY transaction_date DESC LIMIT 5 ");
$lowProducts = mysqli_query( $conn, " SELECT * FROM products WHERE quantity <= 5 " );

include "includes/header.php";
include "includes/sidebar.php";
?>


<div class="content">
    <h2 class="mb-3"> Inventory Dashboard   </h2>
    <p>Welcome,<strong> <?php echo $_SESSION['username']; ?> </strong> </p>
    <hr>

<div class="row g-4">
<div class="col-md-3">
<div class="card shadow p-3">
    <h5 class="text-primary"> Products  </h5> 
        <h2> <?php echo $productCount; ?>  </h2>
            <p class="text-muted">  Total Items  </p>

</div>
</div>

<div class="col-md-3">
<div class="card shadow p-3">  <h5 class="text-success">  Categories  </h5>
    <h2> <?php echo $categoryCount; ?>  </h2>
        <p class="text-muted">  Product Categories  </p>
</div>
</div>

<div class="col-md-3">  
<div class="card shadow p-3">
    <h5 class="text-warning">   Suppliers   </h5>   
        <h2><?php echo $supplierCount; ?> </h2>
            <p class="text-muted">  Registered Suppliers    </p>
</div>
</div>
<div class="col-md-3">
<div class="card shadow p-3">
    <h5 class="text-danger">    Low Stock   </h5>
        <h2><?php echo $lowStock; ?></h2>
            <p class="text-muted">  Items needing attention </p>
</div>
</div>
</div>  <br>


<div class="card shadow">
<div class="card-body">
    <h5>    Total Inventory Value   </h5>
        <h2 class="text-success">   ₱<?php echo number_format($inventoryValue,2); ?>    </h2>
</div>
</div>


<div class="card shadow mt-4">
<div class="card-header">   Recent Transactions </div>
<div class="card-body">
<table class="table">
    <tr>
        <th>Product</th>
        <th>Type</th>
        <th>Quantity</th>
        <th>Date</th>

    </tr>
<?php while($row=mysqli_fetch_assoc($recentTransactions)){ ?>
    <tr>
    <td><?php echo $row['product_name']; ?></td>
    <td><?php if($row['transaction_type']=="IN"){ echo "<span class='badge bg-success'>IN</span>"; }
            else{ echo "<span class='badge bg-danger'>OUT</span>";  }   ?>  </td>
    <td><?php echo $row['quantity']; ?> </td>
    <td><?php echo $row['transaction_date']; ?> </td>
    </tr> <?php } ?>
</table>
</div>
</div>


<div class="card shadow mt-4">
<div class="card-header bg-danger text-white">  Low Stock Alert </div>
<div class="card-body">
    <table class="table">
        <tr>
            <th>Product</th>
            <th>Remaining</th>
        </tr><?php while($row=mysqli_fetch_assoc($lowProducts)){ ?> <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td> <span class="badge bg-danger">
                     <?php echo $row['quantity']; ?>
                     </span>
                </td>
            </tr> <?php } ?>

    </table>    </div>    </div>


<div class="card shadow mt-4">
<div class="card-header"> Quick Actions </div>
<div class="card-body">
    <a href="products.php"
        class="btn btn-primary me-2">
            📦 Manage Products
    </a>
    <a href="suppliers.php"
        class="btn btn-success me-2">
            🚚 Manage Suppliers
    </a>
    <a href="transactions.php"
        class="btn btn-warning">
            📊 Inventory Transactions
    </a>
</div>
</div>
</div>
<?php
include "includes/footer.php";
?>
