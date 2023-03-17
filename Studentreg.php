<!-- Php code for insertion of Data to student table -->
<!-- End up -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Registration</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="registration-form">
    <form method="POST" action="insert.php">
      <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
      </div>
      <div class="form-group">
        <input type="text" class="form-control item text-primary font-weight-bold" name="username" placeholder="Name" />
      </div>
      <div class="form-group">
        <input type="password" class="form-control item text-primary font-weight-bold" name="password" placeholder="Password" />
      </div>
      <div class="form-group">
        <input type="text" class="form-control item text-primary font-weight-bold" name="email" placeholder="Email" />
      </div>
      <div class="form-group">
        <input type="text" class="form-control item text-primary font-weight-bold" name="phone-number" placeholder="Phone Number" />
      </div>
      <div class="form-group">
        <select name="branch" class="form-control font-weight-bold text-success">
          <option value="Civil Engineering">Civil Engineering</option>
          <option value="Electrical Engineering">
            Electrical Engineering
          </option>
          <option value="Mechanical Engineering">
            Mechanical Engineering
          </option>
          <option value="Computer Engineering">Computer Engineering</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="btnsubmit" class="btn btn-block create-account">
          Create Account
        </button>
      </div>
      <h6 class="text-center text-white">
        Already Have an Account? <a href="StudentLogin.php" class="font-weight-bold">Login Now</a>
      </h6>
    </form>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>

</html>