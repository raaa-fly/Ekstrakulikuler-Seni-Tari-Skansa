
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file is uploaded without errors
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        // Set the target directory for the upload
        $target_dir = "galeri/"; // Ensure this folder exists
        // Get the file name and the full path
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        
        // Check if the file already exists in the target folder
        if (file_exists($target_file)) {
            echo "Sorry, the file already exists.";
        } else {
            // Try to move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded or there was an upload error.";
    }
}
?>