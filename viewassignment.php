<?php
include 'dbcon.php';
$content = '';
//if (!empty($_GET['teacher']) && (!empty($_GET['Subject']))) {
$teacher = $_GET['teacher'];
$subject = $_GET['Subject'];
$sql = "Select * from Assignment where Assignteacher='$teacher' and ASsignsubject='$subject' ";
$res = mysqli_query($con, $sql);
// if ($res) {

//     echo "ok";
// } else {
//     echo "no";
// }
while ($row = mysqli_fetch_array($res)) {

  $content .= '<section class="m-5" ">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <!-- Bootstrap 5 card box -->
          <div class="card-box" >
            <h3 class="mt-2 text-white font-weight-bold">
             ' . $row['Assignsubject'] . '
            </h3>
            <h5 class="mt-2 text-success font-weight-bold"> ' . $row['Assignteacher'] . '</h5>
            
            <a name="btnsave" href="' . $row['Assignfile'] . '" class="btn btn-primary text-white" download>Download</a>
           
           
          </div>
        </div>
         </div>
    </section>';
}
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment View</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
  <!-- fontawesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
<a  href="classroom.php">Go To classroom</a>
  <h4 class="p-2 m-3">Assignment Submissions</h4>
  <div class="form-group m-3">
  <form action="submitAssignment.php" method="POST" enctype="multipart/form-data">
    <input type="file" class="form-control w-50" name="Submitfile" accept=".doc, .docx,.pdf">
    <input type="submit" class="btn btn-primary mt-2" name="btnAssignment"/>
        <!-- <a class="btn btn-primary mt-2" name="btnAssignment" href="submitAssignment.php">Submit</a> -->
</form>
  </div>
  <h3 class="p-2 m-3">Download Assignment</h3>
  <?php
  if ($content == '') {
  ?>
    <script>
      alert("No Assignments found");
      window.location.href = "classroom.php";
    </script>
    
  <?php

  } else {
    echo $content;
  }
  ?>
</body>

</html>