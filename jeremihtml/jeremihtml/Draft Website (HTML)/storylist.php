<?php
require_once "./etc/config.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }

    if (array_key_exists("category_id", $_GET)) {
        $category_id = $_GET["category_id"];
        // Fetch all stories for the given category_id
        $stories = Story::findByCategory($category_id);
        if (empty($stories)) {
            throw new Exception("No stories found for category_id: $category_id");
        }
    } else {
        throw new Exception("Missing parameter: category_id");
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stories by Category</title>
    <!-- Add your CSS and other head elements here -->
</head>
<body>
    <!-- Display the stories -->
    <div class="story-list">
    <?php foreach ($stories as $story): ?>
    <div class="story">
        <h2><?= htmlspecialchars($story->headline) ?></h2>
        <p><?= htmlspecialchars($story->article) ?></p>
        <!-- Add other story details here -->
    </div>
<?php endforeach; ?>
    </div>

    <!-- Add your footer or other HTML elements here -->
</body>
</html>