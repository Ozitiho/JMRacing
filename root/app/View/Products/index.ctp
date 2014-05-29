<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
	//There is currently no means for sharing products, so do so later
	<?php $currentUrl = "TODO"; ?>
	
	<div class="box_equal index">
	<?php
		$count = 0;
		foreach($products as $product){
			$count++;
		?>
		<div class="box team_col item">
			<div class="center-cropped news" style="background-image: url('<?php echo $product['Product']['Image']; ?>');">
				<img src="<?php echo $product['Product']['Image']; ?>" alt="">
			</div>
			<span class="heading blue">MERCHANDISE</span>
			<div class="description">
				<p class="era"><?php echo $product['Product']['Name'] ?></p><p class="era"> &nbsp;&nbsp;
				<?php 
					if($products[0]['Product']['DiscountPrice'] > 0){
						echo ('<del>&euro;'.$product['Product']['Price'].'</del> &nbsp;&nbsp;  <span>&euro;'.$product['Product']['DiscountPrice'].'</span></p>');
					}
					else{
						echo ('<span>&euro;'.$product['Product']['Price'].'</span></p>');
					}
				?>
				<div class="share">
					<ul>
						<li>SHARE &nbsp;&nbsp;</li>
						<li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl . $product['Product']['Name']; ?>"  target="_blank">&nbsp;</a></li>
						<li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $currentUrl . " " . $product['Product']['Name']; ?>" target="_blank">&nbsp;</a></li>
						<li class="google"><a href="https://plus.google.com/share?url=<?php echo $currentUrl ?>" target="_blank">&nbsp;</a></li>
					</ul>
					<a href="#" class="button">BUY THIS ITEM</a>
				</div>
			</div>
		</div>
		<?php
			if($count == 3) print($this->element('socialmedia'));
		}
		if($count < 3) print($this->element('socialmedia'));
	?>
	</div>
</div>