<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
	<div class="box team_col w2">
		<a href="/racers/view/1">
			<img src="/images/big_img1.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black">ALEKSANDR TONKOV #59</p>
		<a href="/racers/view/1" class="profile"><span>VIEW PROFILE</span></a>
	</div>
	<div class="box team_col w2">
		<a href="/racers/view/2">
			<img src="/images/big_img2.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black">ROMAIN FEBVRE #461</p>
		<a href="/racers/view/2" class="profile"><span>VIEW PROFILE</span></a>
	</div>
	
	<div class="box team_col">
		<a href="#">
			<img src="/images/team_img1.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black font_18">JACKY MARTENS - TEAM MANAGER</p>
	</div>
	<div class="box team_col">
		<a href="#">
			<img src="/images/team_img2.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black font_18">J. DE BUSSER - OPERATIONS MANAGER</p>
	</div>
	<div class="box team_col w2 box_info">
		<span class="heading">GENERAL TEAM INFO</span>
		<div class="description team">
			<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
			<p>Suspendisse eget convallis tellus. Ut dapibus facilisis facilisis. Aliquam pretium lacus gravida libero euismod
			commodo. Fusce mauris enim, commodo id dui a, pellentesque pretium odio. Nam sit amet purus dui. Ut rhoncus tortor velit, id ultrices mauris dapibus consectetur. Mauris id ante fermentum, faucibus purus vitae, congue metus. Aliquam erat volutpat. Ut quis odio porttitor, eleifend nisi at, semper libero.
			<br><br>
			Pellentesque purus risus, aliquam sed est at, aliquam bibendum nisl. Aenean augue leo, ultrices eu arcu eget, luctus blandit mi. Pellentesque lobortis nunc in semper adipiscing. Aliquam non odio vel velit lacinia rutrum vestibulum eget orci.</p>
			<div class="share">
				<ul>
					<li>SHARE &nbsp;&nbsp;</li>
					<li class="fb"><a href="#">&nbsp;</a></li>
					<li class="twitter"><a href="#">&nbsp;</a></li>
					<li class="google"><a href="#">&nbsp;</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	
	<div class="box team_col">
		<a href="#">
			<img src="/images/team_img3.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black font_18">G. BERTAUT - MECHANIC TONKOV</p>
	</div>
	<div class="box team_col">
		<a href="#">
			<img src="/images/team_img4.jpg" alt="">
			<span class="overlay">&nbsp;</span>
			<span class="heading">TEAM</span>
		</a>
		<p class="black font_18">R. COIFFARD - MECHANIC FEBVRE</p>
	</div>
	<?php print($this->element('merchandise')); ?>
	<div class="box_equal">
		<div class="load_more">
			<a id="load-images">MAIN SPONSORS</a>
		</div>
		<div class="box team_col">
			<a href="http://www.wilvo.nl"><img src="/images/item_logo1.png" alt=""></a>
		</div>
		<div class="box team_col">
			<a href="http://www.nestaan.nl"><img src="/images/item_logo2.png" alt=""></a>
		</div>
		<div class="box team_col w4">
			<a href="http://www.husqvarna.com"><img src="/images/item_logo3.png" alt=""></a>
		</div>
	</div>
</div>