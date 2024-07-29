<?php


define('MAX_FILE_LIMIT', 1024 * 1024 * 2);//2 Megabytes max html file size

function sanitizeFileName($file, $allowedExtension = 'html') {
	//sanitize, remove double dot .. and remove get parameters if any
	$file = __DIR__ . '/' . preg_replace('@\?.*$@' , '', preg_replace('@\.{2,}@' , '', preg_replace('@[^\/\\a-zA-Z0-9\-\._]@', '', $file)));
	
	//allow only .html extension
	if ($allowedExtension) {
		$file = preg_replace('/\..+$/', '', $file) . ".$allowedExtension";
	}
	return $file;
}

function showError($error) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	die($error);
}

$html   = '';
$file   = '';
$action = '';

if (isset($_POST['startTemplateUrl']) && !empty($_POST['startTemplateUrl'])) {
	$startTemplateUrl = sanitizeFileName($_POST['startTemplateUrl']);
	$html = file_get_contents($startTemplateUrl);
} else if (isset($_POST['html'])){
	$html = substr($_POST['html'], 0, MAX_FILE_LIMIT);
}

if (isset($_POST['file'])) {
	$file = sanitizeFileName($_POST['file'], false);
}

if (isset($_GET['action'])) {
	$action = $_GET['action'];
}

if ($action) {
	//file manager actions, delete and rename
	switch ($action) {
		case 'rename':
			$newfile = sanitizeFileName($_POST['newfile'], false);
			if ($file && $newfile) {
				if (rename($file, $newfile)) {
					$file = explode("/",$file);
					$file = $file[count($file)-1];
					$newfile = explode("/",$newfile);
					$newfile = $newfile[count($newfile)-1];
					echo "File '$file' renamed to '$newfile'";
				} else {
					showError("Error renaming file '$file' renamed to '$newfile'");
				}
			}
		break;
		case 'delete':
			if ($file) {
				if (unlink($file)) {
					echo "File '$file' deleted";
				} else {
					showError("Error deleting file '$file'");
				}
			}
		break;
		case 'create-folder':
			$path = dirname(__FILE__).$_REQUEST["mediaPath"]."/".$_REQUEST["folderName"];
			
			
			$path = str_replace('../master/media//', '/backend/admin/media/', $path);
			$path = str_replace('/public../backend/admin/media', '/public/backend/admin/media/', $path);
			$path = str_replace('//', '/', $path);
			//var_dump($path);
			if (!file_exists($path)) {
				mkdir($path, 0777, true);
				echo '{"status":true,"message":"folder created"}';
			}else{
				echo '{"status":false,"message":"folder already exist"}';
			}
		break;
		case 'delete-folder':
			echo '{"status":true}';
		break;
		default:
			showError("Invalid action '$action'!");
	}
} else {
	//save page
	if ($html) {
		if ($file) {
			$dir = dirname($file);
			if (!is_dir($dir)) {
				echo "$dir folder does not exist\n";
				if (mkdir($dir, 0777, true)) {
					echo "$dir folder was created\n";
				} else {
					showError("Error creating folder '$dir'\n");
				}
			}

			if (file_put_contents($file, $html)) {
				echo "File saved '$file'";
			} else {
				showError("Error saving file '$file'\nPossible causes are missing write permission or incorrect file path!");
			}	
		} else {
			showError('Filename is empty!');
		}
	} else {
		showError('Html content is empty!');
	}
}
