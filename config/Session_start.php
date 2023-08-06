<?php
ob_start();  //Turns on out buffering
session_start();

$timezone= date_default_timezone_set("Europe/Zurich");
$con = mysqli_connect("localhost", "root", "", "social");

// überprüft ob error hat
if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}
