<?php
	$tweets = $this->requestAction('socialMedia/getTweets');
	
	$pageposts = $this->requestAction('socialMedia/getFacebookPosts');
?>
<div class="facebook_box box">
	<h1>FACEBOOK</h1>
	<ul>
		<?php
			if($pageposts == NULL){
			?>
			<li>
				<a href="https://www.facebook.com/husqvarnamxgp">Could not retrieve Facebook posts. Click here to go to Husqvarna MX's facebook page or refresh to try again.</a>
			</li>
			<?php	
			}
			else{
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
			}
		?>
	</ul>
	<a href="https://www.facebook.com/husqvarnamxgp" class="button">JOIN OUR FACEBOOK</a>
</div>
<div class="facebook_box twitter_box box">
	<h1>TWITTER</h1>
	<ul>
		<?php
			if($tweets == NULL){
			?>
			<li>
				<a href="https://twitter.com/HusqvarnaMXGP">Could not retrieve Twitter posts. Click here to go to Husqvarna MX's twitter feed or refresh to try again.</a>
			</li>
			<?php
			}
			else{
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
			}
		?>
	</ul>
	<a href="https://twitter.com/HusqvarnaMXGP" class="button">FOLLOW ON TWITTER</a>
</div>