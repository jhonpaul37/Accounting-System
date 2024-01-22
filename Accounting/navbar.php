<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
        
        <div class="sticky-nav">
          <div class="top-nav">
              <ul>
                  <li><a href="index.php" >Dashboard</a></li>
                  <li><a href="voucher.php" >Voucher</a></li>
                  <li><a href="for_release.php" >Release</a></li>
                  <li><a href="Expenses-reports.php" >Reports</a></li>
                  <li><a href="Transaction.php">Transactions</a></li>
                  <li><a href="#">Settings</a></li>
              </ul>
          </div>
        </div>
        
        <style>
          :root{
            --WColor: #F6FAFD;
            --BGColor: #5F1315;
            --FColor: #717171;
            --HColor: #F0C519;
                  }
            * {
            margin: 0;
            padding: 0;
            font-family: 'poppins';
            }
            body{
              background-color: #fdf5e6;
            }
            .sticky-nav{
                position: sticky;
                top: 0px;
                z-index: 1000;
            }
            .top-nav {
                background-color: var(--BGColor);
                color: #fff;
                padding: 10px;
            }

            .top-nav ul {
                list-style: none;
                text-align: left;
                margin-left: 20px;
            }

            .top-nav ul li {
                display: inline-block;
                margin: 0 20px;
            }

            .top-nav a {
                text-decoration: none;
                color: #fff;
            }
            .top-nav a {
                text-decoration: none;
                position: relative; 
            }
        </style>

</body>
</html>