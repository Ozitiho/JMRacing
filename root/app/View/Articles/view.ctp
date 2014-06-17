<?php
$this->start('bannerImage');

$imageDetails = null;
			
if (isset($article['Article']['photo_id'])) {
	$imageDetails = $this->requestAction('albums/getDetailsFromPhotoID/' . $article['Article']['photo_id']);
}

// If an image is found
if (isset($imageDetails)) {
	$albumID = $imageDetails["Photo"]["album_id"];
	$imageName = $imageDetails["Photo"]["name"];
	$fullImageLocation = "/images/albums/$albumID/thumbs/$imageName";
}
else {
	$fullImageLocation = "/images/no-photo.jpg"; // In case no image can be found;
}
?>
<div class="center-cropped banner" style="background-image: url('<?php echo $fullImageLocation; ?>');">
	<img src="<?php print($fullImageLocation); ?>" alt="">
	<div class="gradient-overlay"></div>
</div>
<?php
$this->end();

// Set a custom title
$this->start('title');
echo $article['Article']['Title'];
$this->end();
?>
<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
    <div class="box w3 only_description">
        <span class="heading">NEWS</span>
        <div class="description">
            <h2><?php echo h($article['Article']['Title']); ?></h2>
            <span class="small">
                Created: <?php echo $article['Article']['CreateDate']; ?>
                <?php
                if ($article['Article']['LastUpdatedDate'] != null) {
                    echo " | Last updated: " . $article['Article']['LastUpdatedDate'];
                }
                ?>
            </span>
            <br><br>
            <p><?php echo ($article['Article']['Message']); ?></p>
            <div class="share">
                <ul>
                    <li>SHARE &nbsp;&nbsp;</li>
                    <?php
						$url = "http://$_SERVER[HTTP_HOST]"; // <-- TEST THIS PLS
						$currentUrl = $url . "/articles/view/" .$article['Article']['id'] ;
					?>
					<li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl ?>"  target="_blank">&nbsp;</a></li>
					<li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $currentUrl . " " . $article['Article']['Title']; ?>" target="_blank">&nbsp;</a></li>
					<li class="google"><a href="https://plus.google.com/share?url=<?php echo $currentUrl ?>" target="_blank">&nbsp;</a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php
    print($this->element('socialmedia'));
    if ($articles != null) {
        echo "<div class='load_more'><a>NEWEST NEWS ITEMS</a></div>";
        $count = 0;
        foreach ($articles as $article) {
            $imageDetails = null;
			
			if (isset($article['Article']['photo_id'])) {
				$imageDetails = $this->requestAction('albums/getDetailsFromPhotoID/' . $article['Article']['photo_id']);
			}

            // If an image is found
            if (isset($imageDetails)) {
				$albumID = $imageDetails["Photo"]["album_id"];
				$imageName = $imageDetails["Photo"]["name"];
				$thumbImageLocation = "/images/albums/$albumID/thumbs/$imageName";
			}
			else {
				$thumbImageLocation = "/images/no-photo.jpg"; // In case no image can be found;
			}
            ?>
            <div class="box">
                <img src="<?php echo $thumbImageLocation; ?>" alt="">
                <span class="heading">NEWS</span>
                <div class="description">
                    <h2><?php echo $article['Article']['Title']; ?></h2>
                    <p><?php echo $article['Article']['Message']; ?></p>
                    <div class="share">
                        <ul>
                            <li>SHARE &nbsp;&nbsp;</li>
                            <?php
								$url = "http://$_SERVER[HTTP_HOST]"; // <-- TEST THIS PLS
								$currentUrl = $url . "/articles/view/" .$article['Article']['id'] ;
							?>
							<li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl ?>"  target="_blank">&nbsp;</a></li>
							<li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $currentUrl . " " . $article['Article']['Title']; ?>" target="_blank">&nbsp;</a></li>
							<li class="google"><a href="https://plus.google.com/share?url=<?php echo $currentUrl ?>" target="_blank">&nbsp;</a></li>
                        </ul>
                        <a href="/articles/view/<?php echo $article['Article']['id']; ?>" class="button yellow">READ FULL ARTICLE</a>
                    </div>
                </div>
            </div>	
            <?php
            $count ++;
            //Don't display more than 4 articles
            if ($count == 4)
                break;
        }
    }
    ?>
</div>