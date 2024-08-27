<?php
  
// Store the file name into variable
$file = 'wp-content/uploads/2022/07/Conference-.pdf';
$filename = 'conference.pdf';
  
// Header content type
header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $filename . '"');
  
header('Content-Transfer-Encoding: binary');
  
header('Accept-Ranges: bytes');
  
// Read the file
@readfile($file);
  
?>