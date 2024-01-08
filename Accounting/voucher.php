<?php include_once 'includes/dbconnect.php'; ?>
<html>
    <head>
        <link rel="stylesheet" href="CSS/form.css">
    </head>
    <body>
        
        <?php include_once 'navbar.php';?>

        <form class="container" action="add_voucher.php" method="post">    
        

            <img src="header.png" alt="BSC-header" style="margin-left:-13px; height:90px; width:100%;">
            <div>
                <table >
                    <tr colspan="6">
                        <td rowspan="3" colspan = "4" style="width:100px;">Disbursment Voucher</td>
                        <td colspan="2">
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
                            </td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                    </tr>
                    <td>DV.No: </td>

                    <tr  colspan ="6">
                        <td style="width:80px;">Mode of Payment</td>
                        <td style="border:0;"><input type="checkbox"> Mds Check</td>
                        <td style="border:0;"><input type="checkbox"> Comercial Check</td>
                        <td style="border:0;"><input type="checkbox"> ADA</td>
                        <td style="border:0;"><input type="checkbox"> Others (Please Specify)</td>
                    </tr>
                    <tr colspan ="5">
                        <td >Payee</td>
                        <td colspan = "2"><input class="payee" tpye="text"></td>
                        <td>Tin/Employee No.:</td>
                        <td>ORS/BURS No.</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td colspan = "4"><input class="Address" type="text"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width:30%;">Particulars</td>
                        <td>Responsibility Center</td>
                        <td>MFO/PAP</td>
                        <td>Amount</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:100px;border-bottom-style:none;"><textarea class="particulars"></textarea>
                        </td>
                        <td style="height:100px;border-bottom-style:none;"><textarea class="particulars" ></textarea></td>
                        <td style="height:100px;border-bottom-style:none;"><textarea class="particulars"></textarea></td>
                        <td style="height:100px; border-bottom-style:none;"><textarea placeholder="Number only" id ="amount"class="amount"></textarea></td>
                    </tr>
                    <tr>
                        <td style="border-top-style:none; border-bottom-style:none;border-right-style:none; "><input type="text" placeholder="Name" style="border:none;"></td>
                        <td style="border-top-style:none; border-bottom-style:none; border-left-style:none;"><input type="text" placeholder="Amount" style="border:none;"></td>
                        <td style="border-top-style:none; border-bottom-style:none;"></td>
                        <td style="border-top-style:none; border-bottom-style:none;"></td>
                        <td style="border-top-style:none; border-bottom-style:none;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-top-style:none">Amount Due</td>
                        <td style="border-top-style:none"></td>
                        <td style="border-top-style:none"></td>
                        <td>P<span id="totalAmount">0.00</span></td>
                        <script src="amount.js"></script>
                    </tr>
                    <tr>
                        <td style="width:20px;display:inline-block">A.</td>
                        <td colspan="4" style="text-align:left;border-bottom-style:none;border-left-style:none;">Certified: Expenses/Cash Advance necessary, lawful under my direct supervision.</td>
                    </tr>
                    <tr>
                        <td colspan = "5"style="border-bottom-style:none;border-top-style:none;font-weight:bold; text-decoration:underline; text-align: center; height:50px; vertical-align:bottom">ROMINA KATRINA BAYARAS-BERNARDO</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border-top-style:none;">
                            Dir. Admin & Finance Service
                        </td>
                    </tr>
                    <tr>
                        <td style="width:20px;display:inline-block;">B.</td>
                        <td colspan="4" style="text-align:left; border-left-style:none;">Accounting Entry:</td>
                    </tr>
                    <tr>
                        <td colspan="2">Account Title</td>
                        <td>UACS Code</td>
                        <td>Debit</td>
                        <td>Credit</td> 
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom-style:none;"><input type="text" style="border:none; width:100%;"></td>
                        <td style="border-bottom-style:none;"><input type="text" style="border:none; width:100%;"></td>
                        <td style="border-bottom-style:none;"><input type="text" style="border:none; width:100%;"></td>
                        <td style="border-bottom-style:none;"><input type="text" style="border:none; width:100%;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-top-style:none;"><input type="text" style="border:none; width:100%;"></td>
                        <td style="border-top-style:none;"><input type="text" style="border:none; width:100%;"></td>
                        <td style="border-top-style:none;"><input type="text" style="border:none; width:100%;"></td>
                        <td style="border-top-style:none;"><input type="text" style="border:none; width:100%;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left; padding-left:10px;">C. Certified:</td>
                        <td colspan="2" style="text-align: left;padding-left:10px;">D. Approved for payment</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border-bottom-style:none;text-align:left;padding-left:10px;"><input type="checkbox"> Cash Available</td>
                        <td colspan="2" rowspan="3"><input type="text" style="border:none; width:100%;height:100%;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border-top-style:none;border-bottom-style:none;text-align:left;padding-left:10px;"><input type="checkbox"> Subject to Authority to Debit Account (when applicable)</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border-top-style:none; text-align:left;padding-left:10px;"><input type="checkbox"> Supporting documents complete and amount claimed proper</td>
                    </tr>
                    <tr>
                        <td style="width:50px;height:30px;">Signature</td>
                        <td colspan="2"></td>
                        <td>Signature</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Printed Name</td>
                        <td colspan="2">RHEA ANGELLICA B. ADDATU, CPA</td>
                        <td>Printed Name</td>
                        <td>DJOVI REGALA DURANTE,DPA</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Position</td>
                        <td colspan="2">College Accountant</td>
                        <td rowspan="2">Position</td>
                        <td>SUC President I</td>
                    </tr>
                    <tr >
                        <td colspan="2">Head, Accounting Unit/Authorized representative</td>
                        <td>Agency Head/Authorized Representative</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td colspan="2"><input type="text" style="width:100%;border:none;"></td>
                        <td>Date</td>
                        <td><input type="text" style="border:none; width:100%;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:left; padding-left:10px;">
                            E. Receipts of Payment
                        </td>
                        <td style="border-bottom-style:none;text-align:left;">JEV No.</td>
                    </tr>
                    <tr>
                        <td>Check/ADA No:</td>
                        <td><input type="text" style="width:100%;border:none;"></td>
                        <td style="text-align: left;">Date:<input type="text" style="width:100%;border:none;"></td>
                        <td style="text-align: left;">Bank Name & Account No: <input type="text" style="border:none; width:100%;"></td>
                        <td style="border-top-style:none;"><input type="text" style="width:100%;border:none;"></td>
                    </tr>
                    <tr>
                        <td>Signature</td>
                        <td></td>
                        <td style="text-align: left;">Date:<input type="text" style="border:none;width:100%;"></td>
                        <td style="text-align: left;">Printed Name<input type="text" style="border:none;width:100%;"></td>
                        <td style="text-align: left;">Date<input type="text" style="border:none; width:100%;"></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: left;">Official Receipt No. & Date/Other Documents</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;padding-right:10px;">Anex G-3</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border-bottom-style:none">JOURNAL ENTRY VOUCHER</td>
                        <td colspan="2" style="border-bottom-style:none;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border-top-style:none; border-bottom-style:none; text-decoration: underline;">BATANES STATE COLLEGE</td>
                        <td colspan="2" style="text-align:left;border-top-style:none;border-bottom-style:none;">No.<input type="text" style="border-top-style:none; text-decoration: underline; width:80%; border:none;margin-left:10px;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border-top-style:none">Agency Name</td>
                        <td colspan="2" style="border-top-style:none; text-align:left;">Date <input type="text" style="border:none; width:80%;"></td>
                    </tr>
                    <tr>
                        <td>Responsibility Center</td>
                        <td colspan="4">ACCOUNTING ENTRIES </td>
                    </tr>
                    <tr>
                        <td rowspan="2">Accounts and Explanations</td>
                        <td rowspan="2">Account Code</td>
                        <td rowspan="2">Ref</td>
                        <td colspan="2">Amount</td>
                    </tr>
                    <tr>
                        <td>Debit</td>
                        <td>Credit</td>
                    </tr>
                    <tr>
                        <td><input type="text" style="border:none; width:100%;"></td>
                        <td><input type="text" style="border:none; width:100%;"></td>
                        <td></td>
                        <td><input type="text" style="border:none; width:100%;"id="debit1"></td>
                        <td><input type="text" style="border:none; width:100%;"id="credit1"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="border:none; width:100%;"></td>
                        <td><input type="text" style="border:none; width:100%;"></td>
                        <td></td>
                        <td><input type="text" style="border:none; width:100%;" id="debit2"></td>
                        <td><input type="text" style="border:none; width:100%;" id="credit2"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:right; padding-right:10px;">Total</td>
                        <td><span id="result1">0.00</span></td>
                        <script src="debit.js"></script>
                        <td><span id="result2">0.00</span></td>
                        <script src="credit.js"></script>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:left; border-bottom-style:none;">Prepared by:</td>
                        <td colspan="3" style="text-align:left; border-bottom-style:none;">Approved by:</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-top-style:none;border-bottom-style:none;"><input type="text" style="width:100%; text-align: center; border:none;"></td>
                        <td colspan="3" style="border-top-style:none;border-bottom-style:none;"><input type="text" style="width:100%; text-align: center; border:none;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-top-style:none;"><input type="text" style="border:none; width:100%; text-align: center;"></td>
                        <td colspan="3" style="border-top-style:none;"><input type="text" style="border:none; width:100%; text-align: center;"></td>
                    </tr>
                </table>
                            </div>

            <footer>
                <img src="footer.png" alt="footer" style="width:100%; height:97px;">
            </footer>
        </form>
        <div class="print-area">
            <button onclick="printTable()">Print</button>
        </div>
    </body>
</html>