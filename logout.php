<?php
session_start();
unset($_SESSION["name"]);
unset($_SESSION["activation"]);
header("Location:StudentLogin.php");
