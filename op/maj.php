<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['uploadExcelFileToDirectory'])) {
    // Define the target directory where the file will be saved
    $targetDirectory = __DIR__ . '/';
    $targetFile = $targetDirectory . basename($_FILES['chooseFile']['name']);

    // Check if the file is an Excel file (optional)
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileType, ['xls', 'xlsx', 'csv'])) {
        echo "Only Excel files are allowed.";
        exit;
    }

    // Attempt to move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['chooseFile']['tmp_name'], '../excelFile1.'.$fileType)) {
        echo "The file " . htmlspecialchars(basename($_FILES['chooseFile']['name'])) . " has been uploaded.";
    } else {
        echo "There was an error uploading your file.";
    }
} else {
    echo "Invalid request.";
} 
