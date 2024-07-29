<?php

$uploadDenyExtensions  = ['php'];
$uploadAllowExtensions = ['ico','jpg','jpeg','png','gif','webp','pdf'];

function showError($error) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	die($error);
}

function sanitizeFileName($file)
{
	//sanitize, remove double dot .. and remove get parameters if any
	$file = preg_replace('@\?.*$@' , '', preg_replace('@\.{2,}@' , '', preg_replace('@[^\/\\a-zA-Z0-9\-\._]@', '', $file)));
	return $file;
}


define('UPLOAD_FOLDER', __DIR__ . '/');
if (isset($_POST['mediaPath'])) {
	define('UPLOAD_PATH', sanitizeFileName($_POST['mediaPath']) .'/');
} else {
	define('UPLOAD_PATH', '/');
}

$fileName  = $_FILES['file']['name'];
$extension = strtolower(substr($fileName, strrpos($fileName, '.') + 1));

//check if extension is on deny list
if (in_array($extension, $uploadDenyExtensions)) {
	showError("File type $extension not allowed!");
}

/*
//comment deny code above and uncomment this code to change to a more restrictive allowed list
// check if extension is on allow list
if (!in_array($extension, $uploadAllowExtensions)) {
	showError("File type $extension not allowed!");
}
*/

$destination = UPLOAD_FOLDER . UPLOAD_PATH . '/' . $fileName;
$destination = str_replace("//","/",$destination);
$destination = str_replace("/public/master/media/","/public/backend/admin/media/",$destination);
$destination = str_replace("//","/",$destination);
//var_dump($destination);exit;
move_uploaded_file($_FILES['file']['tmp_name'], $destination);

if (isset($_POST['onlyFilename'])) {
	echo $fileName;
} else {
	echo UPLOAD_PATH . $fileName;
}
