<?php

session_start();

include "config/database.php";

$error="";

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query=" SELECT * FROM users  WHERE username='$username' AND password='$password' ";
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
    $user=mysqli_fetch_assoc($result);
    $_SESSION['username']=$user['username'];
    $_SESSION['role']=$user['role'];

header("Location: dashboard.php");
exit();

}else{
    $error="Invalid username or password"; 
    }
} ?>


<!DOCTYPE html>
<html>
<head>
<title> Inventory System Login </title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
<h3 class="text-center mb-4"> Inventory Login </h3>
<?php if($error){ ?>
<div class="alert alert-danger"> <?php echo $error; ?>  </div>
<?php } ?>

<form method="POST">
    <div class="mb-3">
        <label> Username </label>
            <input type="text" name="username" class="form-control" required>
    </div>
<div class="mb-3">
        <label> Password </label>
            <input type="password" name="password" class="form-control" required>
</div>

<button name="login" class="btn btn-primary w-100"> Login </button>
</form>
</div> </div> </div> </div> </div>

</body>

</html>