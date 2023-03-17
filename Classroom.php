<!-- Faculty Review Saving Code -->
<?php
include 'dbcon.php';
if (isset($_POST['btnsave']) && (!empty($_POST['review'])) && (!empty($_POST['faculty']))) {
  $review = $_POST['review'];
  $facultyname = $_POST['faculty'];

  $sql = "INSERT INTO `faculty_review`(`Facultyname`, `Message`) VALUES('$facultyname','$review')";
  $res = mysqli_query($con, $sql);
  if ($res) {
?>
    <Script>
      alert("Your response has been Submitted!");
    </Script>
<?php
  } else {
    mysqli_error($con);
  }
}
?>



<?php
include 'dbcon.php';
$dynamic = [];
if (isset($_POST['btnsubmit']) && (!empty($_POST['classcode']))) {
  $code = $_POST['classcode'];

  $sql = "Select *from Class where Classcode = '$code'";
  $res = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($res)) {
    $teacher = $row['Teachername'];
    $sub = $row['Classname'];
    array_push($dynamic, '
    <section class="m-5">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <!-- Bootstrap 5 card box -->
          <div class="card-box">
            <h3 class="mt-2 text-white font-weight-bold">
             ' . $row['Classname'] . '
            </h3>
            <h5 class="mt-2 text-success font-weight-bold"> ' . $row['Teachername'] . '</h5>
            <h6 class="mt-2 text-white font-weight-bold">Classcode:-' . $row['Classcode'] . '</h6>
            <h6 class="mt-2 text-white font-weight-bold">Time:-' . $row['Classtime'] . '</h6>
            <a class="text-danger font-weight-bold mb-3" 
            href="viewassignment.php?teacher=' . $teacher . ' &Subject=' . $sub . '">View Assignment</a>
          </div>
        </div>
         </div>
    </section>');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Dashboard</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
  <!-- fontawesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
    <style>
    .img-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="far fa-clipboard" style="width: 40px; color: white"></i>Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#myForm" href="#"><i class="fa fa-plus"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#Faculty-form" href="#">Feedback</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="quiz.php">Quiz</a>
          </li>
          <li class="nav-item">
            <!-- username display from login page -->
            <?php session_start(); ?>
            <a class="nav-link" href="#"><?php if (isset($_SESSION['name'])) echo $_SESSION['name']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
    include 'dbcon.php';
  if(isset($_COOKIE['marks']) &&isset($_COOKIE['Cmar'])  )
  {
	  // && isset($_COOKIE['marks2'])
    $sid = $_SESSION['sid'];
    $stud_name = $_SESSION['name'];
    $marks = $_COOKIE['marks'];
	 $marks1 = $_COOKIE['Cmar'];
	  $total=(int)$marks+(int)$marks+(int)$marks1;
	 // $marks2 =$_COOKIE['Jmar'];
//6	  $_COOKIE['marks2'];
	
	//alert($marks);
	
//	echo '<script>alert("'+$marks1 +'")</script>';
    $sql1 = "SELECT * FROM exam_details where Sid = '" . $sid . "'";
    $result = mysqli_query($con, $sql1);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 0)
    {
		
      $sql2 = "INSERT INTO `exam_details`(`Sid` ,`Name`, `Marks`, `Marks2`,`Marks3`,`Total`) VALUES('$sid' ,'$stud_name', '$marks','$marks1','$marks','$total')";
      $res2 = mysqli_query($con, $sql2);
    }
    else
    {
		
      $updatesql = "update exam_details set `Marks`='$marks',`Marks2`='$marks1',`Marks3`='$marks',`Total`='$total'  WHERE Sid='" . $sid . "'";
      $res3 = mysqli_query($con, $updatesql);
    }
  }
?>
  <!-- Faculty Feedback Form -->
  <div class="modal fade" id="Faculty-form" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color:#FAEDF0">
        <div class="modal-header">
          <h2 class="modal-title text-danger font-weight-bold">Faculty Feedback</h2>
        </div>
        <hr>
        <div class="modal-body">
          <form action="#" method="post">
            <label class="text-success font-weight-bold">Your reviews are important for us....</label>
            <div class="mb-3">
              <input type="text" name="faculty" class="form-control" placeholder="Faculty Name..." />
            </div>
            <div class=" mb-3">
              <textarea class="form-control " name="review" placeholder="Leave a comment here" style="height: 100px"></textarea>
            </div>
            <input type="submit" name="btnsave" class="btn btn-primary mt-3" value="Save">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal for add classroom -->

  <div class="modal fade" id="myForm" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-danger font-weight-bold">Join Class</h2>
        </div>
        <div class="modal-body">
          <form action="#" method="post">
            <label class="text-success font-weight-bold">Ask your teacher for Classcode and Enter it here..</label>
            <input type="text" name="classcode" class="form-control" placeholder="Enter code here..." />
            <input type="submit" name="btnsubmit" class="btn btn-primary mt-3" value="Submit">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Subject Part -->
  <?php
  $arrlength = count($dynamic);
  for ($x = 0; $x < $arrlength; $x++) {
    echo $dynamic[$x];
    echo "<br>";
  }
  ?>
  <div class="container">
    <img src="class1.svg" alt="myimage" style="width:100%">

  </div>

  <!-- Section End -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>