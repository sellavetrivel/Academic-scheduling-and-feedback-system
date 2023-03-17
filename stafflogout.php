<?php
session_start();
unset($_SESSION['staffname']);
header('location:StaffSignin.php');
