<?php
session_start();
include 'dbcon.php';
include 'dynamic.php';
$GLOBALS['code'] = rand(1000000, 9999999);
if (!empty($_POST['btnsubmit']) && (!empty($_POST['subject']))) {
  $txtcode = $GLOBALS['code'];
  $txtname = $_SESSION['staffname'];
  $txtsubject = $_POST['subject'];
  $txttime = $_POST['time'];

  $insert = mysqli_query($con, "INSERT INTO `class`(`Classcode`, `Teachername`, `Classname`, `Classtime`)
   VALUES ('$txtcode','$txtname','$txtsubject','$txttime')");
  if ($insert) {

?>
    <script>
      alert("Class created successfully");
    </script>
<?php

  } else {
    mysqli_error($con);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Main Classroom</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
  <!-- fontawesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />

 
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #1f2633">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" style="color: #FF4C29" href="#">Classroom</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
        </span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#myForm" href="#"><i class="fa fa-plus"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fa fa-user mr-2"></i>
              <?php
              if (isset($_SESSION['staffname'])) {
                echo $_SESSION['staffname'];
              } ?></a>
          </li>

          <li class="nav-item">
            <a class="btn btn-success text-white py-2" href="stafflogout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid" style="margin-top:150px">
    <div class="row">
      <?php echo $content; ?>
    </div>
  </div>
  <!-- Modal for add classroom -->
  <div class="modal fade" id="myForm" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-danger font-weight-bold">Create Class</h2>
        </div>
        <div class="modal-body">
          <form action="#" method="POST">
            <label class="text-success font-weight-bold">Classcode</label>
            <!-- Random number for classcode -->
            <input type="text" class="form-control text-primary font-weight-bold" value="<?php echo $GLOBALS['code']; ?>" disabled />
            <!-- Teacher name as logged person's name -->
            <label class="text-success font-weight-bold">Teacher</label>
            <input type="text" class="form-control text-primary font-weight-bold" name="teacher" value=<?php echo $_SESSION['staffname']; ?> disabled />
            <!-- Classname or Subject Name-->
            <label class="text-success font-weight-bold">SubjectName</label>
            <input type="text" name="subject" class="form-control text-primary font-weight-bold" placeholder="Enter Your Subject Name">

            <!-- classtime -->
            <label class="text-success font-weight-bold">Classtime</label>
            <input type="datetime-local" name="time" class="form-control text-primary font-weight-bold" placeholder="Enter Your Subject Name">
            <input type="submit" class="btn btn-primary mt-3 text-white" name="btnsubmit">

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
  <div class="container">
    <img src="teach.svg" alt="myimage" style="width:100%">
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>