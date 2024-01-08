<?php
include_once 'includes/dbconnect.php';

$currentYear = date("Y"); // Year
$query = "SELECT DATE_FORMAT(date_created, '%Y-%m') AS month_year, SUM(amount) AS total_amount 
          FROM disbursement_voucher 
          WHERE YEAR(date_created) = $currentYear 
          GROUP BY month_year 
          ORDER BY month_year ASC LIMIT 12";

$result = mysqli_query($conn, $query);

$labels = [];
$data = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['month_year'];
        $data[] = $row['total_amount'];
    }
}

mysqli_close($conn);

$chartData = [
    "labels" => $labels,
    "data" => $data,
];

echo json_encode($chartData); 
?>
