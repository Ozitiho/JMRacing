<?php
// Include the countdown element
print($this->element('countdown'));

$this->start('bannerImage');
?>
<img src="/images/inner_banner.jpg" alt="">
<?php
$this->end();
?>
<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
	<?php
		$url = $actual_link = "$_SERVER[HTTP_HOST]";
		
		$count = 0;
		foreach($articles as $article)
		{
			$currentUrl = $url . "/articles/" .  $article['Article']['id'];
			$count++;
			if($count == 1){
			?>
			<div class="box w3">
				<div class="image_left"><img src="/<?php echo $article['Article']['Photo']; ?>" alt=""></div>
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
			} 
			else {
			?>
			<div class="box">
				<div class="center-cropped news" style="background-image: url('/<?php echo $article['Article']['Photo']; ?>');">
					<img src="/<?php echo $article['Article']['Photo']; ?>" alt="">
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
