<?php

$con = mysqli_connect("localhost", "root", "", "social");

// überprüft ob error hat
if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

// mit \$con verbindet man der Datenbank 
$query = mysqli_query($con, "insert into test values (null,'Stjepan');");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Swirlfeed</title>
</head>

<body>
    <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" required>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" required>
        <br>
        <input type="email" name="reg_email" placeholder="Email" required>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>

        <input type="submit" name="register_button" value="Register">
    </form>


</body>

</html>