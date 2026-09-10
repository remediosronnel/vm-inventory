<div class="sidebar p-3">

<h4 class="text-center mb-4">
IMS System
</h4>

<a href="/dashboard.php" class="nav-link text-white">
🏠 Dashboard
</a>

<a href="/categories/categories.php" class="nav-link text-white">
🗂 Categories
</a>

<a href="/products.php" class="nav-link text-white">
📦 Products
</a>

<a href="/suppliers.php" class="nav-link text-white">
🚚 Suppliers
</a>

<a href="/transactions.php" class="nav-link text-white">
📊 Transactions
</a>

<hr>

<p>
User:
<strong>
<?php echo $_SESSION['username']; ?>
</strong>
</p>

<a href="/logout.php" class="btn btn-danger w-100">
Logout
</a>

</div>