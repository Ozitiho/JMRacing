<?php
	function shorten($string)
	{
		if (strlen($string) > 116){
			$string = substr($string, 0, 113);
			$string .= '...';
		}
		return $string;
	}

	// Include the countdown element
	print($this->element('countdown'));

	//Load the external twitter API library
	require_once(App::path('Vendor')[0] . "twitter-api-php/TwitterAPIExchange.php");

	// These are the twitter app access tokens - see: https://dev.twitter.com/apps/
	$settings = array(
		'oauth_access_token' => "249730612-OWKcfzHN4EgjT5Lm4r2FEFGjkSfvydvAkOaDHCcO",
		'oauth_access_token_secret' => "HZTa0hNDUl4LJgCimaUFFPxumfH5xmFeR2eWUOva0Y8TX",
		'consumer_key' => "iMs9fbv99Ev5NqkW20Vio5uSZ",
		'consumer_secret' => "qvkmztmaWukquDEYBMGPPJ6Zf40NCmgiGgh0c1IKBP5vPyk6m7"
	);

	/** Perform a GET request and echo the response
	    Note: Set the GET field BEFORE calling buildOauth(); **/
	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	$getfield = '?screen_name=HusqvarnaMXGP';
	$requestMethod = 'GET';
	$twitter = new TwitterAPIExchange($settings);
	$tweets =  $twitter->setGetfield($getfield)
				 ->buildOauth($url, $requestMethod)
				 ->performRequest();
	
	//Decode the twitter json and save them for now
	$tweets = json_decode($tweets, true);
	
	//Load Facebook posts
	
	$page_id = 'husqvarnamxgp';

	$token = '243799329140027|63915777e84ed91f711ac64cf25ca565';

	// get JSON from adres
	$page_posts = file_get_contents('https://graph.facebook.com/'.$page_id.'/posts?fields=message&access_token='.$token);

	//Also save the facebook json to be used later.
	$pageposts = json_decode($page_posts, true);
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
						<a href="#" class="button yellow">READ FULL ARTICLE</a>
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
							<a href="https://www.facebook.com/husqvarnamxgp"><?php echo shorten($pageposts['data'][$i]['message']); ?></a>
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
	<div class="box team_col">
		<a href="#">
			<img src="/images/home_img7.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading blue">MERCHANDISE</span>
		</a>
		<p class="era">New Era - Red Bull Cap &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
	</div>
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