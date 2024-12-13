<?php
//code to transfere selected columns from excel file to mysql database 

require_once '../vendor/autoload.php';
require_once 'conn.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$filename = '../excelFile.xlsx';   
$spreadsheet = IOFactory::load($filename);  // Load the Excel file

$worksheet = $spreadsheet->getActiveSheet();  // Get the active worksheet
$rows = $worksheet->toArray();  // Convert the worksheet to an array

$data = [];

// Loop through each row and store societe and address
// Loop through each row and store societe and address
foreach ($rows as $index => $row) {
    if ($index != 0 && !empty($row[1]) && !empty($row[5]) ) {  // Skip header and empty rows
        
        // Construct the cell coordinate for 'societe' (assuming it's in column B)
        $societeCell = 'B' . ($index + 1);  // Adjust for header row (if needed)

        // Get the background color for 'societe'
        $color = $worksheet->getStyle($societeCell)
                           ->getFill()
                           ->getStartColor()
                           ->getARGB();

        // Add row data to array
        $data[] = [
            'societe' => $row[1],
            'address' => $row[5],
            'nb' => $row[4],
            'apply_at' => $row[2],
            'added_at' => $row[3],
            'tel' => $row[6],
            'color' => $color // Save the color value
        ];
    }
}


try {
    $conn->exec("TRUNCATE TABLE societes");  // Clear the table

    $stmt = $conn->prepare("INSERT INTO societes (societe, address,nb,apply_at,added_at,tel,color) 
                        VALUES (:societe, :address, :nb,:apply_at,:added_at,:tel,:color)");

    // Insert each societe with its corresponding address
    foreach ($data as $entry) {
        $stmt->execute([
            ':societe' => $entry['societe'],
            ':address' => $entry['address'],
            ':nb' => $entry['nb'],
            ':apply_at' => $entry['apply_at'],
            ':added_at' => $entry['added_at'],
            ':tel' => $entry['tel'],
            ':color'=> $entry['color'],
        ]);
    }

    
    // header('Location: ../admin/societes_table.php');
    header('Location: ../index.php');
    exit();
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
