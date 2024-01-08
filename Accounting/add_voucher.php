<?php
include_once 'includes/dbconnect.php'; 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jevNumber = $_POST['jevNumber'];
    $description = $_POST['description'];
    $date = date('Y-m-d'); // Auto-generated date
    $clientName = $_POST['clientName'];
    $amount = $_POST['amount'];
    $F_cluster = $_POST['fundCluster'];
    

    $sql = "INSERT INTO disbursement_voucher (Jev_No, descrip, date_created, Payee, amount, F_cluster) VALUES ('$jevNumber', '$description', '$date', '$clientName', '$amount', '$F_cluster')";

    if (mysqli_query($conn, $sql)) {
        header("Location: voucher.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


