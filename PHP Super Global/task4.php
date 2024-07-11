<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        .task-list {
            list-style-type: none;
            padding: 0;
        }
        .task-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>To-Do List</h2>
    
    <!-- Form to add tasks -->
    <form action="todo.php" method="post">
        <label for="task">Add Task:</label>
        <input type="text" id="task" name="task" required>
        <button type="submit">Add</button>
    </form>
    
    <hr>
    
    <!-- Display tasks -->
    <h3>Tasks:</h3>
    <ul class="task-list">
        <?php include 'tasks.php'; ?>
    </ul>
    <?php
session_start();

// Initialize tasks array if not already set in session
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}

// Add task if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    $_SESSION['tasks'][] = $task;
}

// Display tasks
foreach ($_SESSION['tasks'] as $index => $task) {
    echo "<li>$task <a href='todo.php?delete=$index'>[Delete]</a></li>";
}
?>

</body>
</html>
