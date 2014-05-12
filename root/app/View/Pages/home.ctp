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
	
	$tweets = $this->requestAction('socialMedia/getTweets');
	
	$pageposts = $this->requestAction('socialMedia/getFacebookPosts');
?>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
	<?php
		//TODO: EDIT THIS WHEN WEBSITE GOES ONLINE!!
		$url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // <-- TEST THIS PLS
	
		$count = 0;	
		foreach($articles as $article)
		{
			$currentUrl = $url . "/articles/" .  $article['Article']['id'];
		?>
			<div class="box">
				<img src="<?php echo $article['Article']['Photo']; ?>" alt="">
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
						<a href="/articles/view/<?php print($article['Article']['id']);?>" class="button yellow">READ FULL ARTICLE</a>
					</div>
				</div>
			</div>	
		<?php
			$count ++;
			//Don't display more than 4 articles
			if($count == 4) break;
			//After the third article, display the social media links
			if($count == 2){
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
		//After the articles, show the merchandise and team
	?>
	<div class="box team_col">
		<a href="#">
			<img src="/images/home_img3.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black">ALEKSANDR TONKOV #59</p>
	</div>
	<div class="box team_col">
		<a href="#">
			<img src="/images/home_img4.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black">ROMAIN FEBVRE #461</p>
	</div>
	<?php if(isset($products[0])){ ?>
	<div class="box team_col">
		<a href="#">
			<img src=<?php echo $products[0]['Product']['Image'];?> alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading blue">MERCHANDISE</span>
		</a>
		<p class="era"><?php echo $products[0]['Product']['Name'] ?> &nbsp;&nbsp; 
		<?php 
			if($products[0]['Product']['DiscountPrice'] > 0){
				echo ('<del>&euro;'.$products[0]['Product']['Price'].'</del> &nbsp;&nbsp;  <span>&euro;'.$products[0]['Product']['DiscountPrice'].'</span></p>');
			}
			else{
				echo ('<span>&euro;'.$products[0]['Product']['Price'].'</span></p>');
			}
		?>
	</div>
	<?php } ?>
	<div class="box team_col">
		<img src="/images/home_img8.jpg" alt="">
		<span class="overlay">&nbsp;</span>
		<span class="heading blue">VIDEO</span>
		<a href="#" class="play_button"><img src="/images/play_button.png" alt=""></a>
	</div>
	<!-- When requesting to show more news, simply link to a page with all news -->
	<div class="load_more">
		<a id="load-images" href="/articles/">LOAD MORE NEWS</a>
	</div>
</div>