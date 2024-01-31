<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Edit Profile</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            include("config.php");

            if(isset($_POST['update'])){
                $user_id = $_SESSION['user_id']; // Assuming you have a session for user authentication

                $username = $_POST['username'];
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $position = $_POST['position'];

                // Update the user profile
                $update_query = mysqli_query($con, "UPDATE users SET Username='$username', Email='$email', Fullname='$fullname', position='$position' WHERE user_id=$user_id");

                if($update_query) {
                    echo "<div class='message'>
                            <p>Profile updated successfully!</p>
                          </div> <br>";
                } else {
                    echo "<div class='message'>
                            <p>Error updating profile. Please try again.</p>
                          </div> <br>";
                }
            } else {
                // Fetch user details for pre-filling the form
                $user_id = $_SESSION['user_id']; // Assuming you have a session for user authentication
                $fetch_query = mysqli_query($con, "SELECT * FROM users WHERE user_id=$user_id");
                $user_data = mysqli_fetch_assoc($fetch_query);

            ?>
            <header>Edit Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" value="<?php echo $user_data['Username']; ?>" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" value="<?php echo $user_data['Email']; ?>" required>
                </div>

                <div class="field input">
                    <label for="fullname">FullName</label>
                    <input type="text" name="fullname" id="fullname" autocomplete="off" value="<?php echo $user_data['Fullname']; ?>" required>
                </div>

                <div class="field input">
                    <label for="position">Position</label>
                    <input type="text" name="position" id="position" autocomplete="off" value="<?php echo $user_data['position']; ?>" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="update" value="Update Profile" required>
                </div>

                <div class="links">
                    <a href="dashboard.php">Back to Dashboard</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
