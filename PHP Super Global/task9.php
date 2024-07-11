<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cookies</title>
</head>
<body>
    <h2>Manage Cookies</h2>
    
    <?php
    // Function to create a cookie
    function createCookie($name, $value, $expiry, $path = '/', $domain = '', $secure = false, $httponly = false) {
        setcookie($name, $value, $expiry, $path, $domain, $secure, $httponly);
    }

    // Function to retrieve all cookies
    function getAllCookies() {
        echo "<h3>All Cookies:</h3>";
        echo "<ul>";
        foreach ($_COOKIE as $name => $value) {
            echo "<li><strong>$name:</strong> $value <a href='manage_cookies.php?delete=$name'>[Delete]</a></li>";
        }
        echo "</ul>";
    }

    // Function to delete a cookie
    function deleteCookie($name) {
        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
            setcookie($name, '', time() - 3600, '/');
            echo "<p>Cookie '$name' deleted.</p>";
        } else {
            echo "<p>Cookie '$name' not found.</p>";
        }
    }

    // Handle cookie deletion if delete parameter is set
    if (isset($_GET['delete'])) {
        $cookie_name = $_GET['delete'];
        deleteCookie($cookie_name);
    }

    // Handle form submission to create a new cookie
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cookie_name = $_POST['cookie_name'];
        $cookie_value = $_POST['cookie_value'];
        $expiry = time() + (int)$_POST['expiry_time']; // Expiry in seconds from current time
        $path = $_POST['cookie_path'];
        $domain = $_POST['cookie_domain'];
        $secure = isset($_POST['cookie_secure']);
        $httponly = isset($_POST['cookie_httponly']);

        createCookie($cookie_name, $cookie_value, $expiry, $path, $domain, $secure, $httponly);
        echo "<p>Cookie '$cookie_name' created successfully.</p>";
    }

    // Display form to create new cookies
    ?>
    <h3>Create New Cookie</h3>
    <form action="manage_cookies.php" method="post">
        <label for="cookie_name">Cookie Name:</label>
        <input type="text" id="cookie_name" name="cookie_name" required><br><br>
        
        <label for="cookie_value">Cookie Value:</label>
        <input type="text" id="cookie_value" name="cookie_value" required><br><br>
        
        <label for="expiry_time">Expiry Time (seconds):</label>
        <input type="number" id="expiry_time" name="expiry_time" required><br><br>
        
        <label for="cookie_path">Path:</label>
        <input type="text" id="cookie_path" name="cookie_path" value="/" required><br><br>
        
        <label for="cookie_domain">Domain:</label>
        <input type="text" id="cookie_domain" name="cookie_domain"><br><br>
        
        <input type="checkbox" id="cookie_secure" name="cookie_secure">
        <label for="cookie_secure">Secure (HTTPS only)</label><br><br>
        
        <input type="checkbox" id="cookie_httponly" name="cookie_httponly">
        <label for="cookie_httponly">HTTP Only</label><br><br>
        
        <button type="submit">Create Cookie</button>
    </form>
    
    <?php
    // Display all cookies
    getAllCookies();
    ?>
</body>
</html>
