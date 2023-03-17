<?php
require('dbcon.php');

// $id = $_REQUEST['id'];
// $query = "SELECT * from class where Classid='" . $id . "'";
// $result = mysqli_query($con, $query) or die(mysqli_error($con));
//$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Search Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="form mt-5">
        <p><a href="admin.php" class="btn btn-primary">Dashboard</a>
            | <a href="adminlogout.php" class="btn btn-primary">Logout</a></p>
        <h1>Search Record</h1>
       
            <div class="container-fluid my-5">
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
	<div class="col-12">
				
					<table>
					<tr>
					<td>  
					
					Name <br><input type="text" name="time1" class="form-control" value="" /></td>
					<td>&nbsp;<br><input name="btnregister" type="submit" class="btn btn-primary"  value="Search" /></td>
					<td>  
					
				Search Above Marks <br><input type="text" name="time2" class="form-control" value="" /></td>
					<td>&nbsp;<br><input name="btnregister1" type="submit" class="btn btn-primary"  value="Search" /></td>
					</tr>
					</table>
					
					</div>
                   
                </form>
            
            </div>
			
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
        $status = "";
        if (isset($_POST['btnregister'])) {
				
                $count = 1;
                $sel_query = "Select * from exam_details where Name='".$_POST['time1']."'";
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
		}
		}?>
				      <?php
        $status = "";
        if (isset($_POST['btnregister1'])) {
				
                $count = 1;
                $sel_query = "Select * from exam_details where Total>'".$_POST['time2']."'";
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
		}
		}?>
				 
            </tbody>
        </table>
    </div>
	<br>
	<div id="top_x_div" style="width: 900px; height: 500px;"></div>
					
					
                
           
            </div>
    </div>
    </div>
</body>

</html>