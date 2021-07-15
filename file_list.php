<?php include 'backend/get_list.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>Big Data - Security</title>
</head>
<body>
<h1 class="cenetr-top-100">Big Data - Security </h2>
<table>
<thead>
    <th>Sl No</th>
    <th>Filename</th>
    <th>Size (in MB)</th>
    <th>Downloads</th>
    <th>Action</th>
</thead>
<tbody>
  <?php $slNo = 1; foreach ($files as $file): ?>
    <tr>
      <td class="txt_center"><?php echo $slNo++; ?></td>
      <td class="txt_center"><?php echo $file['filename']; ?></td>
      <td class="txt_center"><?php echo floor($file['filesize'] / 1000) . ' KB'; ?></td>
      <td class="txt_center"><?php echo $file['downloads']; ?></td>
      <td class="txt_center"><a href="download.php?filename=<?php echo $file['filename'] ?>">Download</a></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table>

<div class="cenetr-top-50">
            <p><a href="file_list.php">List Of Files</a></p>
            <p><a href="dashboard.php">Home</a></p>
            <p><a href="about_us.php">About Us</a></p>
            <p><a href="contact_us.php">Contact Us</a></p>
            <p><a href="index.php">Logout</a></p>
        </div>
</body>
</html>