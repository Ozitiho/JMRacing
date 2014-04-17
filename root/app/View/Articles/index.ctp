<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
	<?php
		$url = "www.example.com";
	
		$count = 0;	
		foreach($articles as $article)
		{
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
							<li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com" target="_blank">&nbsp;</a></li>
							<li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $url . " " . $article['Article']['Title']; ?>" target="_blank">&nbsp;</a></li>
							<li class="google"><a href="https://plus.google.com/share?url=<?php echo $url?>" target="_blank">&nbsp;</a></li>
						</ul>
						<a href="#" class="button yellow">READ FULL ARTICLE</a>
					</div>
				</div>
			</div>	
		<?php
			$count ++;
			if($count == 4) break;
			if($count == 3){
				?>
				<div class="facebook_box box">
					<h1>FACEBOOK</h1>
					<ul>
						<li>
							<span>03 April 2014</span>
							<a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod venenatis viverra. http://pra.erat/ante</a>
						</li>
						<li>
							<span>05 April 2014</span>
							<a href="#">Imperdiet luctus lectus porttitor, aliquam placerat massa. Aenean elit arcu, pretium non ultrices a, volutpat aliquet nibh.</a>
						</li>
					</ul>
					<a href="#" class="button">JOIN OUR FACEBOOK</a>
				</div>
				<div class="facebook_box twitter_box box">
					<h1>TWITTER</h1>
					<ul>
						<li>
							<span>03 April 2014</span>
							<a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod venenatis viverra. http://pra.erat/ante</a>
						</li>
						<li>
							<span>05 April 2014</span>
							<a href="#">Imperdiet luctus lectus porttitor, aliquam placerat massa. Aenean elit arcu, pretium non ultrices a, volutpat aliquet nibh.</a>
						</li>
					</ul>
					<a href="#" class="button">FOLLOW ON TWITTER</a>
				</div>
				<?php
			}
		}
	?>
	<div class="box team_col">
		<a href="#">
			<img src="images/home_img3.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black">ALEKSANDR TONKOV #59</p>
	</div>
	<div class="box team_col">
		<a href="#">
			<img src="images/home_img4.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black">ROMAIN FEBVRE #461</p>
	</div>
	<div class="box team_col">
		<a href="#">
			<img src="images/home_img7.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading blue">MERCHANDISE</span>
		</a>
		<p class="era">New Era - Red Bull Cap &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
	</div>
	<div class="box team_col">
		<img src="images/home_img8.jpg" alt="">
		<span class="overlay">&nbsp;</span>
		<span class="heading blue">VIDEO</span>
		<a href="#" class="play_button"><img src="images/play_button.png" alt=""></a>
	</div>
	<div class="load_more">
		<a id="load-images">LOAD MORE NEWS</a>
	</div>
</div>