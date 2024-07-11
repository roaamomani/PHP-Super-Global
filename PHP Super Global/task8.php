<?php
session_start();

// Function to get the client IP address
function getClientIP() {
    // Check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validateIP($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // Check for IP from proxy or load balancer
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Check if multiple IPs exist in HTTP_X_FORWARDED_FOR header
        $ip_list = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ip_list as $ip) {
            if (validateIP($ip)) {
                return $ip;
            }
        }
    }

    // Default: REMOTE_ADDR
    return $_SERVER['REMOTE_ADDR'];
}

// Function to validate IP address format
function validateIP($ip) {
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}

// Function to check if a visitor has already visited (using cookies)
function checkUniqueVisit() {
    $ip = getClientIP();
    $cookie_name = 'unique_visit_' . md5($ip);

    if (!isset($_COOKIE[$cookie_name])) {
        // Set cookie to track unique visit for 1 day
        setcookie($cookie_name, 'visited', time() + (86400 * 1), '/'); // 86400 seconds = 1 day

        // Increment server-side counter for unique visitors (optional)
        if (!isset($_SESSION['unique_visitors'])) {
            $_SESSION['unique_visitors'] = 0;
        }
        $_SESSION['unique_visitors']++;
    }
}

// Check for unique visit and update counter
checkUniqueVisit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number of Unique Visitors</title>
</head>
<body>
    <h2>Number of Unique Visitors</h2>
    
    <p>Unique visitors today: <?php echo isset($_SESSION['unique_visitors']) ? $_SESSION['unique_visitors'] : 0; ?></p>
    
    <p>Refresh this page to see the counter update.</p>
</body>
</html>
