<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project and Script Name</title>
</head>
<body>
    <h2>Project Name and Script Name</h2>
    
    <p><strong>Project Name:</strong> <?php echo htmlspecialchars($_SERVER['DOCUMENT_ROOT']); ?></p>
    <p><strong>Script Name:</strong> <?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?></p>
    
</body>
</html>

