<?php
include "config/database.php";
include "includes/header.php";
include "includes/sidebar.php";

$result = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");





?>

<div class="content">
    <h2 class="mb-4">Categories</h2>
        <a href="categories/add_categories.php" class="btn btn-primary mb-3"> + Add Category </a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th width="200">Action</th>
        </tr>
    </thead>
<tbody>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td> <?= $row['id']; ?> </td>
            <td> <?= $row['category_name']; ?> </td>
            <td> <a href="categories/edit_categories.php?id=<?= $row['id']; ?>"  class="btn btn-warning btn-sm"> Edit </a> 
                <a href="categories/delete_categories.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this category?')" class="btn btn-danger btn-sm"> Delete </a> </td>
        </tr>
<?php } ?>
</tbody>
</table>
</div>
<?php include "includes/footer.php"; ?>