<?php
require_once "./etc/config.php";

// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

// $categoryId = 4;
// $stories = Story::findByCategory($categoryId, $options = array('limit' => 3, 'offset' => 2));

$locationId = 8;
$stories = Story::findByLocation($locationId, $options = array('limit' => 4, 'offset' => 0));

?>
<html>
    <head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/grid.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Stories</title>
        
    </head>
    <body>

    <div class="container">
        <div class="width-8 topSection">
    <?php foreach ($stories as $s) { ?>
        <div class="mediumStory">
        <img src="<?= $s->img_url ?>" />
        <h3><?= Category::findById($s->category_id)->name ?></h3>
    
        <h1><?= $s->headline ?></h1>
        <h4><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name . " in " .
        Location::findById($s->location_id)->name ?></h4>
           <div class="article"><?= substr($s->article,0,200) ?>
        
           <p><?= $s->updated_at ?></p>
        </div>
          
            

        </div>
    <?php } ?>
    </div>
    </div>
       
    </body>
</html>