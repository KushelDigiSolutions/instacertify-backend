<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cssContent'])) {
    // Path to the CSS file on the server
    $cssFile = 'css/file.css';

    // Save the edited CSS content to the file
    $editedCSS = $_POST['cssContent'];
    file_put_contents($cssFile, $editedCSS);

    // Response to indicate success
    echo 'CSS saved successfully';
} else {
    echo 'Failed to save CSS';
}
?>
