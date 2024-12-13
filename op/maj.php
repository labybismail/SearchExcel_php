<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Define the target directory where the file will be saved
    $targetDirectory = __DIR__ . '/';
    $targetFile = $targetDirectory . basename($_FILES['chooseFile']['name']);

    // Check if the file is an Excel file (optional)
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileType, ['xls', 'xlsx', 'csv'])) {
        echo "Only Excel files are allowed.";
        exit;
    }
    $name='../excelFile1.' . $fileType;
    // Attempt to move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['chooseFile']['tmp_name'], $name)) {
        echo "The file " . htmlspecialchars($name) . " has been uploaded.</br>";
        echo '<h3>You will be redirected in <span id="countdown">3</span>s</h3>';

        // JavaScript for countdown and redirection
        echo '<script>
            let countdown = 3;
            const countdownElement = document.getElementById("countdown");
                
            const interval = setInterval(() => {
                countdown -= 1;
                countdownElement.textContent = countdown;
                if (countdown <= 0) {
                    clearInterval(interval);
                    window.location.href = "../uploadExcel.php";
                }
            }, 1000);
        </script>';
    } else {
        echo "There was an error uploading your file.";
    }
} else {
    echo "Invalid request.";
} 