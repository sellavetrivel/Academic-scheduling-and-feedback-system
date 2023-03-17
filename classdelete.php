<?php
require('dbcon.php');
$id = $_REQUEST['id'];
$query = "DELETE FROM class WHERE Classid=$id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
header("Location: Updatetimeview.php");
