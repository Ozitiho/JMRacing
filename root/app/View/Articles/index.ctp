<?php
// Include the countdown element
print($this->element('countdown'));

$this->start('bannerImage');
?>
<img src="/images/inner_banner.jpg" alt="">
<?php
$this->end();
?>

<script>
	function cut() {
		var text = "<?php echo $articles[0]['Article']['Message']; ?>";
		if($( window ).width() <= 1183 && $( window ).width() >= 733){
			console.log("check2");
			$('.description p').text(text.substr(0,120)+'...');
		}
		else{
			$('.description p').text(text);
		}
	}

	$( window ).resize(cut);
	$( window ).load(cut);
</script>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
    <?php
    $url = $actual_link = "$_SERVER[HTTP_HOST]";

    $count = 0;
    foreach ($articles as $article) {
        $fullImageLocation = "/images/no-photo.jpg"; // In case no image can be found
        $thumbImageLocation = $fullImageLocation; // In case no image can be found
		if (isset($article['Article']['photo_id'])){
			$imageDetails = $this->requestAction('albums/getDetailsFromPhotoID/' . $article['Article']['photo_id']);
		}
        // If an image is found
        if (isset($imageDetails)) {
            $albumID = $imageDetails["Photo"]["album_id"];
            $imageName = $imageDetails["Photo"]["name"];
            $fullImageLocation = "/images/albums/$albumID/$imageName";
            $thumbImageLocation = "/images/albums/$albumID/thumbs/$imageName";
        }
        $currentUrl = $url . "/articles/" . $article['Article']['id'];
        $count++;
        if ($count == 1) {
            ?>
            <div class="box w3">
                <div class="image_left"><img src="<?php print($fullImageLocation);?>" alt=""></div>
                <span class="heading">LATEST NEWS</span>
                <div class="description">
                    <h2><?php echo $article['Article']['Title']; ?></h2>
                    <p><?php echo $article['Article']['Message']; ?></p>
                    <div class="share">
                        <ul>
                            <li>SHARE &nbsp;&nbsp;</li>
                            <li class="fb"><a href="#">&nbsp;</a></li>
                            <li class="twitter"><a href="#">&nbsp;</a></li>
                            <li class="google"><a href="#">&nbsp;</a></li>
                        </ul>
                        <a href="/articles/view/<?php print($article['Article']['id']); ?>" class="button yellow">READ FULL ARTICLE</a>
                    </div>
                </div>
            </div>
            <?php
            print($this->element('socialmedia'));
        } else {
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
                            <li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl; ?>"  target="_blank">&nbsp;</a></li>
                            <li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $currentUrl . " " . $article['Article']['Title']; ?>" target="_blank">&nbsp;</a></li>
                            <li class="google"><a href="https://plus.google.com/share?url=<?php echo $currentUrl ?>" target="_blank">&nbsp;</a></li>
                        </ul>
                        <a href="/articles/view/<?php print($article['Article']['id']); ?>" class="button yellow">READ FULL ARTICLE</a>
                    </div>
                </div>
            </div>	
            <?php
        }
    }
    ?>
</div>
