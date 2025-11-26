<?php
// Set the path to the file you want to offer for download
$file = 'sample.txt'; 

// Check if the file exists
if (file_exists($file)) {
    // Set headers for file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream'); // Generic binary file type
    header('Content-Disposition: attachment; filename="'.basename($file).'"'); // Force download with original filename
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file)); // Provide file size

    // Clear output buffer
    ob_clean();
    flush();

    // Read the file and output it to the browser
    readfile($file);
    exit;
} else {
    // Handle case where file does not exist
    echo "Error: The file '$file' does not exist.";
}
?>