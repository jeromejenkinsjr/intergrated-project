<!DOCTYPE html>
<?php

require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

$categoryId = 1;
$pianoArt = Story::findByCategory($categoryId);
$orchestraCategoryId = 2;
$orchestraArt = Story::findByCategory($orchestraCategoryId); // Fetch orchestra articles
$operaCategoryId = 5;
$operaArt = Story::findByCategory($operaCategoryId);
$historyCategoryId = 4;
$historyArt = Story::findByCategory($historyCategoryId);


?>
<html lang="en">

<head>
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
	<title>Maison du Classique</title>
	<style>
		/* Custom styles for the unordered list */
		li {
			list-style-type: circle;
			/* Use filled circles as bullet points */
		}
	</style>
</head>

<body>
	<section class="header">
		<div class="containerHead">
			<div class="width-12">
				<div class="title">
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
				</div>
			</div>
		</div>
	</section>
	<!-- Medium Arcticles -->
	<section class="articleBlockHead">
		<div class="container">
			<div class="panel width-6">
				<!-- <div class="img"></div> -->
				<img src="images/bigarticleimg.png" alt="Orchestra standing with conductor" />
				<h1>Musicians Tell Audience Their Orchestra Is Mismanaged</h1>
				<hr class="lineheadthin">
				<div class="authoranddate">
					<p>Norman Lebrecht</p>
					<p>February 14th, 2024</p>
				</div>
				<hr class="lineheadthick">
			</div>
			<div class="carouselSect width-6">
    <div class="carousel">
	<?php 
usort($operaArt, 'sortByCreatedAtDesc');
$operaArtC = array_slice($operaArt, 0, 3);
?>
<div class="carousel__items">
    <?php foreach ($operaArtC as $s) {
        // Check if the article's category matches the current category ID
        if ($s->category_id === $operaCategoryId) { 
            $headline = $s->headline;
            if (strlen($headline) > 40) {
                // Find the position of the last space within the substring of the headline
                $last_space = strrpos(substr($headline, 0, 40), ' ');
                if ($last_space !== false) {
                    $headline = substr($headline, 0, $last_space) . '...'; // Truncate at the last space
                } else {
                    $headline = substr($headline, 0, 40) . '...'; // Truncate at character limit if no space found
                }
            }
            ?>
            <a href="webpage.php?id=<?= $s->id ?>" class="carousel__item"> <!-- Add the <a> tag here -->
                <div class="images">
                    <img src="images/<?= $s->img_url ?>" />
                    <div class="overlayGradient"></div>
                    <h2 class="overlayText"><?= $headline ?></h2>
                </div>
                <div class="text-container">
                    <p><?= substr($s->article, 0, 70) ?>...</p>
                </div>
            </a>
        <?php } // end of if
    } ?>


</div>
        <div class="carousel__nav">
            <button class="prev"><B>PREV.</B></button>
            <button class="next"><B>NEXT</B></button>
        </div>
    </div>
	<div class="banner">
	<hr class="seperator">
	<img src="images/trebleclefbanner.png"/>
</div>
	<div class="carouselSect width-6">
    <div class="carousel">
	<?php 
usort($operaArt, 'sortByCreatedAtDesc');
$operaArtC = array_slice($operaArt, 0, 3);
?>
<div class="carousel__items">
    <?php foreach ($operaArtC as $s) {
        // Check if the article's category matches the current category ID
        if ($s->category_id === $operaCategoryId) { 
            $headline = $s->headline;
            if (strlen($headline) > 40) {
                // Find the position of the last space within the substring of the headline
                $last_space = strrpos(substr($headline, 0, 40), ' ');
                if ($last_space !== false) {
                    $headline = substr($headline, 0, $last_space) . '...'; // Truncate at the last space
                } else {
                    $headline = substr($headline, 0, 40) . '...'; // Truncate at character limit if no space found
                }
            }
            ?>
            <a href="webpage.php?id=<?= $s->id ?>" class="carousel__item"> <!-- Add the <a> tag here -->
                <div class="images">
                    <img src="images/<?= $s->img_url ?>" />
                    <div class="overlayGradient"></div>
                    <h2 class="overlayText"><?= $headline ?></h2>
                </div>
                <div class="text-container">
                    <p><?= substr($s->article, 0, 70) ?>...</p>
                </div>
            </a>
        <?php } // end of if
    } ?>

