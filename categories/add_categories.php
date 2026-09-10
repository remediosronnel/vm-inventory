<?php

include "../config/database.php";

if(isset($_POST['save'])){ 
    $category_name = $_POST['category_name'];

    $query = "INSERT INTO categories(category_name)
              VALUES('$category_name')";

    mysqli_query($conn,$query);

    header("Location: ../categories.php");
    exit();
}


include "../includes/header.php";
include "../includes/sidebar.php";
?>


<div class="content">
    <h2>Add Category</h2>

<form method="POST">
    <div class="mb-3">
        <label> Category Name </label>
        <input type="text" name="category_name" class="form-control" required>
    </div>
        <button class="btn btn-success" name="save"> Save Category </button>
        <a href="../categories.php" class="btn btn-secondary"> Back </a>
</form>
</div>


<?php include "../includes/footer.php"; ?>