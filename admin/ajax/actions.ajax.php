<?php
// If necessary then set these
/*ini_set('post_max_size', '1000M');
ini_set('upload_max_filesize', '1000M');
ini_set('memory_limit','1000M');*/
include('../config/db.php');
require('../az.multi.upload.class.php');
$rename	=	rand(1000,5000).time();
$upload	=	new ImageUploadAndResize('localhost','root','','french_fripe');
$upload->uploadFiles('files', '../uploads', 250, '../mini-logo.png', 20, 20, $rename, 0777, 90, '1000');
$sql_upload_images   =   new mysqli('localhost','root','','french_fripe');


echo $GLOBALS['directory'];
	

foreach($upload->prepareNames as $name){
	
	$sql = "INSERT INTO images_products (name) VALUES ('$name[0]')";
 
    if ($sql_upload_images->query($sql) === TRUE) {
		echo "New record created successfully";
		
    } else {
		echo "Error: " . $sql . "<br>" . $sql_upload_images->error;
	}
	
	print_r($name[0]);
	
}