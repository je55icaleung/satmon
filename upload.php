<?php
$uploadMessage = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $target_dir = __DIR__ . '/uploads/';
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;

    $uploadedFileType = $_FILES["file"]["type"];

    if ($_FILES["file"]["size"] > 500 * 1024 * 1024) {
        $uploadMessage = '<span class="message">Sorry, your file is too large.</span>';
        $uploadOk = 0;
    }

    $allowedMimeTypes = array("text/csv");

    if (!in_array($uploadedFileType, $allowedMimeTypes)) {
        $uploadMessage = '<span class="message">Sorry, only CSV files are allowed.</span>';
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $uploadMessage = '<span class="message">Sorry, your file was not uploaded.</span>';
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $uploadMessage = '<span class="message">The file ' . htmlspecialchars(basename($_FILES["file"]["name"])) . ' has been uploaded successfully.</span>';
        } else {
            $uploadMessage = '<span class="message">Sorry, there was an error uploading your file.</span>';
        }
    }
}
?>