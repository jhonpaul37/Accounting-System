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

              <!-- Column for Account Balances -->
              <div class="col-lg-12 mb-4">
                <div class="card p-4">

                <div class="col-md-12 btn-popup">
                <button type="button" class="btn btn_custom" data-toggle="modal" data-target="#addBalanceModal">Add Balance</button>
                    <!-- adding a balance -->
                    <div class="modal fade" id="addBalanceModal" tabindex="-1" role="dialog" aria-labelledby="addBalanceModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form method="post" action="add_balance.php">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addBalanceModalLabel">Add Balance</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="clusterSelect">Select Cluster:</label>

                                <select class="form-control" id="clusterSelect" name="clusterCode">
                                <!-- PHP code to populate dropdown options -->
                                  <?php
                                    // Fetch cluster options from your database
                                    $sql = "SELECT * FROM fund_clusters";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                      while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['F_cluster'] . '">' . $row['F_cluster'] . '</option>';
                                      }
                                    }
                                  ?>
                                </select>

                              </div>
                              <div class="form-group">
                                <label for="balanceAmount">Balance Amount:</label>
                                <input type="text" class="form-control" id="balanceAmount" name="balanceAmount">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn_custom">Add</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    </div>

                <h2>Balance to Accounts</h2>
                <!-- PHP code to populate the remaining balance -->
                  <div class="row">
                    <?php
                    $sql = "SELECT * FROM fund_clusters;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0){
                      while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="col-md-3">
                          <div class="card mb-3">
                            <div class="card-body-cluster">
                              <span class="title">Total Balance</span><br>
                              <span class="amount-value"><?php echo '₱' . number_format($row['amount'], 2); ?></span><br>
                              <span class="cluster-code"><?php echo $row['F_cluster']; ?></span><br>
                            </div>
                          </div>
                        </div>
                        
                    <?php
                      }
                    }
                    ?>
                  </div>

                </div>
              </div>
              
              <!-- Column for Charts -->
              <div class="col-lg-12 mb-4">
                <div class="card p-4">           
                    <div class="card-body">
                      <h4>Monthly Expenses</h4>
                        <canvas class="bar-chart"></canvas>
                     </div>     
                </div>
              </div>
              


              <div class="col-lg-12">
                  <div class="card p-4">
                      <h2>Recent Transactions</h2>
                      <div class="table-container">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>JEV Number</th>
                                      <th>Description</th>
                                      <th>Date</th>
                                      <th>Client Name</th>
                                      <th>Amount</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $query = "SELECT * FROM disbursement_voucher LIMIT 5";
                                  $result = mysqli_query($conn, $query);

                                  if (mysqli_num_rows($result) > 0) {
                                      while ($row = mysqli_fetch_assoc($result)) {
                                          echo "<tr>";
                                          echo "<td>" . $row['Jev_No'] . "</td>";
                                          echo "<td>" . $row['descrip'] . "</td>";
                                          echo "<td>" . $row['date_created'] . "</td>";
                                          echo "<td>" . $row['Payee'] . "</td>";
                                          echo "<td>" . '₱'. $row['amount'] . "</td>";
                                          echo "</tr>";
                                      }
                                  } else {
                                      echo "<tr><td colspan='6'>No transactions found.</td></tr>";
                                  }
                                  ?>
                              </tbody>
                          </table>
                      </div>
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