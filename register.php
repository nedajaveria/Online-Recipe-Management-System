<?php
include("db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,email,phone,password)
            VALUES('$name','$email','$phone','$password')";

    if(mysqli_query($conn,$sql))
    {
        echo "Registration Successful";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>

<h2>User Registration</h2>

<form method="POST">

Name:
<input type="text" name="name"><br><br>

Email:
<input type="email" name="email"><br><br>

Phone:
<input type="text" name="phone"><br><br>

Password:
<input type="password" name="password"><br><br>

<input type="submit" name="register" value="Register">

</form>

</body>
</html>