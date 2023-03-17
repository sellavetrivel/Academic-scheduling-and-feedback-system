<!-- Submitting the files -->
<?php
session_start();
include 'dbcon.php';
// require 'dynamic.php';
$target_dir = "Submitted-Assignments/";
$target_file = $target_dir . basename($_FILES["Submitfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Select statement for file
$select = "Select *from Studentdata where StudentName='" . $_SESSION['name'] . "'";
$res = mysqli_query($con, $select);
$row = mysqli_fetch_array($res);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

    $check = getimagesize($_FILES["Submitfile"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["Submitfile"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx"
) {
    echo "Sorry, only pDF,DOC files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["Submitfile"]["tmp_name"], $target_file)) {
        $sub = $row['StudentName'];
        $file = $target_file;
        // $sql = "INSERT INTO `Submittedassignment`(`Studentname`,  `Submittedfile`) VALUES 
        // ('$sub','$file')";
        // if (mysqli_query($con, $sql)) {
?>
            <script>
                alert("Assignment Uploaded");
            </script>
<?php
            echo "SuccessFully Uploaded go and ask the teacher";
            // header('location:Staffroom.php');
        // }
        // echo "The file " . htmlspecialchars(basename($_FILES["Submitfile"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
