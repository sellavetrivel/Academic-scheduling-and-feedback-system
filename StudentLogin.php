<!-- php code for login -->
<!-- php -->
<?php
include 'dbcon.php';
// When login btn is clicked
session_start();
$error = "";
if (isset($_POST['btnsign'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $mypassword = mysqli_real_escape_string($con, $_POST['password']);
  $status = "active";
  $sql = "SELECT * FROM studentdata WHERE StudentEmail = '$email' and StudentPassword='$mypassword'";
  $result = mysqli_query($con, $sql);

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  // $active = $row['active'];
  // print_r($row);
  $count = mysqli_num_rows($result);


  if ($count == 1) {
    $_SESSION['name'] = $row["StudentName"];
    $_SESSION['sid'] = $row["Sid"];
    header("location:Classroom.php");
  } else {
    $error = "Your Login Email or Password is invalid";
  }
} else {
  mysqli_error($con);
  // echo $email;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Login</title>
  <!-- Fontawesome link -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />

  <!-- Bootstrap5 link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="registration-form">
    <form method="POST">
      <div class="form-icon">
        <span><i class="icon icon-user mt-3"></i></span>
      </div>
      <div>
        <p class="bg-dark text-white px-4">
          <?php
          if (isset($_SESSION['activation'])) {
            echo $_SESSION['activation'];
          }
          ?></p>
      </div>
      <div class="form-group">
        <input type="text" class="form-control item text-primary font-weight-bold" name="email" placeholder="Email" required />
      </div>
      <div class="form-group">
        <input type="password" class="form-control item text-primary font-weight-bold" name="password" placeholder="Password" required />
      </div>
      <div class="form-group">
        <button class="btn btn-block create-account" type="submit" name="btnsign">Sign In
        </button>
      </div>
      <h6 class="text-center text-white">
        Don't have an Account? <a href="Studentreg.php" class="font-weight-bold">Register Now</a>
      </h6>
      <!-- Error -->
      <span class="text-danger"><?php
                                if (isset($error)) echo $error ?></span>
    </form>

  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>

</html>