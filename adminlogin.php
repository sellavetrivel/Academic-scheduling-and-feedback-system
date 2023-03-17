<!-- Php code -->
<?php
include 'dbcon.php';
// When login btn is clicked
session_start();
$error = "";
if (isset($_POST['loginbtn'])) {
  $myusername = mysqli_real_escape_string($con, $_POST['txtname']);
  $mypassword = mysqli_real_escape_string($con, $_POST['txtpass']);

  $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $active = $row['active'];

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if ($count == 1) {
    $_SESSION['login_user'] = $myusername;
    header("location:admin.php");
  } else {
    $error = "Your Login Name or Password is invalid";
  }
} else {
  mysqli_error($con);
}
?>
<!-- Form -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AdminLogin</title>
  <link rel="stylesheet" href="css/adminlogin.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="container">
    <div class="screen">
      <div class="screen__content">
        <form class="login" method="POST">
          <h1>Admin</h1>
          <div class="login__field">
            <i class="login__icon fas fa-user"></i>
            <input name="txtname" type="text" class="login__input" placeholder="User name" />
          </div>
          <div class="login__field">
            <i class="login__icon fas fa-lock"></i>
            <input name="txtpass" type="password" class="login__input" placeholder="Password" />
          </div>
          <button class="button login__submit" name="loginbtn">
            <span class="button__text">Log In Now</span>
            <i class="button__icon fas fa-chevron-right"></i>
          </button>
          <span class="text-danger"><?php echo $error ?></span>
        </form>
      </div>
      <div class="screen__background">
        <span class="screen__background__shape screen__background__shape4"></span>
        <span class="screen__background__shape screen__background__shape3"></span>
        <span class="screen__background__shape screen__background__shape2"></span>
        <span class="screen__background__shape screen__background__shape1"></span>
      </div>
    </div>
  </div>
</body>

</html>