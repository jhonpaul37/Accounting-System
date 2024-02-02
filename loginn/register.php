<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Register</title> 
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            include("config.php");

            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $position = $_POST['position'];
                $password = $_POST['password'];
                $securityQuestions = $_POST['security_questions'];
                $securityAnswer = $_POST['security_answer'];

                // Verify the unique email
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if(mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                            <p>This email is used, Try another One Please!</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    // Hash the password before storing it in the database
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $hashed_securityAnswer = password_hash($securityAnswer, PASSWORD_BCRYPT);

                    mysqli_query($con, "INSERT INTO users(Username, Email, Fullname, position, Password, security_questions, security_answer) VALUES('$username','$email','$fullname','$position', '$hashed_password', '$securityQuestions', '$hashed_securityAnswer')") or die("Error Occurred");

                    echo "<div class='message'>
                            <p>Registration successfully!</p>
                          </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Login Now</button>";
                }
            } else {
            ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="fullname">FullName</label>
                    <input type="text" name="fullname" id="fullname" autocomplete="off" required>
                </div>

                <div class="field">
                    <label>Position:</label>
                    <select name="position" id="position" required>
                        <option>Select Position</option>
                        <option value="Instructor I">Instructor I</option>
                        <option value="Instructor II">Instructor II</option>
                        <option value="Instructor III">Instructor III</option>
                        <option value="Assistant Professor I">Assistant Professor I</option>
                        <option value="Assistant Professor II">Assistant Professor II</option>
                        <option value="Assistant Professor III">Assistant Professor III</option>
                        <option value="Assistant Professor IV">Assistant Professor IV</option>
                        <option value="Professor I">Professor I</option>
                        <option value="Professor II">Professor II</option>
                        <option value="Professor III">Professor III</option>
                        <option value="Professor IV">Professor IV</option>
                        <option value="Professor V">Professor V</option>
                        <option value="Professor VI">Professor VI</option>
                        <option value="College/University Professor">College/University Professor</option>
                    </select>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <label for="security_questions">Choose your Security Question:</label>
                    <select name="security_questions" id="security_questions" required>
                        <option> Select Security Question </option>
                        <option value="What is your favorite color?">What is your favorite color?</option>
                        <option value="What was the name of your first pet?">What was the name of your first pet?</option>
                        <option value="What city were you born in??">What city were you born in?</option>
                        <option value="What is your favourite movie">What is your favourite movie</option>
                        <option value="Who was your lover?">Who was your lover?</option>
                    </select>
                </div>

                <div class="field input">
                    <label for="security_answer">Your Answer:</label>
                    <input type="password" name="security_answer" id="security_answer" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>

                <div class="links">
                    Already registered? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
