<?php

$fileName = $_FILES["image"]["name"]; // The file name

$fileTmpLoc = $_FILES["image"]["tmp_name"]; // File in the PHP tmp folder

$fileType = $_FILES["image"]["type"]; // The type of file it is

$fileSize = $_FILES["image"]["size"]; // File size in bytes

$fileErrorMsg = $_FILES["image"]["error"]; // 0 for false... and 1 for true

/*if (!$fileTmpLoc) { // if file not chosen

    echo "ERROR: Please browse for a file before clicking the upload button.";

    exit();

}
*/
echo "$fileName upload is successful";
/*if(move_uploaded_file($fileTmpLoc, "../App/W/upload/$fileName")){

    
    echo "$fileName upload is complete";

} else {

    echo "move_uploaded_file function failed";

}*/

?>