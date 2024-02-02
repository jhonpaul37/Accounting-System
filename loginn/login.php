<?php
session_start();

include("config.php");

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']); // Change 'email' to 'username'
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT user_id, username, fullname, password FROM users WHERE username = ?"); // Change 'email' to 'username'
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $returned_username, $fullname, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['valid'] = $returned_username; // Change 'email' to 'username'
            $_SESSION['username'] = $returned_username;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['id'] = $user_id;
            header("Location: home.php"); // Replace with the actual home file name
            exit();
        } else {
            echo "<div class='message'>
                    <p>Wrong Username or Password</p>
                </div> <br>";
            echo "<a href='login.php'><button class='btn'>Go Back</button>";
        }
    } else {
        echo "<div class='message'>
                <p>Wrong Username or Password</p>
            </div> <br>";
        echo "<a href='login.php'><button class='btn'>Go Back</button>";
    }

    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label> 
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>

                <div class="links">
                    Don't have an account? <a href="register.php">Register here</a>
                </div>
                
                <div class="links">
                    <a href="forgot_password.php">Forget Password</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
