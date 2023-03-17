<?php
require('dbcon.php');

session_start();
$error = "";
if (isset($_POST['btnnames'])) {
	echo '<script>alert("Welcome to Geeks for Geeks")</script>';
  // $myusername = mysqli_real_escape_string($con, $_POST['txtname']);
  // $mypassword = mysqli_real_escape_string($con, $_POST['txtpass']);

  // $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
  // $result = mysqli_query($con, $sql);
  // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  // $active = $row['active'];

  // $count = mysqli_num_rows($result);

  // // If result matched $myusername and $mypassword, table row must be 1 row

  // if ($count == 1) {
    // $_SESSION['login_user'] = $myusername;
    // header("location:admin.php");
  // } else {
    // $error = "Your Login Name or Password is invalid";
  // }
} else {
  mysqli_error($con);
}

?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Results</title>
    <link rel="stylesheet" href="css/style.css" />
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	

      // google.charts.load('current', {'packages':['corechart']});
      // google.charts.setOnLoadCallback(drawChart);

      // function drawChart() {

        // var data = google.visualization.arrayToDataTable([
          // ['Name', 'Marks'],
         // <?php
		 
         // $sql = "Select * from exam_details ORDER BY Marks;";
         // $fire = mysqli_query($con,$sql);
          // while ($result = mysqli_fetch_assoc($fire)) {
            // echo"['".$result['Name']."',".$result['Marks']."],";
          // }

         // ?>
        // ]);

        // var options = {
          // title: 'Students and their contribution'
        // };

        // var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        // chart.draw(data, options);
      // }
    // </script>
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Opening Move', 'Percentage'],
         <?php
		 
          $sql = "Select * from exam_details ORDER BY Marks;";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
          echo"['".$result['Name']."',".$result['Marks']."],";
           }
   
         ?>
		 ['Total', '10']
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Chess opening moves',
                   subtitle: 'popularity by percentage' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
</head>

<body>

    <div class="form">
        <p><a href="admin.php">Dashboard</a>|
            | <a href="adminlogout.php">Logout</a>
        </p>
        <h2>View Records</h2>
		
		
		
<div>

 <table width="100%">
 <tr>
                    <th style="text-align:center"><strong>Name :</strong></th>
                    <th style="text-align:center"><strong><input type="text" id="fname" name="fname"></strong></th>
                    <th style="text-align:center"> <input type="submit" name="btnnames" value="Submit"></th>
                </tr>
 </table>
<br>
</div>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="text-align:center"><strong>Sid</strong></th>
                    <th style="text-align:center"><strong>Name</strong></th>
                    <th style="text-align:center"><strong>Marks</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "Select * from exam_details ORDER BY Marks;";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <!-- <td align="center"><?php echo $count; ?></td> -->
                        <td align="center"><?php echo $row["Sid"]; ?></td>
                        <td align="center"><?php echo $row["Name"]; ?></td>
                        <td align="center"><?php echo $row["Marks"]; ?></td>
                    </tr>
                <?php $count++;
                } ?>
				
				 
            </tbody>
        </table>
    </div>
	<br>
	<div id="top_x_div" style="width: 900px; height: 500px;"></div>
	
</body>

</html>