</div>
        <div class="carousel__nav">
            <button class="prev"><B>PREV.</B></button>
            <button class="next"><B>NEXT</B></button>
        </div>
    </div>
</div>

	
</div>
<script src="js/carousel.js"></script>

    <!-- <div class="carousel">
        <div class="carousel__items">
            <div class="carousel__item">
                <div class="images">
                    <img src="images/amadeus-1.jpg" alt="Little girl playing piano" />
                    <div class="overlayGradient"></div>
                    <h2 class="overlayText">Sky’s The Limit For Amadeus</h2>
                </div>
                <div>
                    <p>ERGaerjgirheohfIWREHUAIWUHF</p>
                </div>
            </div>
        </div>
        <button class="prev">Previous</button>
        <button class="next">Next</button>
    </div>
</div>

		</div>
		<script src="js/carousel.js"></script>
	-->
	</section>

	<section class="latestInPiano">
		<div class="lipTitleSect">
			<div class="container">
				<div class="pianoTxtandLine width-9">
					<h1>LATEST IN: <i>PIANO...</i></h1>
					<hr class="lineheadthin">
					<hr class="lineheadthick">
				</div>
				<h2>TOP <i>PIANO</i> HEADLINES:</h2>
			</div>
		</div>
		<div class="container">
		<?php 

function sortByCreatedAtDesc($a, $b) {
    return strtotime($b->created_at) - strtotime($a->created_at);
}

usort($pianoArt, 'sortByCreatedAtDesc');

$pianoArtLimited = array_slice($pianoArt, 0, 3);
foreach ($pianoArtLimited as $s) {
    // Check if the article's category matches the current category ID
    if ($s->category_id === $categoryId) { 
?>
        <div class="panel width-3">
            <a href="webpage.php?id=<?= $s->id ?>">
                <div>
                    <div class="category">
                        <h4><?= Category::findById($s->category_id)->name ?></h4>
                    </div>
                    <h2><?= substr($s->headline, 0, 50) ?>...</h2>
                </div>
            <div>
                <div class="images">
                    <img src="images/<?= $s->img_url ?>" />
                </div>
                <div>
                    <p><?= substr($s->article, 0, 200) ?>...</p>
					</a>
                    <hr class="lineheadthin">
                    <div class="authoranddate">
                        <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                        <p><?= ($s->created_at) ?></p>
                    </div>
                    <hr class="lineheadthick">
                </div>
            </div>
        </div>
<?php 
    } // end of if
} 
?>




