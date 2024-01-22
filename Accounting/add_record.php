<?php
include_once 'includes/dbconnect.php'; 

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $div_number = $_POST['div_number'];
        $date = date('Y-m-d'); // Auto-generated date
        

        $sql = "INSERT INTO div_transaction (div_number, date_transaction) VALUES ('$div_number', '$date')";

        if (mysqli_query($conn, $sql)) {
            header("Location: for_release.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

mysqli_close($conn);
?>