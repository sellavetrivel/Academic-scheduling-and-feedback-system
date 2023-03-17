<?php
require('dbcon.php');
$id = $_REQUEST['id'];
$query = "DELETE FROM Studentdata WHERE Sid=$id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
header("Location: studentview.php");
