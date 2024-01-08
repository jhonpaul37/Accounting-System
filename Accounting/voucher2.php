<?php
include_once 'includes/dbconnect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                      <h2>Add Transaction</h2>
                      <form action="add_voucher.php" method="post">

                        <div>
                            <label for="fundCluster">Fund Cluster:</label>
                            <select id="fundCluster" name="fundCluster">
                                <!-- options from the database -->
                                <?php
                                $sqlClusters = "SELECT F_cluster FROM fund_clusters";
                                $resultClusters = mysqli_query($conn, $sqlClusters);

                                // Check Cluster
                                if ($resultClusters && mysqli_num_rows($resultClusters) > 0) {
                                    while ($rowCluster = mysqli_fetch_assoc($resultClusters)) {
                                        echo "<option value='" . $rowCluster['F_cluster'] . "'>" . $rowCluster['F_cluster'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label for="jevNumber">JEV Number:</label>
                            <!-- <?php
                            // Get the current year and month
                            //$currentYear = date('Y');
                            //$currentMonth = date('m');

                            // two digits of the year
                            //$TwoDigitsYear = substr($currentYear, -2);
                            //$yearMonth = $TwoDigitsYear . $currentMonth;
                            ?> -->
                            <input type="text" id="jevNumber" name="jevNumber" value="<?php //echo $yearMonth; ?>">
                        </div>

                          <div>
                              <label for="description">Description:</label>
                              <input type="text" id="description" name="description">
                          </div>
                          <div>
                              <label for="clientName">Client Name:</label>
                              <input type="text" id="clientName" name="clientName">
                          </div>
                          <div>
                              <label for="amount">Amount:</label>
                              <input type="number" id="amount" name="amount">
                          </div>
                          <div>
                              <input type="submit" value="Add Transaction">
                          </div>
                      </form>
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