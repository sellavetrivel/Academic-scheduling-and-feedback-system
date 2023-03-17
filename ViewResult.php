<?php
require('dbcon.php');

// $id = $_REQUEST['id'];
// $query = "SELECT * from class where Classid='" . $id . "'";
// $result = mysqli_query($con, $query) or die(mysqli_error($con));
// $row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
	
	
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
         <?php
          $sql = "SELECT * FROM exam_details ";
		  //"Select * from exam_details where Name='".$marks."'";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
          echo"['".$result['Name']."',".$result['Total']."],";
           }
		
         ?>
        ]);

        var options = {
          title: 'Marks Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>

<body>
    <div >
        <p><a href="admin.php" class="btn btn-primary">Dashboard</a>
            | <a href="adminlogout.php" class="btn btn-primary">Logout</a> | <a href="ViewResult2.php" class="btn btn-primary">Search Record</a></p>
        <h1>View Record</h1>
		
       
       
            <div class="row">
					
					<table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="text-align:center"><strong>Sid</strong></th>
                    <th style="text-align:center"><strong>Name</strong></th>
                    <th style="text-align:center"><strong>Php</strong></th>
					 <th style="text-align:center"><strong>C#</strong></th>
 <th style="text-align:center"><strong>Java</strong></th>
 <th style="text-align:center"><strong>Total</strong></th>
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
						<td align="center"><?php echo $row["Marks2"]; ?></td>
						<td align="center"><?php echo $row["Marks3"]; ?></td>
						<td align="center"><?php echo $row["Total"]; ?></td>
						
                    </tr>
                <?php $count++;
                } ?>
				
				 
            </tbody>
        </table>
    </div>
	<br>
	 <div id="piechart" style="width: 900px; height: 500px;"></div>
	<div id="top_x_div" style="width: 900px; height: 500px;"></div>
					
					
                
           
            </div>
    </div>
</body>

</html>