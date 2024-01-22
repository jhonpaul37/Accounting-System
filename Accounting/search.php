<?php
include_once 'includes/dbconnect.php'; 

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the search query from the form
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    // Use the search query to filter your database query
    $query = "SELECT * FROM disbursement_voucher 
              WHERE Jev_No LIKE '%$searchQuery%' OR div_number LIKE '%$searchQuery%'
                   OR descrip LIKE '%$searchQuery%' OR Payee LIKE '%$searchQuery%'
                   OR MOP LIKE '%$searchQuery%' OR Employee_No LIKE '%$searchQuery%'
                   OR amount LIKE '%$searchQuery%'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container mt-4'>
                <div class='row'>
                  <div class='col-lg-12'>
                      <div class='card bg-white p-4'>
          
                          <div class='table-container'>
                              <table class='table table-striped'>
                                  <thead>
                                      <tr>
                                          <th>JEV Number</th>
                                          <th>DV Number</th>
                                          <th>Description</th>
                                          <th>Date</th>
                                          <th>Client Name</th>
                                          <th>Mode of Payment</th>
                                          <th>Employee No</th>
                                          <th>Amount</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Jev_No'] . "</td>";
            echo "<td>" . $row['div_number'] . "</td>";
            echo "<td>" . $row['descrip'] . "</td>";
            echo "<td>" . $row['date_created'] . "</td>";
            echo "<td>" . $row['Payee'] . "</td>";
            echo "<td>" . $row['MOP'] . "</td>";
            echo "<td>" . $row['Employee_No'] . "</td>";
            echo "<td>" . '₱' . $row['amount'] . "</td>";
            echo "<td>
                    <button class='btn btn-primary edit-button' data-toggle='modal' data-target='#editModal' data-jev-number='" . $row['Jev_No'] . "'>Edit</button>
                  </td>";
            echo "</tr>";
        }

        echo "</tbody></table></div></div></div></div></div>";
    } else {
        echo "<div>No results found for the search query.</div>";
    }

    mysqli_close($conn);
}
?>
