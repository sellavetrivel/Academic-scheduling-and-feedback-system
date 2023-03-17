<?php
require('dbcon.php');
$id = $_REQUEST['id'];
$query = "DELETE FROM Staff WHERE Staffid=$id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
header("Location: staffview.php");
