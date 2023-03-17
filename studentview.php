<?php
require('dbcon.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form">
        <p><a href="admin.php">Dashboard</a>|
            <a href="Studentreg.php">Add New Student</a>
            | <a href="adminlogout.php">Logout</a>
        </p>
        <h2>View Records</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="text-align:center"><strong>S.No</strong></th>
                    <th style="text-align:center"><strong>Name</strong></th>
                    <th style="text-align:center"><strong>Email</strong></th>
                    <th style="text-align:center"><strong>Password</strong></th>
                    <th style="text-align:center"><strong>Phone</strong></th>
                    <th style="text-align:center"><strong>Branch</strong></th>
                    <th style="text-align:center"><strong>Edit</strong></th>
                    <th style="text-align:center"><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "Select * from studentdata ORDER BY Sid desc;";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row["StudentName"]; ?></td>
                        <td align="center"><?php echo $row["StudentEmail"]; ?></td>
                        <td align="center"><?php echo $row["StudentPassword"]; ?></td>
                        <td align="center"><?php echo $row["Phone"]; ?></td>
                        <td align="center"><?php echo $row["Branch"]; ?></td>
                        <td align="center">
                            <a href="studentedit.php?id=<?php echo $row["Sid"]; ?>">Edit</a>
                        </td>
                        <td align="center">
                            <a href="studentdelete.php?id=<?php echo $row["Sid"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>