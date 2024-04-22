<!DOCTYPE html>
<?php
require_once "./etc/config.php";
require_once "story.php";
require "./author.php";
try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }

    if (array_key_exists("id", $_GET)) {
        $id = $_GET["id"];
        $story = Story::findById($id);
        if ($story === null) {
            throw new Exception("Story not found");
        }
    }
    else {
        throw new Exception("Missing parametre: story ID");
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $story->headline ?></title>
    <!-- Add your CSS stylesheets and other meta tags here -->
</head>
<body>
    <div class="container">
        <div class="story">
            <?php if (isset($story)) : ?>
                <h2><?= $story->headline ?></h2>
                <p>By <?= Author::findById($story->author_id)->first_name . " " . Author::findById($story->author_id)->last_name ?></p>
                <p><strong>Published Date:</strong> <?= $story->created_at ?></p>
                <div class="content">
                    <?= $story->article ?>
                </div>
            <?php else : ?>
                <p>Story not found.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Add your JavaScript and other scripts here -->
</body>
</html>
  <script src="js/scrollindicator.js"></script>
</body>
</html>