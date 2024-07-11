<?php
session_start();

// Initialize counter variable
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// Increment counter on page refresh
$_SESSION['counter']++;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Counter (Session)</title>
</head>
<body>
    <h2>Website Counter (Session)</h2>
    
    <p>This page has been refreshed <strong><?php echo $_SESSION['counter']; ?></strong> times.</p>
    
    <p>Refresh this page to see the counter increment.</p>
</body>
</html>
