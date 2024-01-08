<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
        <!-- <nav class="navbar bg-nav-custom fixed-top navbar-expand-lg top-nav">
          
            <style>.bg-nav-custom { background-color: #5F1315; } </style>

            <a class="navbar-brand mb-0 h1 text-light">Budget</a>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link text-white-50" aria-current="page" href="index.php">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white-50" href="voucher.php">Voucher</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white-50" href="Expenses-reports.php">Reports</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white-50" href="transaction.php">Transactions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white-50" href="#">Settings</a>
                  </li>
                </ul>
                
              </div>
        </nav> -->
        
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