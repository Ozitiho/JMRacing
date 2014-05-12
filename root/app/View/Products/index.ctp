<?php
	function shorten($string)
	{
		if (strlen($string) > 116){
			$string = substr($string, 0, 113);
			$string .= '...';
		}
		return $string;
	}
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();

$tweets = $this->requestAction('socialMedia/getTweets');
	
$pageposts = $this->requestAction('socialMedia/getFacebookPosts');

?>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
	<?php $currentUrl = "yes"; ?>
	
	<div class="box_equal index">
	<?php
		$count = 0;
		foreach($products as $product){
			$count++;
		?>
		<div class="box team_col item">
			<img src=<?php echo $product['Product']['Image'];?>  alt="">
			<span class="heading blue">MERCHANDISE</span>
			<div class="description">
				<p class="era"><?php echo $product['Product']['Name'] ?> &nbsp;&nbsp;
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
			if($count == 3){
			?>
			<div class="facebook_box box">
				<h1>FACEBOOK</h1>
				<ul>
					<?php
						for($i = 0; $i < 2; $i++):
					?>
					<li>
						<span>
							<?php
								//Take the facebook date info and format it to: 01 Januari 2000
								$datetime = new DateTime($pageposts['data'][$i]['created_time']);
								echo $datetime->format('d M Y');
							?>
						</span>
						<a href="https://www.facebook.com/husqvarnamxgp"><?php echo $pageposts['data'][$i]['message']; ?></a>
					</li>
					
					<?php
						endfor;
					?>
				</ul>
				<a href="https://www.facebook.com/JMRacingTeamMX" class="button">JOIN OUR FACEBOOK</a>
			</div>
			<div class="facebook_box twitter_box box">
				<h1>TWITTER</h1>
				<ul>
					<?php
						for($i = 0; $i < 2; $i++):
					?>
					<li>
						<span>
							<?php 
								$datetime = new DateTime($tweets[$i]['created_at']);
								echo $datetime->format('d M Y');
							?>
						</span>
						<a href="https://twitter.com/HusqvarnaMXGP"><?php echo $tweets[$i]['text'] ?></a>
					</li>
					<?php
						endfor;
					?>
				</ul>
				<a href="https://twitter.com/JMRacingMX" class="button">FOLLOW ON TWITTER</a>
			</div>
			<?php
			}
		}
	?>
	</div>
</div>