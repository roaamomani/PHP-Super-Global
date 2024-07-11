<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Result</title>
</head>
<body>
    <h2>Calculator Result</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve inputs from the form
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        
        // Perform calculations based on the selected operation
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                echo "<p>$num1 + $num2 = $result</p>";
                break;
            case 'subtract':
                $result = $num1 - $num2;
                echo "<p>$num1 - $num2 = $result</p>";
                break;
            case 'multiply':
                $result = $num1 * $num2;
                echo "<p>$num1 * $num2 = $result</p>";
                break;
            case 'divide':
                if ($num2 == 0) {
                    echo "<p>Error: Division by zero</p>";
                } else {
                    $result = $num1 / $num2;
                    echo "<p>$num1 / $num2 = $result</p>";
                }
                break;
            default:
                echo "<p>Error: Invalid operation</p>";
        }
    } else {
        echo "<p>Error: Form submission method not recognized</p>";
    }
    ?>
    
</body>
</html>
