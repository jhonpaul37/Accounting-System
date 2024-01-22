<?php
include_once 'includes/dbconnect.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $clusterCode = $_POST['clusterCode'];
        $balanceToAdd = $_POST['balanceAmount'];

        $sqlSelect = "SELECT amount FROM fund_clusters WHERE F_cluster = '$clusterCode'";
        $result = mysqli_query($conn, $sqlSelect);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $existingBalance = $row['amount'];
        
            
            $newBalance = $existingBalance + $balanceToAdd;
        
            
            $sqlUpdate = "UPDATE fund_clusters SET amount = $newBalance WHERE F_cluster = '$clusterCode'";
            if (mysqli_query($conn, $sqlUpdate)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "No record found for cluster: " . $clusterCode;
        }
    }
?>
