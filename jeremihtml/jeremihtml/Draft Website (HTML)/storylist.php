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
    <title>Stories</title>
    <!-- Add your CSS and other head elements here -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Libre+Franklin:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="CSS/reset.css" />
	<link rel="stylesheet" href="CSS/grid.css" />
	<link rel="stylesheet" href="CSS/style.css" />
	<link rel="stylesheet" href="CSS/lip.css" />
	<link rel="stylesheet" href="CSS/lio.css" />
	<link rel="stylesheet" href="CSS/gofurther.css" />
	<link rel="stylesheet" href="CSS/carousel.css" />
	<link rel="stylesheet" href="CSS/newsletter.css" />
	<link rel="stylesheet" href="CSS/editchoice.css" />
	<link rel="stylesheet" href="CSS/followspot.css" />
    <link rel="stylesheet" href="CSS/footer.css" />
    <link rel="stylesheet" href="CSS/storylist.css" />

</head>
<body>
<section class="header">
		<div class="containerHead">
			<div class="width-6">
            <a href="index.php" class="title">
    <div class="titandlin">
        <h1>Maison du Classique</h1>
        <div class="lines">
            <hr class="thin1">
            <hr class="thick1">
        </div>
    </div>
    <div class="logo">
        <img src="images/logo.png" alt="Logo">
    </div>
</a>

			</div>
            <div class="width-6">
                <div class="options">
                    <h2>Newsletter</h2>
                    <a href=""><img class="spotify1" src="images/spotwhite.png" alt="White Spotify logo"></a>
                    <img src="images/magiconw.png" alt="Magnifying glass icon">
                </div>
            </div>
		</div>
	</section>

    <section class="subHeader">
    <div class="container">
        <div class="width-12">
            <ul class="categories">
                <li><a href="storylist.php?category_id=1"><h1>Piano</h1></a></li>
                <li><a href="storylist.php?category_id=2"><h1>Orchestra</h1></a></li>
                <li><a href="storylist.php?category_id=5"><h1>Opera</h1></a></li>
                <li><a href="storylist.php?category_id=4"><h1>History</h1></a></li>
                <li><a href="storylist.php?category_id=3"><h1>Editor's Choice</h1></a></li>
            </ul>
        </div>
    </div>
</section>

    <div class="story-list">
    <?php foreach ($stories as $story):
        $headline = $story->headline; // Corrected variable name
            if (strlen($headline) > 50) {
                // Find the position of the last space within the substring of the headline
                $last_space = strrpos(substr($headline, 0, 50), ' ');
                if ($last_space !== false) {
                    $headline = substr($headline, 0, $last_space) . '...'; // Truncate at the last space
                } else {
                    $headline = substr($headline, 0, 50) . '...'; // Truncate at character limit if no space found
                }
            }
            ?>
        <div class="story">
            <div class="container">
                <div class="width-3">
                    <h2><?= $headline ?></h2>
                    <p><?= substr($story->article, 0, 400) ?></p>
                </div>
                <div class="width-3">
                    <img src="images/<?= $story->img_url ?>" />
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>



    
    <div class="footer">
        <div class="container">
            <div class="socials width-12">
    <!--Facebook-->        <svg class="facebook" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30">
    <path d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z"></path>
</svg>

   <!--X-->  <svg class="x" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
<path d="M 6.9199219 6 L 21.136719 26.726562 L 6.2285156 44 L 9.40625 44 L 22.544922 28.777344 L 32.986328 44 L 43 44 L 28.123047 22.3125 L 42.203125 6 L 39.027344 6 L 26.716797 20.261719 L 16.933594 6 L 6.9199219 6 z"></path>
</svg>

