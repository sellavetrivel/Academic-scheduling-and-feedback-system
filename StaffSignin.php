<?php
session_start();
include 'dbcon.php';

if (isset($_POST['btnLogin'])) {
    $txtemail = $_POST['email'];
    $txtpass = $_POST['password'];

    $login = mysqli_query($con, "SELECT *from staff where StaffEmail='$txtemail' and StaffPassword='$txtpass'");
    $row = mysqli_fetch_array($login, MYSQLI_ASSOC);
    if ($login) {
?>
        <script>
            alert('Your registration is successful.');
        </script>
<?php
        $_SESSION['staffname'] = $row['StaffName'];
        $_SESSION['branchname'] = $row['StaffBranch'];
        header('location:Staffroom.php');
    } else {
        mysqli_error($con);
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="bg-primary">
    <div class="container-fluid vh-100" style="margin-top:-50px;">
        <div class="" style="margin-top:200px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">Sign In</h3>
                    </div>
                    <form method="POST">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember Me
                                </label>
                            </div>
                            <button class="btn btn-primary text-center mt-2" type="submit" name="btnLogin">
                                Login
                            </button>
                            <h6 class="text-center mt-5">Don't have an account?
                                <a class="text-primary text-decoration-none" href="Staffsignup.php">Sign Up</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>