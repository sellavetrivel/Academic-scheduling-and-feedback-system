<?php
// session_start();
include 'dbcon.php';
$content = '';
$sql = "Select *from class where Teachername='" . $_SESSION['staffname'] . "'";
$res = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($res)) {
  $content .= '
    <div class="col-md-3" style="margin-bottom:36px;" >
    <div class="card bg-primary">
    <div class="card-header bg-dark text-white">
      Classcode: ' . $row['Classcode'] . '
    </div>
    <div class="card-body text-white font-weight: bold">
      <h5 class="card-title">' . $row['Classname'] . '</h5>
      <p class="card-text">' . $row['Teachername'] . '</p>
      <p  class="card-text">Time: ' . $row['Classtime'] . '</p>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
      <input type="file" class="form-control m-3 w-100" name="fileToUpload" accept=".doc, .docx,.ppt, .pptx,.pdf" />
      <input type="submit" class="btn btn-success"/>
   </form>

    </div>
  </div>
    </div>';
}