<div class="topstories width-3">
    <?php 
    usort($pianoArt, 'sortByCreatedAtDesc');

    // Extract articles from the 4th index onwards and limit it to 4 articles
    $pianoArtSubset = array_slice($pianoArt, 3, 4); 
    ?>
    <ul>
        <?php foreach ($pianoArtSubset as $s) : ?>
            <?php if ($s->category_id === $categoryId) : ?>
                <li>
                    <a href="webpage.php?id=<?= $s->id ?>">
                        <h2><?= substr($s->headline, 0, 50) ?>...</h2>
                        <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>


			</div>
			</div>
		
	</section>

	<section class="editorsChoice">
		<div class="editheader container">
			<div class="editTitleSect width-9">
				<div class="pianoTxtandLine">
					<h1 class="editorText">EDITOR'S CHOICE</h1>
					<hr class="lineheadthin">
					<hr class="lineheadthick">
				</div>
			</div>
			<div class="edittxt width-3">
				<div>
					<h2>FROM OUR PARTNERS:</h2>
					<div class="partnerimg"><img src="images/gear4musiclogo.png"></div>
				</div>
			</div>
		</div>
		<div class="news-HorArt">
			<div class="container">
				<div class="horArticle width-6">
					<div class="container">
					<div class="mainPart width-6">
						<div>
							<div class="category">
							<h4>PIANO</h4>
							</div>
							<h2>The Making Of A Chinese Piano Star</h2></div>
							<div>
								<p>The American pianist Jeremy Denk was, for many years, just that – an American pianist. Then he
								won a
								MacCarthur ‘genius’ grant and wrote a New York Times bestseller. In the latest episode of
								‘Speaking
								Soundly’ David Krauss, principal trumpet of the Metropolitan Opera, wants to know how he did
								that.
								</p>
								
							<hr class="lineheadthin">
							<div class="authoranddate">
								<p>Norman Lebrecht</p>
								<p>January 30th, 2024</p>
							</div>
							<hr class="lineheadthick">
						</div>
					</div>
					<div class="image width-6">
						<img src="images/Robeson.png" alt="Little girl playing piano" />
					</div>
					</div>
				</div>
				<div class="newsletter width-3">
					<h2><u>The Digital Daily Newsletter</u></h2>
					<div class="slogantxt">
						<p>Where</p>
						<p><i><b>Music</b></i></p>
						<p>Meets</p>
						<p><i><b>Elegance.</b></i></p>
					</div>
					<div class="formBox">
						<form action="#">
							<div class="form-box">
								<input type="text" name="EmailAddress" placeholder="Enter your email address   ">
								<button class="btn btn1" type="submit">SUBSCRIBE</button>
							</div>
						</form>
					</div>
					<div class="privTxt">
						<p>BY PROVIDING YOUR INFORMATION, YOU AGREE TO OUR TERMS OF USE AND OUR PRIVACY POLICY. WE USE
							VENDORS THAT MAY ALSO PROCESS YOUR INFORMATION TO HELP PROVIDE OUR SERVICES.
					</div>
				</div>
				<div class="partner width-3">
					<div class="card1 yamaha">
						<div class="imgBox">
							<img src="images/yamahapiano.png">
						</div>
						<div class="contentBox">
							<h2>Yamaha YDP 145 Digital Piano</h2>
							<div class="colourSelect">
								<h3>Available Colours:</h3>
								<span class="black">Black</span>
								<span class="white">White</span>
							</div>
							<a href="https://www.gear4music.ie/Keyboards-and-Pianos/Yamaha-YDP-145-Digital-Piano-Black/4MAU">Buy Now</a>
						</div>
	
					</div>
				</div>
			</div>
		</div>
		<div class="news-HorArt">
			<div class="nHA2 container">
				<div class="horArticle width-6">
					<div class="container">
					<div class="mainPart width-6">
						<div>
							<div class="category">
							<h4>PIANO</h4>
							</div>
							<h2>The Making Of A Chinese Piano Star</h2></div>
							<div>
								<p>The American pianist Jeremy Denk was, for many years, just that – an American pianist. Then he
								won a
								MacCarthur ‘genius’ grant and wrote a New York Times bestseller. In the latest episode of
								‘Speaking
								Soundly’ David Krauss, principal trumpet of the Metropolitan Opera, wants to know how he did
								that.
								</p>
								
							<hr class="lineheadthin">
							<div class="authoranddate">
								<p>Norman Lebrecht</p>
								<p>January 30th, 2024</p>
							</div>
							<hr class="lineheadthick">
						</div>
					</div>
					<div class="image width-6">
						<img src="images/Robeson.png" alt="Little girl playing piano" />
					</div>
					
					</div>
					
				</div>
				<div class="followSpotify width-3">
					<h2><u>Follow Our Spotify Playlist</u></h2>
					<div class="spotImgandTxt">
						<div><img src="images/followSpotifyImage.jpg" alt="Spotify playlist cover" /></div>
						<div class="spotTxt">
							<h3>Top</h3>
							<h3>Pieces</h3>
							<h3>All</h3>
							<h3>In</h3>
							<div class="OneTxt"><h3>One</h3></div>
							<h3>Place</h3>
						</div>
					</div>
					<div class="btnandlogo">
						<a href="https://open.spotify.com/playlist/46skl9jokyA15hXgXHEbA6" class="btn btn1">FOLLOW</a>
						<a href="https://open.spotify.com/playlist/46skl9jokyA15hXgXHEbA6" class="spotLogo"><img src="images/spotifylogo.svg"></a>
					</div>
				</div>
				<div class="partner width-3">
					<div class="card1 stagg">
						<div class="imgBox">
							<img src="images/violing4m.png">
						</div>
						<div class="contentBox">
							<h2>Stagg Violin Outfit</h2>
							<div class="colourSelect">
								<h3>Available Colours:</h3>
								<span class="black">Black</span>
								<span class="white">Natural</span>
								<span class="white">Sunburst</span>
							</div>
							<a href="https://www.gear4music.ie/Keyboards-and-Pianos/Yamaha-YDP-145-Digital-Piano-Black/4MAU">Buy Now</a>
						</div>
	
					</div>
				</div>
			</div>
		</div>
		
	</section>

	<section class="latestInOrchestra">
		<div class="lioTitleSect">
			<div class="container">
				<div class="pianoTxtandLine width-9">
					<h1>LATEST IN: <i>ORCHESTRA...</i></h1>
					<hr class="lineheadthin">
					<hr class="lineheadthick">
				</div>
				<h2>TOP <i>ORCHESTRA</i> HEADLINES:</h2>
			</div>
		</div>
		<div class="container">
		<?php 
