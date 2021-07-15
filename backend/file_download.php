<?php
// connect to the database



    $mysqli = new mysqli('localhost', 'root', '', 'uploadFile');

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }


    // Downloads files
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];

    //echo $filename;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
    $secret_iv = '5fgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo


    // fetch file to download from database
    $sql = "SELECT * FROM spilt_file_details WHERE filename='$filename' order by spilt_order asc";
    $result = mysqli_query($mysqli, $sql);

    //echo $sql;
    if(!$result){
        return false;
    }
    //echo $filename;
    $strSpilt = explode(".",$filename);

    $fileNew = $strSpilt[0]."-temp.".$strSpilt[1];

    $fileExit = "temp/".$fileNew;

    if(file_exists($fileExit)){
        unlink($fileExit);
    }
    

    $fileNewHandle = fopen("temp/".$fileNew, "a+");
   
    //echo $fileNew;
    while($row = mysqli_fetch_assoc($result)){
            $CID = $row['id'];
            $lFileName = $row['spilt_file'];
               
            $lFileHandle = fopen($lFileName,'r');
            $lSpiltFileSize =filesize($lFileName); 
            $lSpiltFileContent = fread($lFileHandle, $lSpiltFileSize);

            $output = openssl_decrypt(base64_decode($lSpiltFileContent), $encrypt_method, $key, 0, $iv);

            fwrite($fileNewHandle, $output);
            fclose($lFileHandle );
    }
    fclose($fileNewHandle );
  
    $filepath = 'temp/' . $fileNew;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; name=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('temp/' . $fileNew));
        readfile('temp/' . $fileNew);

        // Now update downloads count
     
        $updateQuery = "UPDATE spilt_file_details SET downloads=downloads+1 WHERE filename='$filename'";
        mysqli_query($mysqli, $updateQuery);
        //echo $updateQuery;
        $page = $_SERVER['PHP_SELF'];
        // header("Refresh:1; url=$page");
         // echo '<script type="text/JavaScript"> location.href=$page; </script>';
        exit;
    }
}
?>