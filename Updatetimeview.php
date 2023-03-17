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

            <a href="adminlogout.php" class="btn btn-primary">Logout</a>
        </p>
        <h2>View Records</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="text-align:center"><strong>S.No</strong></th>
                    <th style="text-align:center"><strong>ClassCode</strong></th>
                    <th style="text-align:center"><strong>SubjectName</strong></th>
                    <th style="text-align:center"><strong>TeacherName</strong></th>
                    <th style="text-align:center"><strong>ClassTime</strong></th>
                    <th style="text-align:center"><strong>Edit</strong></th>
                    <th style="text-align:center"><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "Select * from class ORDER BY Classid desc;";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row["Classcode"]; ?></td>
                        <td align="center"><?php echo $row["Classname"]; ?></td>
                        <td align="center"><?php echo $row["Teachername"]; ?></td>
                        <td align="center"><?php echo $row["Classtime"]; ?></td>
                        <td align="center">
                            <a href="classedit.php?id=<?php echo $row["Classid"]; ?>">Edit</a>
                        </td>
                        <td align="center">
                            <a href="classdelete.php?id=<?php echo $row["Classid"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>