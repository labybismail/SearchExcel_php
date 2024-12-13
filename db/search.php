<?php
require 'conn.php';

if (isset($_POST['data'])) {
    try {
        // Sanitize and trim input data
        $data = trim($_POST['data'] ?? '');
        $searchTerm = "%" . $data . "%";

        // Construct the base query
        $query = "SELECT societe, 
                  CASE WHEN apply_at IS NULL THEN '--' ELSE apply_at END AS apply_at, 
                  CASE WHEN nb IS NULL THEN '--' ELSE nb END AS note, 
                  color 
                  FROM societes 
                  WHERE societe LIKE ?";

        // Add LIMIT condition if no data is provided
        if ($data === '') {
            $query .= " LIMIT 4";
        }

        // Prepare and execute the statement
        $stmt = $conn->prepare($query);
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
