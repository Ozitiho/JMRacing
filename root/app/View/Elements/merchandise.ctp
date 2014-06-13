<?php
	$products = $this->requestAction('products/index');
?>
<div class="box_equal merch">
	<div class="load_more">
		<a id="load-images">MERCHANDISE</a>
	</div>
	<?php 
	//There is currently no means for sharing products, so do so later
		$currentUrl = "TODO";
		for ($i = 0; $i < 2; $i++):
		

            $fullImageLocation = "/images/no-photo.jpg"; // In case no image can be found
            $thumbImageLocation = $fullImageLocation; // In case no image can be found
            $photoID = 0;
            $imageName = null;
            if (isset($products[$i]['Product']['photo_id'])) {
                $imageDetails = $this->requestAction('albums/getDetailsFromPhotoID/' . $products[$i]['Product']['photo_id']);
            }

            // If an image is found
            if (isset($imageDetails)) {
                $photoID = $products[$i]['Product']['photo_id'];
                $albumID = $imageDetails["Photo"]["album_id"];
                $imageName = $imageDetails["Photo"]["name"];
                $fullImageLocation = "/images/albums/$albumID/$imageName";
                $thumbImageLocation = "/images/albums/$albumID/thumbs/$imageName";
            }
	?>
	<div class="box team_col item">
		<div class="center-cropped news" style="background-image: url('<?php echo $thumbImageLocation?>');">
			<img src="<?php echo $thumbImageLocation; ?>" alt="">
		</div>
		<span class="heading blue">MERCHANDISE</span>
		<div class="description merch">
			<p class="era"><?php echo $products[$i]['Product']['Name'] ?></p><p class="era"> &nbsp;&nbsp;
				<?php 
					if($products[$i]['Product']['DiscountPrice'] > 0){
						echo ('<del>&euro;'.$products[$i]['Product']['Price'].'</del> &nbsp;&nbsp;  <span>&euro;'.$products[$i]['Product']['DiscountPrice'].'</span></p>');
					}
					else{
						echo ('<span>&euro;'.$products[$i]['Product']['Price'].'</span></p>');
					}
				?>
			<div class="share">
				<ul>
					<li>SHARE &nbsp;&nbsp;</li>
					<li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl . $products[$i]['Product']['Name']; ?>"  target="_blank">&nbsp;</a></li>
					<li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $currentUrl . " " . $products[$i]['Product']['Name']; ?>" target="_blank">&nbsp;</a></li>
					<li class="google"><a href="https://plus.google.com/share?url=<?php echo $currentUrl ?>" target="_blank">&nbsp;</a></li>
				</ul>
				<a href="#" class="button">BUY THIS ITEM</a>
			</div>
		</div>
	</div>
	<?php endfor; ?>
</div>