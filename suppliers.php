<?php
include "includes/session.php";
    checkLogin();
include "config/database.php";
$query = mysqli_query($conn, "SELECT * FROM suppliers" );

?>


<!DOCTYPE html>
<html>
<head>
<title> Supplier Management </title>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h2> Supplier Management </h2>
                <a href="suppliers/add_supplier.php" class="btn btn-primary"> + Add Supplier </a>
        </div>
    <hr>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Supplier Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['supplier_name']; ?> </td> 
            <td> <?php echo $row['contact']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <a href="suppliers/edit_supplier.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"> Edit </a>
                 <a href="suppliers/delete_supplier.php?id=<?php echo $row['id']; ?>"class="btn btn-danger btn-sm" onclick="return confirm('Delete supplier?')"> Delete </a> </td>
        </tr> <?php } ?>
</tbody>
</table>
                <a href="dashboard.php" class="btn btn-secondary"> Back Dashboard </a>
    </div>
</body>

</html>