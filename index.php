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
    <title>MyBook</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h1>Hello</h1>
</body>

</html>