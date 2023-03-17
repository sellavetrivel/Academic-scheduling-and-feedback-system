<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }

        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("class1.svg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .hero-text a {
            text-decoration: none;
            border: none;
            outline: 0;
            display: inline-block;
            padding: 15px 25px;
            color: #fff;
            font-size: 20px;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            border-radius: 10px;
        }

        .hero-text a:hover {
            background-color: #9C19E0;
            color: white;
        }
    </style>
</head>

<body>

    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">Let's start with new Era of Education</h1>
            <h2>Who are you?</h2>
            <a href="StudentLogin.php">Student</a>
            <a href="StaffSignin.php">Staff</a>
        </div>
    </div>


</body>

</html>