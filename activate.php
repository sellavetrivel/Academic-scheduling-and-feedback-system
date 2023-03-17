<?php
session_start();
include "dbcon.php";

if (isset($_GET['token'])) {
    $mytoken = $_GET['token'];
    $updatestatus = "Active";
    $updatesql = "Select *from Studentdata WHERE token='" . $mytoken . "'";
    // echo $mytoken;
    $res = mysqli_query($con, $updatesql);
    if ($res) {
        if (isset($_SESSION['activation'])) {
            $_SESSION['activation'] = "Account verified Successfully";
            header('location:StudentLogin.php');
        } else {
            $_SESSION['activation'] = "You are logged out.";
            header('location:StudentLogin.php');
        }
    } else {
        $_SESSION['activation'] = "Your account not verified Try again.";
        header("location:Studentreg.php");
    }
}
