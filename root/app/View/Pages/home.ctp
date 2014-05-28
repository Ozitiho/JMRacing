<?php
// Include the countdown element
print($this->element('countdown'));

$this->start('bannerImage');
?>
<img src="/images/home_banner1.jpg" alt="">
<?php
$this->end();

$articles = $this->requestAction('articles/getShortenedArticles');

$products = $this->requestAction('products/getProducts');

$photos = $this->requestAction('socialMedia/getFacebookPictures');

function printArticle($article, $imageDetails){
    //TODO: EDIT THIS WHEN WEBSITE GOES ONLINE!!
    $url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // <-- TEST THIS PLS
	$thumbImageLocation = "/images/no-photo.jpg"; // In case no image can be found;
	

	// If an image is found
	if ($imageDetails) {
		$albumID = $imageDetails["Photo"]["album_id"];
		$imageName = $imageDetails["Photo"]["name"];
		$thumbImageLocation = "/images/albums/$albumID/thumbs/$imageName";
	}
	$currentUrl = $url . "/articles/" . $article['Article']['id'];
	?>
	<div class="box">
		<div class="center-cropped news" style="background-image: url('<?php echo $thumbImageLocation; ?>');">

		</div>
		<span class="heading">NEWS</span>
		<div class="description">
			<h2><?php echo $article['Article']['Title']; ?></h2>
			<p><?php echo $article['Article']['Message']; ?></p>
			<div class="share">
				<ul>
					<li>SHARE &nbsp;&nbsp;</li>
					<li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl . $article['Article']['Title']; ?>"  target="_blank">&nbsp;</a></li>
					<li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $currentUrl . " " . $article['Article']['Title']; ?>" target="_blank">&nbsp;</a></li>
					<li class="google"><a href="https://plus.google.com/share?url=<?php echo $currentUrl ?>" target="_blank">&nbsp;</a></li>
				</ul>
				<a href="/articles/view/<?php print($article['Article']['id']); ?>" class="button yellow">READ FULL ARTICLE</a>
			</div>
		</div>
	</div>	
	<?php
}
?>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
    <?php

    $count = 0;
	
	//Sort the articles
	$sorted = array();
	$date = new DateTime();
	//First, add the highest priority and delete the lowest
	foreach($articles as $key => $article){
		$priority = $article['Article']['priority'];
		If($priority == 5){
			array_push($sorted, $article);
			unset($articles[$key]);
		}
		If($priority == 0){
			unset($articles[$key]);
		}
	}
	
	//Then, the second highest
	foreach($articles as $key => $article){
		$priority = $article['Article']['priority'];
		If($priority == 4){
			array_push($sorted, $article);
			unset($articles[$key]);
		}
	}
	//Then, the rest
	$count = 0;
	while(!empty($articles)){
		$highestScore = -10000;
		$highestArticle = null;
		$currentKey = 0;
		foreach($articles as $key => $article){
			$articleDate = new DateTime($article['Article']['CreateDate']);
			$difference = $date->diff($articleDate);
			
			$score = (0 - $difference->d) * $priority + 2;
			if($score > $highestScore){
				$highestScore = $score;
				$highestArticle = $article;
				$currentKey = $key;
			}
		}
		if($highestArticle != null){
			array_push($sorted, $highestArticle);
			unset($articles[$currentKey]);
		}
		$count++;
		if($count > 4){
			unset($articles);
			$articles = array();
		}
	}
	$count = 0;
    foreach ($sorted as $article) {
		$imageDetails = $this->requestAction('albums/getDetailsFromPhotoID/' . $article['Article']['photo_id']);
		
		printArticle($article, $imageDetails);
        $count ++;
        //Don't display more than 4 articles
        if ($count == 4)
            break;
        //After the third article, display the social media links
        if ($count == 2)
            print($this->element('socialmedia'));
    }
    //If there are less than 2 articles, show the social media links anyway.
    if ($count < 2)
        print($this->element('socialmedia'));
    //After the articles, show the merchandise and team
    ?>
    <div class="box team_col">
        <a href="#">
            <div class="center-cropped" style="background-image: url('/images/home_img3.jpg');"></div>
            <span class="overlay">&nbsp;</span>
            <span class="heading">TEAM</span>
        </a>
        <p class="black">ALEKSANDR TONKOV #59</p>
    </div>
    <div class="box team_col">
        <a href="#">
            <div class="center-cropped" style="background-image: url('/images/home_img4.jpg');"></div>
            <span class="overlay">&nbsp;</span>
            <span class="heading">TEAM</span>
        </a>
        <p class="black">ROMAIN FEBVRE #461</p>
    </div>
	<?php if (isset($products[0])) { ?>
        <div class="box team_col">
            <a href="products">
                <div class="center-cropped" style="background-image: url('<?php echo $products[0]['Product']['Image']; ?>');"></div>
                <span class="overlay">&nbsp;</span>
                <span class="heading blue">MERCHANDISE</span>
            </a>
        </div>
	<?php } ?>
    <div class="box team_col">
        <div class="center-cropped" style="background-image: url('<?php echo $photos[17]['source']; ?>');"></div>
        <span class="overlay">&nbsp;</span>
        <span class="heading blue">VIDEO</span>
        <a href="https://www.facebook.com/media/set/?set=vb.628475897212573&type=2" class="play_button"><img src="/images/play_button.png" alt=""></a>
    </div>
    <!-- When requesting to show more news, simply link to a page with all news -->
    <div class="load_more">
        <a id="load-images" href="/articles/">LOAD MORE NEWS</a>
    </div>
</div>