<?php
require_once '../vendor/autoload.php';
require_once 'conn.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
//  /EakKBucO1YYggF9OCwEAAAABCh_31EEAgN5BcXY-QBOzig?e=1DVOlY
// Transform OneDrive link into direct download link
$sharedLink = 'https://api.onedrive.com/v1.0/shares/u!5f86d50ee7060aa9/root/content'; // Replace <FILE_ID> with your actual ID
$tempFile = '../temp_excel_file.xlsx'; // Temporary file path

// Download the file
$fileContents = @file_get_contents($sharedLink);

if ($fileContents === false) {
    die("Error: Unable to download the file. Ensure the link is a valid direct download link.");
}

// Save the file to a temporary location
file_put_contents($tempFile, $fileContents);

try {
    $spreadsheet = IOFactory::load($tempFile); // Load the Excel file
    $worksheet = $spreadsheet->getActiveSheet(); // Get the active worksheet
    $rows = $worksheet->toArray(); // Convert the worksheet to an array

    $data = [];

    // Process rows
    foreach ($rows as $index => $row) {
        if ($index != 0 && !empty($row[1]) && !empty($row[5])) { // Skip header and empty rows
            $data[] = [
                'societe' => $row[1],
                'address' => $row[5],
                'nb' => $row[4],
                'apply_at' => $row[2],
                'added_at' => $row[3],
                'tel' => $row[6]
            ];
        }
    }

    // Clear the table and insert data
    $conn->exec("TRUNCATE TABLE societes");
    $stmt = $conn->prepare(
        "INSERT INTO societes (societe, address, nb, apply_at, added_at, tel) 
         VALUES (:societe, :address, :nb, :apply_at, :added_at, :tel)"
    );

    foreach ($data as $entry) {
        $stmt->execute([
            ':societe' => $entry['societe'],
            ':address' => $entry['address'],
            ':nb' => $entry['nb'],
            ':apply_at' => $entry['apply_at'],
            ':added_at' => $entry['added_at'],
            ':tel' => $entry['tel']
        ]);
    }

    // Redirect after success
    header('Location: ../index.php');
    exit();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Clean up the temporary file
    if (file_exists($tempFile)) {
        unlink($tempFile);
    }
}
