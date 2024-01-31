<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize inputs
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $newPassword = $_POST['new_password']; // You may want to add additional validation/sanitization

    // Check if inputs are empty
    if (empty($username) || empty($newPassword)) {
        echo "Please provide both username and new password.";
    } else {
        // Hash the new password before updating it in the database
        $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Update the password in the database
        $query = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ss', $hashedNewPassword, $username);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Password updated successfully, redirect to home page
            header("Location: home.php");
            exit();
        } else {
            echo "Failed to update password. Please try again.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Change Password</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Change Password</header>
            <form method="post" action="">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" autocomplete="off" required>
                </div>

                <div class="field">
                    <button type="submit" name="submit" class="btn">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
