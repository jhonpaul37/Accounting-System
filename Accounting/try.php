<?php
            $currentMonth = date("m");
            $currentYear = date("Y");

            $query = "SELECT * FROM disbursement_voucher 
                    WHERE MONTH(date_created) = $currentMonth 
                    AND YEAR(date_created) = $currentYear";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="accordion" id="accordionExample">';
                
                $counter = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="accordion-item">';
                        echo '<h2 class="accordion-header" id="heading' . $counter . '">';
                            echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $counter . '" aria-expanded="false" aria-controls="collapse' . $counter . '">';
                                echo 'JEV Number: ' . $row['Jev_No'];
                            echo '</button>';
                        echo '</h2>';
                            echo '<div id="collapse' . $counter . '" class="accordion-collapse collapse" aria-labelledby="heading' . $counter . '" data-bs-parent="#accordionExample">';
                                echo '<div class="accordion-body">';
                                    include 'voucher2.php';
                                echo '</div>';
                            echo '</div>';
                    echo '</div>';

                    $counter++;
                }

                echo '</div>';
            } else {
                echo "<p>No transactions found for the current month.</p>";
            }

            mysqli_close($conn);
            ?>