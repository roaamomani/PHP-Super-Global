<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling</title>
</head>
<body>
    <form action="handle_form.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
    <?php
// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and password from $_POST superglobal
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Display the received data
    echo "<h2>Form Data Received (POST method)</h2>";
    echo "<p>Email: $email</p>";
    echo "<p>Password: $password</p>";
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    // This block is not necessary for the current task but included for completeness
    echo "<h2>Form Data Received (GET method)</h2>";
    // Retrieve the email and password from $_GET superglobal
    $email = $_GET['email'];
    $password = $_GET['password'];
    
    // Display the received data
    echo "<p>Email: $email</p>";
    echo "<p>Password: $password</p>";
} else {
    // If neither GET nor POST, handle accordingly
    echo "<h2>Error: Invalid request method</h2>";
}
?>

</body>
</html>