usort($orchestraArt, 'sortByCreatedAtDesc');

$orchestraArtLimited = array_slice($orchestraArt, 0, 3);
foreach ($orchestraArtLimited as $s) {
    // Check if the article's category matches the current category ID
    if ($s->category_id === $orchestraCategoryId) { 
?>
        <div class="panel width-3">
            <a href="webpage.php?id=<?= $s->id ?>">
                <div>
                    <div class="category">
                        <h4><?= Category::findById($s->category_id)->name ?></h4>
                    </div>
                    <h2><?= substr($s->headline, 0, 50) ?>...</h2>
                </div>
            </a>
            <div>
                <div class="images">
                    <img src="images/<?= $s->img_url ?>" />
                </div>
                <div>
                    <p><?= substr($s->article, 0, 200) ?>...</p>
                    <hr class="lineheadthin">
                    <div class="authoranddate">
                        <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                        <p><?= ($s->created_at) ?></p>
                    </div>
                    <hr class="lineheadthick">
                </div>
            </div>
        </div>
<?php 
    } // end of if
} 
?>

			<div class="topstories width-3">
    <?php 
    usort($orchestraArt, 'sortByCreatedAtDesc');

    // Extract articles from the 4th index onwards and limit it to 4 articles
    $orchestraArtSubset = array_slice($orchestraArt, 3, 4); 
    ?>
    <ul>
        <?php foreach ($orchestraArtSubset as $s) : ?>
            <?php if ($s->category_id === $orchestraCategoryId) : ?>
                <li>
                    <a href="webpage.php?id=<?= $s->id ?>">
                        <h2><?= substr($s->headline, 0, 50) ?>...</h2>
                        <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>

		</div>
	</section>

	<div class="goFurther">
        <div class="container">
            <div class="width-12 title">
                <h1>GO FURTHER</h1>
                <img src="images/gofurther/horizrect.png">
            </div>

            <div class="width-12 subtitle">
                <h2>PIANO</h2>
            </div>
			<?php
