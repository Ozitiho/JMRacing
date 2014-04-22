<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
	<?php
		$url = "www.example.com";
	
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
							<li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url . " " . $article['Article']['Title']; ?>" target="_blank">&nbsp;</a></li>
							<li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $url . " " . $article['Article']['Title']; ?>" target="_blank">&nbsp;</a></li>
							<li class="google"><a href="https://plus.google.com/share?url=<?php echo $url?>" target="_blank">&nbsp;</a></li>
						</ul>
						<a href="#" class="button yellow">READ FULL ARTICLE</a>
					</div>
				</div>
			</div>	
		<?php
		}
	?>
</div>