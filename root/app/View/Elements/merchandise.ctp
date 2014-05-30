<?php
	$products = $this->requestAction('products/getProducts');
?>
<div class="box_equal">
	<div class="load_more">
		<a id="load-images">MERCHANDISE</a>
	</div>
	<?php 
	//There is currently no means for sharing products, so do so later
		$currentUrl = "TODO";
		for ($i = 0; $i < 2; $i++):
	?>
	<div class="box team_col item">
		<div class="center-cropped news" style="background-image: url('<?php echo $products[$i]['Product']['Image']; ?>');">
			<img src="<?php echo $products[$i]['Product']['Image']; ?>" alt="">
		</div>
		<span class="heading blue">MERCHANDISE</span>
		<div class="description">
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