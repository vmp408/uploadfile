<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'uploadFile');

$sql = "SELECT DISTINCT(filename), filesize, downloads FROM spilt_file_details";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files


//     // Downloads files
// if (isset($_GET['file_id'])) {
//     $id = $_GET['file_id'];

//     // fetch file to download from database
//     $sql = "SELECT * FROM spilt_file_details WHERE id=$id";
//     $result = mysqli_query($conn, $sql);

//     $file = mysqli_fetch_assoc($result);
//     $filepath = 'uploads/' . $file['name'];

//     if (file_exists($filepath)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; name=' . basename($filepath));
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize('uploads/' . $file['name']));
//         readfile('uploads/' . $file['name']);

//         // Now update downloads count
//         $newCount = $file['download'] + 1;
//         $updateQuery = "UPDATE spilt_file_details SET downloads=$newCount WHERE id=$id";
//         mysqli_query($conn, $updateQuery);
//         exit;
//     }

// }
?>