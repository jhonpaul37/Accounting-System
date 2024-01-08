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
<body>
<?php include_once 'navbar.php';?>      
      
      <div class="container mt-4">
          <div class="row">

            <div class="col-lg-12">
                <div class="card bg-white p-4">
                  <h2>
                      <?php
                      $currentMonth = date('F');
                      echo "Transaction for the month of " . $currentMonth;
                      ?>
                  </h2>

                    <div class="table-container">
                        <table class="table table-striped">
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
                            <tbody>
                                <?php
                                      $currentMonth = date("m");
                                      $currentYear = date("Y");

                                      $query = "SELECT * FROM disbursement_voucher 
                                              WHERE MONTH(date_created) = $currentMonth 
                                              AND YEAR(date_created) = $currentYear";

                                      $result = mysqli_query($conn, $query);

                                      if (mysqli_num_rows($result) > 0) {
                                          while ($row = mysqli_fetch_assoc($result)) {
                                              echo "<tr>";
                                              echo "<td>" . $row['Jev_No'] . "</td>";
                                              echo "<td>" . $row['div_number'] . "</td>";
                                              
                                              echo "<td>" . $row['descrip'] . "</td>";
                                              echo "<td>" . $row['date_created'] . "</td>";
                                              echo "<td>" . $row['Payee'] . "</td>";
                                              echo "<td>" . $row['MOP'] . "</td>";
                                              echo "<td>" . $row['Employee_No'] . "</td>";
                                              echo "<td>" . '₱'. $row['amount'] . "</td>";
                                              echo "<td><button>Edit</button></td>";
                                              echo "</tr>";
                                          }
                                      } else {
                                          echo "<tr><td colspan='6'>No transactions found for the current month.</td></tr>";
                                      }

                                      echo "</tbody></table></div></div></div></div></div>";

                                      mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
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