foreach ($pianoArtSubset as $s) {
    if ($s->category_id === $categoryId) { 
?>
        <div class="panel width-3 goFurther">
            <div>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div class="images">
                        <img src="images/<?= $s->img_url ?>" />
                    </div>
                    <div class="category">
                        <h4><?= Category::findById($s->category_id)->name ?></h4>
                    </div>
                </a>
            </div>
            <div>
                <p><?= substr($s->article, 0, 50) ?>...</p>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div>
                        <hr class="lineheadthin">
                        <div class="authoranddate">
                            <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                            <p><?= ($s->created_at) ?></p>
                        </div>
                        <hr class="lineheadthick">
                    </div>
                </a>
            </div>
        </div>
<?php 
    } // end of if
} // end of foreach
?>

			
        </div>

        <div class="container">

            <div class="width-12 subtitle">
                <h2>HISTORY</h2>
            </div>

            <?php
			$historyArtSubset = array_slice($historyArt, 0, 3); 
foreach ($historyArtSubset as $s) {
    if ($s->category_id === $historyCategoryId) { 
?>
        <div class="panel width-3 goFurther">
            <div>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div class="images">
                        <img src="images/<?= $s->img_url ?>" />
                    </div>
                    <div class="category">
                        <h4><?= Category::findById($s->category_id)->name ?></h4>
                    </div>
                </a>
            </div>
            <div>
                <p><?= substr($s->article, 0, 50) ?>...</p>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div>
                        <hr class="lineheadthin">
                        <div class="authoranddate">
                            <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                            <p><?= ($s->created_at) ?></p>
                        </div>
                        <hr class="lineheadthick">
                    </div>
                </a>
            </div>
        </div>
<?php 
    } // end of if
} // end of foreach
?>

</div>

        <div class="container">

            <div class="width-12 subtitle">
                <h2>ORCHESTRA</h2>
            </div>

            <?php 
// Sort all piano articles by created_at in descending order
usort($orchestraArt, 'sortByCreatedAtDesc');

// Extract articles from the 4th index onwards and limit it to 4 articles
$orchestraArtSubset = array_slice($orchestraArt, 3, 4);

foreach ($orchestraArtSubset as $s) {
    if ($s->category_id === $orchestraCategoryId) { 
?>
        <div class="panel width-3 goFurther">
            <div>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div class="images">
                        <img src="images/<?= $s->img_url ?>" />
                    </div>
                    <div class="category">
                        <h4><?= Category::findById($s->category_id)->name ?></h4>
                    </div>
                </a>
            </div>
            <div>
                <p><?= substr($s->article, 0, 50) ?>...</p>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div>
                        <hr class="lineheadthin">
                        <div class="authoranddate">
                            <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                            <p><?= ($s->created_at) ?></p>
                        </div>
                        <hr class="lineheadthick">
                    </div>
                </a>
            </div>
        </div>
<?php 
    } // end of if
} // end of foreach
?>

			
        

        </div>

        <div class="container">

            <div class="width-12 subtitle">
                <h2>OPERA</h2>
            </div>
			<?php
usort($operaArt, 'sortByCreatedAtDesc');

// Extract articles from the 4th index onwards and limit it to 4 articles
$operaArtSubset = array_slice($operaArt, 3, 4);

foreach ($operaArtSubset as $s) {
    if ($s->category_id === $operaCategoryId) { 
?>
        <div class="panel width-3 goFurther">
			<div>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div class="images">
                        <img src="images/<?= $s->img_url ?>" />
                    </div>
                    <div class="category">
                        <h4><?= Category::findById($s->category_id)->name ?></h4>
                    </div>
                </a>
			</div>
			<div>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <p><?= substr($s->article, 0, 50) ?>...</p>
                </a>
            	<div>
                	<hr class="lineheadthin">
                	<div class="authoranddate">
                    	<p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                    	<p><?= ($s->created_at) ?></p>
                	</div>
                	<hr class="lineheadthick">
            	</div>
			</div>
        </div>
<?php 
    } // end of if
} // end of foreach
?>

			
        </div>

    </div>
</body>
</html>