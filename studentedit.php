<?php
require('dbcon.php');

$id = $_REQUEST['id'];
$query = "SELECT * from studentdata where Sid='" . $id . "'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form">
        <p><a href="admin.php">Dashboard</a>
            | <a href="Studentreg.php">Add New Student</a>
            | <a href="adminlogout.php">Logout</a></p>
        <h1>Update Record</h1>
        <?php
        $status = "";
        if (isset($_POST['new']) && $_POST['new'] == 1) {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $phone = $_REQUEST['phone'];
            $pass = $_REQUEST['pass'];
            $branch = $_REQUEST['branch'];
            $update = "update studentdata set StudentName='" . $name . "',
StudentPassword='" . $pass . "', Phone='" . $phone . "',Branch='" . $branch . "' where Sid='" . $id . "'";
            mysqli_query($con, $update) or die(mysqli_error($con));
            $status = "Record Updated Successfully. </br></br>
<a href='studentview.php'>View Updated Record</a>";
            echo '<p style="color:#FF0000;">' . $status . '</p>';
        } else {
        ?>
            <div>
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $row['Sid']; ?>" />
                    <p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['StudentName']; ?>" /></p>
                    <p><input type="text" name="phone" placeholder="Enter Phone  number" required value="<?php echo $row['Phone']; ?>" /></p>
                    <p><input type="text" name="pass" placeholder="Enter Password" required value="<?php echo $row['StudentPassword']; ?>" /></p>
                    <p><input type="text" name="branch" placeholder="Enter branch" required value="<?php echo $row['Branch']; ?>" /></p>


                    <p><input name="submit" type="submit" value="Update" /></p>
                </form>
            <?php } ?>
            </div>
    </div>
</body>

</html>