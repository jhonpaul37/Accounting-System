<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    global $con; // Include this line if $con is defined in an external file

    // Validate and sanitize inputs
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $selectedSecurityQuestion = filter_var($_POST['security_questions'], FILTER_SANITIZE_STRING);
    $answer = filter_var($_POST['security_answer'], FILTER_SANITIZE_STRING);

    // Check if inputs are empty
    if (empty($username) || empty($selectedSecurityQuestion) || empty($answer)) {
        echo "Please provide both username, selected security question, and answer.";
    } else {
        // Fetch user details from the database
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $correctSecurityQuestion = $row['security_questions'];
            $correctAnswer = $row['security_answer'];

            // Use a secure method to compare answers (e.g., hash_equals)
            if (password_verify($answer, $correctAnswer) && $selectedSecurityQuestion === $correctSecurityQuestion) {
                // Correct answer and selected security question, redirect to change_password.php
                header("Location: change_password.php?username=$username");
                exit();
            } else {
                echo "Incorrect answer or selected security question.";
            }
        } else {
            echo "User not found";
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
    <link rel="stylesheet" href="forgot_password.css">
    <title>Forget Password</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Forget Password</header>
            <form method="post" action="">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field">
                    <label for="security_questions">Choose your Security Question:</label>
                    <select name="security_questions" id="security_questions">
                        <option value="What is your favorite color?">What is your favorite color?</option>
                        <option value="What was the name of your first pet?">What was the name of your first pet?</option>
                        <option value="What city were you born in??">What city were you born in?</option>
                        <option value="What is your favourite movie">What is your favourite movie</option>
                        <option value="Who was your lover?">Who was your lover?</option>
                    </select>
                </div>

                <div class="field input">
                    <label for="security_answer">Answer the Security Question:</label>
                    <input type="text" name="security_answer" id="security_answer" autocomplete="off" required>
                </div>

                <div class="field">
                    <button type="submit" name="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
