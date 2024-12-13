<?php 
require 'conn.php';

if (isset($_POST['data'])) {
    try {
        // Prepare the query with placeholders to prevent SQL injection
        $stmt = $conn->prepare("SELECT societe,CASE WHEN apply_at is null  THEN '--' ELSE apply_at END as apply_at
        ,CASE WHEN nb is null  THEN '--' ELSE nb END as  note,color  FROM societes WHERE societe LIKE ?");
        $searchTerm = "%" . $_POST['data'] . "%";
        $stmt->execute([$searchTerm]);

        // Fetch all matching rows
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Send the result as JSON
        echo json_encode($result);
    } catch (PDOException $e) {
        // Handle database errors and send an error response
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "No data received"]);
}
