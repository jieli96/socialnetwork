<?php
require "../config/Session_start.php";
require "../includes/form_handlers/register_handler.php";
/*
session_start();
$con = mysqli_connect("localhost", "root", "", "social");

// überprüft ob error hat
if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}
*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Swirlfeed</title>
</head>

<body>
    <div>
        <form action="register.php" method="POST">
            <input type="text" name="reg_fname" placeholder="First Name" value="<?php
                                                                                if (isset($_SESSION['reg_fname'])) {
                                                                                    echo $_SESSION['reg_fname'];
                                                                                }
                                                                                ?>" required>
            <br>
            <?php if (in_array("your firstname has to be between 2 and 25 characters", $error_array)) echo "your firstname has to be between 2 and 25 characters <br>"; ?>
            <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
                                                                                if (isset($_SESSION['reg_lname'])) {
                                                                                    echo $_SESSION['reg_lname'];
                                                                                }
                                                                                ?>" required>
            <br>
            <?php if (in_array("your lastname has to be between 2 and 25 characters", $error_array)) echo "your lastname has to be between 2 and 25 characters <br>"; ?>

            <input type="email" name="reg_email" placeholder="Email" value="<?php
                                                                            if (isset($_SESSION['reg_email'])) {
                                                                                echo $_SESSION['reg_email'];
                                                                            }
                                                                            ?>" required>

            <br>

            <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
                                                                                        if (isset($_SESSION['reg_email2'])) {
                                                                                            echo $_SESSION['reg_email2'];
                                                                                        }
                                                                                        ?>" required>
            <br>
            <?php if (in_array("Emails is not the same", $error_array)) echo "Emails is not the same <br>";
            else if (in_array("Email already used <br>", $error_array)) echo "Email already used <br>";
            else if (in_array("Invalid email format <br>", $error_array)) echo "Invalid email format <br>";
            ?>
            <input type="password" name="reg_password" placeholder="Password" required>
            <br>
            <input type="password" name="reg_password2" placeholder="Confirm Password" required>

            <br>
            <?php if (in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
            else if (in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
            else if (in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo "Your password must be between 5 and 30 characters<br>";
            ?>
            <input type="submit" name="register_button" value="Register">
            <br>
            <?php if (in_array("<span style='color:#14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color:#14C800;'>You're all set! Go ahead and login!</span><br>";   ?>

        </form>
    </div>


</body>

</html>