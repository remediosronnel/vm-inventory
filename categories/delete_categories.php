<?php

include "../config/database.php";
    $id=$_GET['id'];

$check=mysqli_query($conn, "SELECT * FROM products WHERE category_id=$id" );

if(mysqli_num_rows($check)>0){
    echo "
        <script> alert('Cannot delete. This category is used by products.'); 
            window.location='categories.php';
        </script> ";
exit();
}

    mysqli_query($conn, "DELETE FROM categories WHERE id=$id" );


header("Location: ../categories.php");


?>