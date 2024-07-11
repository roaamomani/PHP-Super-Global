<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Search Engine</title>
</head>
<body>
    <h2>Enter URL to Redirect:</h2>
    <form action="redirect.php" method="get">
        <input type="text" name="url" placeholder="Enter URL" required>
        <button type="submit">GO</button>
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the URL from the query string
    $url = $_GET['url'];
    
    // Validate the URL (optional)
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        // Perform the redirection
        header("Location: $url");
        exit;
    } else {
        // Invalid URL, handle the error
        echo "<h2>Error: Invalid URL format</h2>";
        echo "<p>Please enter a valid URL.</p>";
    }
} else {
    // Invalid request method, handle the error
    echo "<h2>Error: Invalid request method</h2>";
}
?>




</body>
</html>
