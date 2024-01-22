<?php
include_once 'includes/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $jevNumber = $_POST['jev_number']; 
    $newAmount = $_POST['new_amount']; 

    // Perform the database update
    $updateQuery = "UPDATE disbursement_voucher SET amount = '$newAmount' WHERE Jev_No = '$jevNumber'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Transaction updated successfully!";
    } else {
        echo "Error updating transaction: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
