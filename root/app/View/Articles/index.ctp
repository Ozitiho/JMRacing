<div class="all_news">
	<div class="news_column">
		<?php
			function article($article){
				echo ('<img src="' . $article['Article']['Photo'] . '" alt="">
						<span class="heading">NEWS</span>
						<div class="description">
							<h2>' . $article['Article']['Title'] . '</h2>
							<p>' . $article['Article']['Message'] . '</p>
							<div class="share">
								<ul>
									<li>SHARE &nbsp;&nbsp;</li>
									<li class="fb"><a href="#">&nbsp;</a></li>
									<li class="twitter"><a href="#">&nbsp;</a></li>
									<li class="google"><a href="#">&nbsp;</a></li>
								</ul>
								<a href="#" class="button">READ FULL ARTICLE</a>
							</div>
						</div>
					</div>');
			}
		
			$count = 0;
			foreach($articles as $article){
				if($count >= 4){
					break;
				}
				if($count % 2 == 0){
					echo '<div class="row">
							<div class="box">';
				}
				else {
					echo '<div class="box fright">';
				}
				
				article($article);
				
				if($count % 2 == 1){
					echo '</div>';
				}
				$count++;
			}
		?>
	</div>
	<div class="news_column news_column2">
		<div class="team_col">
			<div class="box">
				<a href="#">
					<img src="/images/home_img3.jpg" alt="">
					<span class="overlay">&nbsp;</span>
					<span class="heading">TEAM</span>
				</a>
				<p class="black">ALEKSANDR TONKOV #59</p>
			</div>
			<div class="box">
				<a href="#">
					<img src="/images/home_img4.jpg" alt="">
					<span class="overlay">&nbsp;</span>
					<span class="heading">TEAM</span>
				</a>
				<p class="black">ROMAIN FEBVRE #461</p>
			</div>
			<div class="box">
				<a href="#">
					<img src="/images/home_img7.jpg" alt="">
					<span class="overlay">&nbsp;</span>
					<span class="heading blue">MERCHANDISE</span>
				</a>
				<p class="era">New Era - Red Bull Cap &nbsp;&nbsp;  <del>?29,95</del> &nbsp;&nbsp;  <span>?14,95</span></p>
			</div>
			<div class="box">
				<img src="/images/home_img8.jpg" alt="">
				<span class="overlay">&nbsp;</span>
				<span class="heading blue">VIDEO</span>
				<a href="#" class="play_button"><img src="/images/play_button.png" alt=""></a>
			</div>
		</div>
		<div class="big_social">
			<div class="facebook_box">
				<!--<img src="/images/big_fb.png" alt="" class="position">-->
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
			<div class="facebook_box twitter_box">
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
		</div>
	</div>
	<div class="news_column news_column3">
		<?php
			$count = -1;
			foreach($articles as $article){
				$count++;
				if($count < 4){
					continue;
				}
				if($count % 4 == 0){
					echo '<div class="row">';
				}
				if($count % 4 != 3){
					echo '<div class="box more">';
				}		
				else {
					echo '<div class="box more fright">';
				}
				
				article($article);
				
				if($count % 4 == 3){
					echo '</div>';
				}
			}
		?>
	</div>
	<div class="load_more">
		<a href="#">LOAD MORE NEWS</a>
	</div>
</div>