<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url("https://fonts.googleapis.com/css?family=Raleway:400,700");

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Raleway, sans-serif;
    }

    body {
      background: linear-gradient(90deg, #c9c8e6, #412be7);
    }

    nav {
      background: #142f43;
    }

    .navbar-brand {
      font-size: 30px;
      font-weight: bold;
    }

    a {
      color: white;
    }

    .img-text {
      position: absolute;
      top: 50%;
      left: 75%;
      transform: translate(-50%, -50%);
    }
  </style>
</head>

<body>
  <?php session_start(); ?>
  <nav class="navbar navbar-expand-md  top-fixed">
    <!--Admin Name displayed here which has logged in  -->
    <a class="navbar-brand" href="admin.html">
      <?php if (!isset($_SESSION['login_user'])) {
        header('location:adminlogin.php');
      } else {
        echo $_SESSION['login_user'];
      } ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon">
        <i class="fas fa-bars" style="color: #fff; font-size: 28px"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="Viewresult.php">Quiz Result</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="studentview.php">Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="staffview.php">Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Updatetimeview.php">Update Timetable</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reviewdisplay.php">Staff Review</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminlogout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <br />

  <div class="container">
    <img src="admin.svg" alt="myimage" style="width:80%">
    <div class="img-text">
      <h1 class="text-center text-white font-weight-bold">Welcome to admin Page</h1>
      <h5 class="text-center text-white font-weight-bold">You can do whatever you like......</h5>
    </div>
  </div>
</body>

</html>