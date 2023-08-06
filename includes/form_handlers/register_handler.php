<?php

// varriablen deklarieren
$fname = ""; // first name 
$lname = ""; // last name
$mail = ""; // email
$mail2 = ""; // confirm email 
$passwd = ""; // password
$passwd2 = ""; // confirm password
$date = ""; // Sign up date
$error_array = array(); // Holds error messages



// mit \$con verbindet man der Datenbank 
//$query = mysqli_query($con, "insert into test values (null,'Stjepan');");

if (isset($_POST['register_button'])) {

    // Registration form values

    // first name
    $fname = strip_tags($_POST['reg_fname']); //Removee html tags
    $fname = str_replace(' ', '', $fname); // remove spaces

    $fname = ucfirst(strtolower($fname)); // Uppercase first letter
    $_SESSION['reg_fname'] = $fname; // Stores first name into session variable

    //last name
    $lname = strip_tags($_POST['reg_lname']); //Removee html tags
    $lname = str_replace('', '', $lname); // remove spaces
    $lname = ucfirst(strtolower($lname)); // Uppercase first letter
    $_SESSION['reg_lname'] = $lname; // Stores last name into session variable

    // email
    $mail = strip_tags($_POST['reg_email']); //Removee html tags
    $mail = str_replace('', '', $mail); // remove spaces
    $mail = ucfirst(strtolower($mail)); // Uppercase first letter
    $_SESSION['reg_email'] = $mail; // Stores email name into session variable

    // confirm email
    $mail2 = strip_tags($_POST['reg_email2']); //Removee html tags
    $mail2 = str_replace('', '', $mail2); // remove spaces
    $mail2 = ucfirst(strtolower($mail2)); // Uppercase first letter
    $_SESSION['reg_email2'] = $mail2; // Store email into session variable

    // password
    $passwd = strip_tags($_POST['reg_password']); //Removee html tags
    //$passwd = str_replace('', '', $passwd); // remove spaces
    //$passwd = ucfirst(strtolower($passwd)); // Uppercase first letter

    // confirm password
    $passwd2 = strip_tags($_POST['reg_password2']); //Removee html tags
    //$passwd2 = str_replace('', '', $passwd2); // remove spaces
    // $passwd2 = ucfirst(strtolower($passwd2)); // Uppercase first letter

    // date
    $date = date("Y-m-d"); // shows the current date

    if ($mail == $mail2) {
        // check if email is in calid format
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mail =  filter_var($mail, FILTER_VALIDATE_EMAIL);

            // check if mail already exists or not

            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$mail'");

            // Count the number of rows returned
            $num_rows = mysqli_num_rows($e_check);

            if ($num_rows > 0) {
                array_push($error_array, "Email already used <br>");
            }
        } else {
            array_push($error_array, "Invalid email format <br>");
        }
        // check
    } else {
        array_push($error_array, "Emails is not the same");
    }

    if (strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, "your firstname has to be between 2 and 25 characters");
    }

    if (strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, "your lastname has to be between 2 and 25 characters");
    }
    if ($passwd != $passwd2) {
        array_push($error_array, "Your passwords do not match<br>");
    } else if (preg_match('/[^A-Za-z0-9]/', $passwd)) {

        array_push($error_array, "Your password can only contain english characters or numbers<br>");
    }


    if (strlen($passwd) > 30 || strlen($passwd < 5)) {
        array_push($error_array, "Your password must be between 5 and 30 characters<br>");
    }

    if (empty($error_array)) {
        $passwd = md5($passwd); // Encrypt password before sending to database 
        $username = strtolower($fname . '_' . $lname); // Generate username by concatenating first name and last name
        $check_username_query = mysqli_query($con, "SELECT username from users where username = '$username';");
        $new_username = $username;
        $i = 0;
        // if username exists add number to username

        while (mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $new_username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username from users where username = '$new_username';");
        }
        $username = $new_username;
        // Profile picture assignment
        $rand = rand(1, 2);

        if ($rand == 1) {
            $profile_pic = "assets/profil_pics/defaults/head_deep_blue.png";
        } else if ($rand == 2) {
            $profile_pic = "assets/profil_pics/defaults/head_emerald.png";
        }
        $query = mysqli_query($con, "INSERT into users values (null,'$fname','$lname','$username','$mail','$passwd','$date','$profile_pic',0,0,'no',',');");



        array_push($error_array, "<span style='color:#14C800;'>You're all set! Go ahead and login!</span><br>");

        //Clear session variables
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";
    }
}
