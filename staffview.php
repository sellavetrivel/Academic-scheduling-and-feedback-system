<?php
require('dbcon.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form mt-3">
        <p><a href="admin.php" class="btn btn-primary">Dashboard</a>|
            <a href="Staffsignup.php" class="btn btn-primary">Add New Teacher</a>
            | <a href="adminlogout.php" class="btn btn-primary">Logout</a>
        </p>
        <h2>View Records</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="text-align:center"><strong>S.No</strong></th>
                    <th style="text-align:center"><strong>Name</strong></th>
                    <th style="text-align:center"><strong>Email</strong></th>
                    <th style="text-align:center"><strong>Password</strong></th>
                    <th style="text-align:center"><strong>Branch</strong></th>
                    <th style="text-align:center"><strong>Edit</strong></th>
                    <th style="text-align:center"><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "Select * from staff ORDER BY Staffid desc;";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row["StaffName"]; ?></td>
                        <td align="center"><?php echo $row["StaffEmail"]; ?></td>
                        <td align="center"><?php echo $row["StaffPassword"]; ?></td>
                        <td align="center"><?php echo $row["StaffBranch"]; ?></td>
                        <td align="center">
                            <a href="staffedit.php?id=<?php echo $row["Staffid"]; ?>">Edit</a>
                        </td>
                        <td align="center">
                            <a href="staffdelete.php?id=<?php echo $row["Staffid"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>