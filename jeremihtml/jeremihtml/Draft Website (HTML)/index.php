<!DOCTYPE html>
<?php

require_once "./etc/config.php";


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
$ecCategoryId = 3;
$ecArt = Story::findByCategory($ecCategoryId);

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
    <link rel="stylesheet" href="CSS/footer.css" />

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
			<div class="width-6">
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
    <li><h1>Piano</h1></li>
    <li><h1>Orchestra</h1></li>
    <li><h1>Opera</h1></li>
    <li><h1>History</h1></li>
    <li><h1>Editor's Choice</h1></li>
  </ul>
			</div>
		</div>
	</section>


	
	<section class="articleBlockHead">
		<div class="container">
            <?php
            -usort($ecArt, 'sortByCreatedAtDesc');

$firstStory = array_slice($ecArt, 1, 1);
?>
           <?php foreach ($mainStory as $s) {
    if ($s->category_id === $ecCategoryId) { 
        $headline = $s->headline;
        if (strlen($headline) > 63) {
            // Find the position of the last space within the substring of the headline
            $last_space = strrpos(substr($headline, 0, 50), ' ');
            if ($last_space !== false) {
                $headline = substr($headline, 0, $last_space) . '...'; // Truncate at the last space
            } else {
                $headline = substr($headline, 0, 50) . '...'; // Truncate at character limit if no space found
            }
        }
    }
        ?>
			<div class="panel width-6">
				<img src="images/<?= $s->img_url ?>" />
				<h1><?= $headline ?></h1>
				<hr class="lineheadthin">
				<div class="authoranddate">
                <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                <p><?= $s->created_at ?></p>
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
foreach ($pianoArtLimited as $s) : ?>
    <?php if ($s->category_id === $categoryId) : ?>
        <?php 
            $headline = $s->headline;
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
        <div class="panel width-3">
            
                <div>

                    <div class="category">
                        <a href="storylist.php?category_id=<?= urlencode($s->category_id) ?>">
                            <h4><?= Category::findById($s->category_id)->name ?></h4>
                        </a>
                    </div>
                    <h2><?= $headline ?></h2>
                </div>
            
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
    <?php endif; ?>
<?php endforeach; ?>





<div class="topstories width-3">
    <?php 
    usort($pianoArt, 'sortByCreatedAtDesc');

    // Extract articles from the 4th index onwards and limit it to 4 articles
    $pianoArtSubset = array_slice($pianoArt, 3, 4); 
    ?>
    <ul>
        <?php foreach ($pianoArtSubset as $s) : ?>
            <?php if ($s->category_id === $categoryId) : ?>
                <?php 
                    $headline = $s->headline;
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
                <li>
                    <a href="webpage.php?id=<?= $s->id ?>">
                        <h2><?= $headline ?></h2>
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
                    <?php 
   // Sort the array of articles by creation date in descending order
usort($ecArt, 'sortByCreatedAtDesc');

$firstStory = array_slice($ecArt, 1, 1);

foreach ($firstStory as $s) {
    if ($s->category_id === $ecCategoryId) { 
        $headline = $s->headline;
        if (strlen($headline) > 50) {
            // Find the position of the last space within the substring of the headline
            $last_space = strrpos(substr($headline, 0, 50), ' ');
            if ($last_space !== false) {
                $headline = substr($headline, 0, $last_space) . '...'; // Truncate at the last space
            } else {
                $headline = substr($headline, 0, 50) . '...'; // Truncate at character limit if no space found
            }
        }
    }
        ?>
    <div class="mainPart width-6">
        <div>
            <div class="category">
                <h4><?= Category::findById($s->category_id)->name ?></h4>
            </div>
            <h2><?= $headline ?></h2>
        </div>
        <div>
            <p><?= substr($s->article, 0, 200) ?>...</p>
            <hr class="lineheadthin">
            <div class="authoranddate">
                <p><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></p>
                <p><?= $s->created_at ?></p>
            </div>
            <hr class="lineheadthick">
        </div>
    </div>
    <div class="image width-6">
        <img src="images/<?= $s->img_url ?>" />
    </div>
    <?php
}
?>
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
        $headline = $s->headline;
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
        <div class="panel width-3">
            <a href="webpage.php?id=<?= $s->id ?>">
                <div>
                    <div class="category">
                        <h4><?= Category::findById($s->category_id)->name ?></h4>
                    </div>
                    <h2><?= $headline ?></h2>
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
        <?php 
            $headline = $s->headline;
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
        <li>
            <a href="webpage.php?id=<?= $s->id ?>">
                <h2><?= $headline ?></h2>
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
        <div class="pianoTxtandLine width-9">
					<h1>GO <i>FURTHER...</i></h1>
					<hr class="lineheadthin">
					<hr class="lineheadthick">
				</div>

            <div class="width-12 subtitle">
                <h4>PIANO</h4>
            </div>
			<?php
foreach ($pianoArtSubset as $s) {
    if ($s->category_id === $categoryId) { 
        $headline = $s->headline;
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
        <div class="panel width-3 goFurther">
            <div>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div class="images">
                        <img src="images/<?= $s->img_url ?>" />
                    </div>
                    <h5><?= $headline ?></h5>
                </a>
            </div>
            <div>
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
                <h4>HISTORY</h4>
            </div>

            <?php
			$historyArtSubset = array_slice($historyArt, 0, 4); 
            foreach ($historyArtSubset as $s) {
                if ($s->category_id === $historyCategoryId) { 
                    $headline = $s->headline;
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
                    <div class="panel width-3 goFurther">
                        <div>
                            <a href="webpage.php?id=<?= $s->id ?>">
                                <div class="images">
                                    <img src="images/<?= $s->img_url ?>" />
                                </div>
                                <h5><?= $headline ?></h5>
                            </a>
                        </div>
                        <div>
                            
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
                <h4>ORCHESTRA</h4>
            </div>

            <?php 
// Sort all piano articles by created_at in descending order
usort($orchestraArt, 'sortByCreatedAtDesc');

// Extract articles from the 4th index onwards and limit it to 4 articles
$orchestraArtSubset = array_slice($orchestraArt, 3, 4);

foreach ($orchestraArtSubset as $s) {
    if ($s->category_id === $orchestraCategoryId) { 
        $headline = $s->headline;
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
        <div class="panel width-3 goFurther">
            <div>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div class="images">
                        <img src="images/<?= $s->img_url ?>" />
                    </div>
                    <h5><?= $headline ?></h5>
                </a>
            </div>
            <div>
                
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
                <h4>OPERA</h4>
            </div>
			<?php
usort($operaArt, 'sortByCreatedAtDesc');

// Extract articles from the 4th index onwards and limit it to 4 articles
$operaArtSubset = array_slice($operaArt, 3, 4);

foreach ($operaArtSubset as $s) {
    if ($s->category_id === $operaCategoryId) { 
        $headline = $s->headline;
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
        <div class="panel width-3 goFurther">
            <div>
                <a href="webpage.php?id=<?= $s->id ?>">
                    <div class="images">
                        <img src="images/<?= $s->img_url ?>" />
                    </div>
                    <h5><?= $headline ?></h5>
                </a>
            </div>
            <div>
                <a href="webpage.php?id=<?= $s->id ?>"></a>
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