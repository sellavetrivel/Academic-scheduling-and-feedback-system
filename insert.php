<?php
include 'dbcon.php';
session_start();
if (isset($_POST['btnsubmit'])) {
  $txtname = $_POST['username'];
  $txtemail = $_POST['email'];
  $txtmobile = $_POST['phone-number'];
  $txtpass = $_POST['password'];
  $txtbranch = $_POST['branch'];
  $token = bin2hex(random_bytes(15));
  $sql = "INSERT INTO `studentdata`(`StudentName`, `StudentEmail`, `StudentPassword`, `Phone`, `Branch`,`token`) 
  VALUES  ('$txtname','$txtemail','$txtpass','$txtmobile','$txtbranch','$token')";
  if (mysqli_query($con, $sql)) {

    $subject = "Email Activation For Login";
    $body = "Hi,$txtname. Click here to activate your account
    http://localhost/Project1/activate.php?token=$token";
    //Sender Email address type y  our email address 
    $headers = "From: sender134@gmail.com";

    if (mail($txtemail, $subject, $body, $headers)) {
      $_SESSION['activation'] = "Check your email to activate your account $txtemail";
      header('location:StudentLogin.php');
    } else {
      echo "Email sending failed...";
    }
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($con);
  }
  mysqli_close($con);
}
