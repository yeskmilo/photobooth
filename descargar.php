<?php

// Define the image type. We can remove this but not recommended  
header("Content-type: image/jpeg");  
  
// Define the name of image after downloaded  
header('Content-Disposition: attachment; filename="picture.jpg"');  
  
// Read the original image file  
$user_id = $_REQUEST['user'];
$filename = $_REQUEST['filename'];

readfile('images/com_fwgallery/files/'.$user_id.'/marca/'.$filename);  

?>
