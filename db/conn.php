<?php
require 'links/linksLocal.php';
//require 'links/linksHeberg.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the table 'societes' exists
    $result = $conn->query("SHOW TABLES LIKE 'societes'");
    if ($result->rowCount() === 0) {
        // Table does not exist, create it
        $createTableSQL = "
            CREATE TABLE `societes` (
                `id` int(11) NOT NULL,
                `societe` varchar(255) NOT NULL,
                `apply_at` date DEFAULT NULL,
                `added_at` date DEFAULT NULL,
                `nb` varchar(250) DEFAULT NULL,
                `address` text DEFAULT NULL,
                `tel` varchar(55) DEFAULT NULL,
                `color` varchar(55) DEFAULT ''
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            ALTER TABLE `societes`
              ADD PRIMARY KEY (`id`),
              ADD KEY `idx_tel` (`tel`);
            
            ALTER TABLE `societes`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
            
            COMMIT;
        ";
        $conn->exec($createTableSQL);
        // echo "Table 'societes' has been created successfully.";
    }// else {
       // echo "Table 'societes' already exists.";
    //}
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}