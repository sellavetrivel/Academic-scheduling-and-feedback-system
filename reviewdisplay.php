<?php
require('dbcon.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Staff Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form mt-3">
        <p><a href="admin.php" class="btn btn-primary">Dashboard</a>|
            | <a href="adminlogout.php" class="btn btn-primary">Logout</a>
        </p>
        <h2>Staff Review</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="text-align:center"><strong>S.No</strong></th>
                    <th style="text-align:center"><strong>StaffName</strong></th>
                    <th style="text-align:center"><strong>Feedback</strong></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "SELECT * FROM `faculty_review` ORDER BY reviewid desc;";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row["Facultyname"]; ?></td>
                        <td align="center"><?php echo $row["Message"]; ?></td>

                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>