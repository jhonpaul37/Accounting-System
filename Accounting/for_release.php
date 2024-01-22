<?php
include_once 'includes/dbconnect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Financial Dashboard</title>
<body>
<?php include_once 'navbar.php';?>      
      
<div class="container mt-4">
    <div class="row">

        <!-- Search Form -->
        <form class="mb-3" method="GET" action="search.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search JEV Number" name="search">
                <button class="btn btn-search" type="submit">Search</button>
            </div>
        </form>

        <div class="col-lg-12">
            <div class="card p-4">
                <h2>
                    <?php
                    $currentMonth = date('F');
                    echo "Release for the month of " . $currentMonth;
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
                                <th>Amount</th>
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
                                    echo "<td>" .
                                        // Add Record Form
                                        "<form class=\"mb-3\" method=\"POST\" action=\"add_record.php\">
                                            <div class=\"input-group\">
                                                <input type=\"text\" class=\"form-control\" placeholder=\"Enter DV Number\" name=\"div_number\">
                                                <button class=\"btn btn-add\" type=\"submit\">Add Record</button>
                                            </div>
                                        </form>"
                                        . "</td>";
                            
                                    echo "<td>" . $row['descrip'] . "</td>";
                                    echo "<td>" . $row['date_created'] . "</td>";
                                    echo "<td>" . $row['Payee'] . "</td>";
                                    echo "<td>" . '₱' . $row['amount'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No transactions found for the current month.</td></tr>";
                            }
                            
                            echo "</tbody></table></div></div></div></div></div>";
                            
                            ?>
                        </tbody>
                    </table>
                        
                        <?php
                            // $currentMonth = date("m");
                            // $currentYear = date("Y");

                            // $query = "SELECT * FROM disbursement_voucher 
                            //         WHERE MONTH(date_created) = $currentMonth 
                            //         AND YEAR(date_created) = $currentYear";

                            // $result = mysqli_query($conn, $query);

                            // if (mysqli_num_rows($result) > 0) {
                            //     echo '<div class="accordion" id="accordionExample">';
                                
                            //     $counter = 1;

                            //     while ($row = mysqli_fetch_assoc($result)) {
                            //         echo '<div class="accordion-item">';
                            //             echo '<h2 class="accordion-header" id="heading' . $counter . '">';
                            //                 echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $counter . '" aria-expanded="false" aria-controls="collapse' . $counter . '" style="color: black;">';
                            //                     echo 'JEV Number: ' . $row['Jev_No'];
                            //                 echo '</button>';                                        
                            //             echo '</h2>';
                            //                 echo '<div id="collapse' . $counter . '" class="accordion-collapse collapse" aria-labelledby="heading' . $counter . '" data-bs-parent="#accordionExample">';
                            //                     echo '<div class="accordion-body">';
                            //                         include 'voucher2.php';
                            //                     echo '</div>';
                            //                 echo '</div>';
                            //         echo '</div>';

                            //         $counter++;
                            //     }

                            //     echo '</div>';
                            // } else {
                            //     echo "<p>No transactions found for the current month.</p>";
                            // }

                            // mysqli_close($conn);
                        ?>
                    </div>

                </div>
            </div>
        </div>
       
        <!-- Edit Content -->
        <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="edit_transaction.php">
                            <input type="hidden" name="jev_number" id="editJevNumber" value="">
                            <div class="form-group">
                                <label for="new_amount">New Amount:</label>
                                <input type="text" class="form-control" id="newAmount" name="new_amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

    
    <!--Charts-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="charts.js"></script>

    <style>
        .btn-search{
            background-color: var(--HColor);
            font-weight: 500;
        }
        .btn-search:hover{
            background-color: var(--HColor);
        }
    </style>

    <!-- Edit Content popup-->
    <script>
    $(document).ready(function() {
        $('.edit-button').click(function(event) {
            event.preventDefault();

            const jevNumber = $(this).closest('tr').find('td:first-child').text();
            const currentAmount = $(this).closest('tr').find('td:nth-child(8)').text();

            $('#editJevNumber').val(jevNumber);
            $('#newAmount').val(currentAmount);

            $('#editModal').modal('show');
        });
    });
    </script>

</body>
</html>