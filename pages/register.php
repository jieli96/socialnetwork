<?php

$con = mysqli_connect("localhost", "root", "", "social");

// überprüft ob error hat
if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

// varriablen deklarieren
$fname = ""; // first name 
$lname = ""; // last name
$mail = ""; // email
$mail2 = ""; // confirm email 
$passwd = ""; // password
$passwd2 = ""; // confirm password
$date = ""; // Sign up date
$error_array = ""; // Holds error messages


// mit \$con verbindet man der Datenbank 
//$query = mysqli_query($con, "insert into test values (null,'Stjepan');");

if (isset($_POST['register_button'])) {

    // Registration form values
    $fname = strip_tags($_POST['reg_fname']); //Removee html tags
    $fname = str_replace('', '', $fname); // remove spaces
    $fanme = ucfirst(strtolower($fname)); // Uppercase first letter
}
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
        <br>
        <input type="submit" name="register_button" value="Register">
    </form>


</body>

</html>