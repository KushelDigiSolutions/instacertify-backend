<?php
// Path to the CSS file on the server
$cssFile = 'backend/admin/css/afb-styles.css';

// Check if the file exists
if (file_exists($cssFile)) {
    // Read the contents of the CSS file and output it
    $cssContent = file_get_contents($cssFile);
    echo $cssContent;
} else {
    echo 'File not found';
}
?>
