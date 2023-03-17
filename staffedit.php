<?php
require('dbcon.php');

$id = $_REQUEST['id'];
$query = "SELECT * from staff where Staffid='" . $id . "'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="form mt-5">
        <p><a href="admin.php" class="btn btn-primary">Dashboard</a>
            | <a href="Studentreg.php" class="btn btn-primary">Add New Student</a>
            | <a href="adminlogout.php" class="btn btn-primary">Logout</a></p>
        <h1>Update Record</h1>
        <?php
        $status = "";
        if (isset($_POST['new']) && $_POST['new'] == 1) {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $pass = $_REQUEST['pass'];
            $branch = $_REQUEST['branch'];
            $update = "update staff set StaffName='" . $name . "',
StaffPassword='" . $pass . "',StaffBranch='" . $branch . "' where Staffid='" . $id . "'";
            mysqli_query($con, $update) or die(mysqli_error($con));
            $status = "Record Updated Successfully. </br></br>
<a href='staffview.php'>View Updated Record</a>";
            echo '<p style="color:#FF0000;">' . $status . '</p>';
        } else {
        ?>
            <div class="container-fluid my-5">
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
                    <div class="mb-3 mt-3 w-50">
                        <input name="id" class="form-control" value="<?php echo $row['Staffid']; ?>" disabled />
                    </div>
                    <div class="mb-3 mt-3 w-50">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required value="<?php echo $row['StaffName']; ?>" /></p>
                    </div>
                    <div class="mb-3 mt-3 w-50">
                        <input type="text" class="form-control" name="pass" placeholder="Enter Password" required value="<?php echo $row['StaffPassword']; ?>" /></p>
                    </div>
                    <div class="mb-3 mt-3 w-50">
                        <input type="text" name="branch" class="form-control" placeholder="Enter branch" required value="<?php echo $row['StaffBranch']; ?>" /></p>
                    </div>

                    <input name="submit" type="submit" class="btn btn-primary" value="Update" />
                </form>
            <?php } ?>
            </div>
    </div>
</body>

</html>