<!--Insta--> <svg class="insta" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 26 26">
<path d="M 7.546875 0 C 3.390625 0 0 3.390625 0 7.546875 L 0 18.453125 C 0 22.609375 3.390625 26 7.546875 26 L 18.453125 26 C 22.609375 26 26 22.609375 26 18.453125 L 26 7.546875 C 26 3.390625 22.609375 0 18.453125 0 Z M 7.546875 2 L 18.453125 2 C 21.527344 2 24 4.46875 24 7.546875 L 24 18.453125 C 24 21.527344 21.53125 24 18.453125 24 L 7.546875 24 C 4.472656 24 2 21.53125 2 18.453125 L 2 7.546875 C 2 4.472656 4.46875 2 7.546875 2 Z M 20.5 4 C 19.671875 4 19 4.671875 19 5.5 C 19 6.328125 19.671875 7 20.5 7 C 21.328125 7 22 6.328125 22 5.5 C 22 4.671875 21.328125 4 20.5 4 Z M 13 6 C 9.144531 6 6 9.144531 6 13 C 6 16.855469 9.144531 20 13 20 C 16.855469 20 20 16.855469 20 13 C 20 9.144531 16.855469 6 13 6 Z M 13 8 C 15.773438 8 18 10.226563 18 13 C 18 15.773438 15.773438 18 13 18 C 10.226563 18 8 15.773438 8 13 C 8 10.226563 10.226563 8 13 8 Z"></path>
</svg>

<!--YouTube--> <svg class="youtube" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 64 64">
<path d="M53.527,17.427C55.714,19.677,56,23.252,56,32s-0.286,12.323-2.473,14.573C51.34,48.822,49.062,49,32,49	s-19.34-0.178-21.527-2.427C8.286,44.323,8,40.748,8,32s0.286-12.323,2.473-14.573S14.938,15,32,15S51.34,15.178,53.527,17.427z M27.95,39.417l12.146-7.038L27.95,25.451V39.417z"></path>
</svg>

<!--Spotify--> <svg class="spotify" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30">
    <path d="M15,3C8.4,3,3,8.4,3,15s5.4,12,12,12s12-5.4,12-12S21.6,3,15,3z M19.731,21c-0.22,0-0.33-0.11-0.55-0.22 c-1.65-0.991-3.74-1.54-5.94-1.54c-1.21,0-2.53,0.22-3.63,0.44c-0.22,0-0.44,0.11-0.55,0.11c-0.44,0-0.77-0.33-0.77-0.77 s0.22-0.77,0.66-0.77c1.43-0.33,2.861-0.55,4.401-0.55c2.53,0,4.84,0.66,6.82,1.76c0.22,0.22,0.44,0.33,0.44,0.77 C20.39,20.78,20.06,21,19.731,21z M20.94,17.921c-0.22,0-0.44-0.11-0.66-0.22c-1.87-1.21-4.511-1.87-7.37-1.87 c-1.43,0-2.751,0.22-3.74,0.44c-0.22,0.11-0.33,0.11-0.55,0.11c-0.55,0-0.881-0.44-0.881-0.881c0-0.55,0.22-0.77,0.77-0.991 c1.32-0.33,2.641-0.66,4.511-0.66c3.08,0,5.94,0.77,8.361,2.2c0.33,0.22,0.55,0.55,0.55,0.881 C21.82,17.48,21.491,17.921,20.94,17.921z M22.37,14.4c-0.22,0-0.33-0.11-0.66-0.22c-2.2-1.21-5.39-1.98-8.47-1.98 c-1.54,0-3.19,0.22-4.621,0.55c-0.22,0-0.33,0.11-0.66,0.11c-0.66,0.111-1.1-0.44-1.1-1.099s0.33-0.991,0.77-1.1 C9.39,10.22,11.26,10,13.24,10c3.41,0,6.93,0.77,9.681,2.2c0.33,0.22,0.66,0.55,0.66,1.1C23.471,13.96,23.03,14.4,22.37,14.4z"></path>
</svg>



</div>
<div class="width-12">
    <div class="footerHeader">
            <ul class="footerTitle">
    <li><h1>Home</h1></li>
    <li><h1>Privacy Policy</h1></li>
    <li><h1>Terms of Use</h1></li>
    <li><h1>About Us</h1></li>
    <li><h1>Disclaimer</h1></li>
    <li><h1>Contact Us</h1></li>
  </ul>
</div>
			</div>
</div>
</div>


    <div class="bottomFooter">
        <div class="container">
            <div class="width-12 content">
                <div class="footerText">
                    <p>Copyright © 2024 Maison du Musique. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>