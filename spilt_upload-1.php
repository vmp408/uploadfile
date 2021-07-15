<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'uploadFile');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'original/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
   

    // if (!in_array($extension, ['txt','zip', 'pdf', 'docx'])) {
    //     echo "You file extension must be .txt, .zip, .pdf or .docx";
    // } else
    if ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        $status = '<span style="color:#C70039;">File too large!</span>';
    } else {

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            $flagStatus = 0;
            $filePartsObj = fsplit($filename, $destination, $extension);

            $spiltOrder = 0;
            foreach ($filePartsObj as $eachFile) {
                
                $spiltFileSize = filesize($eachFile);
                $spiltOrder++;

                $sql = "INSERT INTO spilt_file_details(filename, filesize, spilt_file, spilt_filesize, spilt_order, downloads)VALUES('$filename', $size, '$eachFile', $spiltFileSize, $spiltOrder, 0)";
             
                if (mysqli_query($conn, $sql)) {
                    $flagStatus = 1;
                }else{
                    $flagStatus = 0;
                }
            }
        } else {
            $flagStatus = 2;
        }


    
        if ($flagStatus == 1) {
            $status = '<span style="color:#C70039;">File is splitted and uploaded succesfully!!</span>';
        }else if ($flagStatus == 0){
            $status = '<span style="color:#C70039;">File is splitted and uploaded partially uploaded!!</span>';
        }else{
            $status = '<span style="color:#C70039;">Failed to upload file.</span>';
        }
    }
        
}




function fsplit($file, $destination, $extension, $buffer=1024){
    //open file to read
    $file_handle = fopen($destination,'r');
    //get file size
    $file_size = filesize($destination);
    //no of parts to split
    $parts = $file_size / $buffer;
   
    //store all the file names
    $file_parts = array();
   
    //path to write the final files
    $store_path = "uploads/";
   
    //name of input file
    $strSpilt = explode(".",$file);
    // $file_name = basename($strSpilt);
    $file_name = $strSpilt[0];
   
    for($i=0;$i<$parts;$i++){
        //read buffer sized amount from file
        $file_part = fread($file_handle, $buffer);
        //the filename of the part
        $file_part_path = $store_path.$file_name."-part-$i.".$extension;
        //open the new file [create it] to write
        $file_new = fopen($file_part_path,'w+');
        //write the part of file
        fwrite($file_new, $file_part);
        //add the name of the file to part list [optional]
        array_push($file_parts, $file_part_path);
        //close the part file handle
        fclose($file_new);
    }    
    //close the main file handle   
    fclose($file_handle);
    return $file_parts;
} 



?>











