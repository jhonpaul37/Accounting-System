<?php
include_once 'includes/dbconnect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Financial Dashboard</title>
</head>
<body >
  
        <?php include_once 'navbar.php';?>

        <div class="container mt-4">
            <div class="row">
              
                <div class="col-lg-12">
                    <div class="card bg-white p-4">
                        <h2>Select Date Range</h2>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                              <label for="start_date">Start Date:</label>
                              <input class="form-control" type="date"  id="fromdate" name="fromdate" required="true">
                            </div>

                            <div class="form-group">
                              <label for="end_date">End Date:</label>
                              <input class="form-control" type="date"  id="todate" name="todate" required="true">
                            </div>

                            <div class="form-group">
                            <button type="submit" class="btn btn_custom" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>  
        </div>

        <div class="container mt-4">
          <div class="row">
          <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $start_date = $_POST['fromdate'];
                $end_date = isset($_POST['todate']) ? $_POST['todate'] : '';

                $query = "SELECT * FROM disbursement_voucher 
                          WHERE date_created BETWEEN '$start_date' AND '$end_date'";

                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="col-lg-12">
                            <div class="card bg-white p-4">
                                <h2>Report from ' . $start_date . ' to ' . $end_date . '</h2>
                                <div class="table-container">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>JEV Number</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Client Name</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Jev_No'] . "</td>";
                        echo "<td>" . $row['descrip'] . "</td>";
                        echo "<td>" . $row['date_created'] . "</td>";
                        echo "<td>" . $row['Payee'] . "</td>";
                        echo "<td>" . '₱' . $row['amount'] . "</td>";
                        echo "<td><button>Edit</button></td>";
                        echo "</tr>";
                    }
                    echo '</tbody>
                        </table>
                    </div>
                    </div>
                    </div>';
                } else {
                    echo "<div class='col-lg-12'><div class='card bg-white p-4'><p>No transactions found within the selected date range.</p></div></div>";
                }
            }
            ?>
          </div>
        </div>

              
          

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    <!--Charts-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="charts.js"></script>
    
</body>
</html>