
<?php include 'backend/spilt_upload.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Big Data - Registration</title>
  </head>
  <body>
    <div class="container">
      <h1 class="cenetr-top-100">Big Data - Security </h2>
      <div class="row">
        <form action="dashboard.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">Upload</button>

          <div class="mar-top10"><?php echo $status; ?></div>
        </form>

        <div class="cenetr-top-50">
            <p><a href="file_list.php">List Of Files</a></p>
            <p><a href="about_us.php">About Us</a></p>
            <p><a href="contact_us.php">Contact Us</a></p>
            <p><a href="index.php">Logout</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
