<!-- File: /app/View/Posts/view.ctp -->
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>

<?php
	if($racer['Racer']['id'] == 1){
?>
	<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
				<div class="box w2 event_w2">
					<div class="box_top team_col">
						<a>
							<img src="/images/big_img1.jpg" alt="">
						</a>
						<p class="black"> ALEKSANDR TONKOV #59</p>
					</div>
					<div class="box_info box_profile">
						<div class="description">
							<h1>Profile</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id feugiat urna. Duis consequat varius lacinia. Donec ac risus cursus, elementum leo sit amet, cursus magna. Sed in porta mi. Praesent ut est convallis, sodales purus ut, ultricies lorem. Vivamus vestibulum urna ac tempor cursus. Phasellus pellentesque commodo nunc, quis lobortis nunc fermentum at. In pellentesque sagittis felis, non ornare turpis auctor non. Aenean rutrum tristique mi, non pulvinar nisl porta in.
							<br><br>
							Cras vitae urna lectus. Aliquam condimentum ipsum nisi, a faucibus ante tempor sed. Phasellus aliquam nisl a urna dignissim, fermentum mattis arcu sollicitudin. Etiam sed mauris dapibus, hendrerit eros sed, pellentesque tellus. Phasellus malesuada, eros vel viverra tristique, tellus tortor tincidunt mauris, eu ornare lectus enim sit amet felis. Donec dapibus pulvinar tortor, vel feugiat dolor cursus in. Quisque sit amet ipsum ac nulla lacinia accumsan at at felis. Aliquam accumsan scelerisque lacus. Ut lobortis aliquam posuere.</p>
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
				</div>
				<div class="box">
					<div class="personal_info">
						<h1>PERSONAL INFO</h1>
						<ul>
							<li>
								<span class="label">Date of Birth</span>
								<span class="desc">26 - 08 - 1986</span>
							</li>
							<li>
								<span class="label">Place of Birth</span>
								<span class="desc">Lorem Ipsum</span>
							</li>
							<li>
								<span class="label">Nationality</span>
								<span class="desc">Poland</span>
							</li>
							<li>
								<span class="label">Residence</span>
								<span class="desc">Amsterdam</span>
							</li>
							<li>
								<span class="label">Height</span>
								<span class="desc">1.88 cm</span>
							</li>
							<li>
								<span class="label">Weight</span>
								<span class="desc">86 kg</span>
							</li>
							<li>
								<span class="label">Hardware</span>
								<span class="desc">Husqvarna TE 310R</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="box">
					<div class="results_event">
						<h1>RESULTS <span>ALEKSANDR TONKOV</span> #59</h1>
						<table>
							<tr>
								<th class="yellow">EVENT</th>
								<th>R 1</th>
								<th>R 2</th>
								<th>GP</th>
							</tr>
							<tr class="empty">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td class="event_name"><span>France</span> - St. J. d’Angely</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Italy</span> - Maggiori</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Germany</span> - Teutschent...</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Sweden</span> - Uddevalla</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Finland</span> - Hyvinkää</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Czech Republic</span> - Loket</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>France</span> - St. J. d’Angely</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Italy</span> - Maggiori</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Germany</span> - Teutschent...</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Sweden</span> - Uddevalla</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Finland</span> - Hyvinkää</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Czech Republic</span> - Loket</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>France</span> - St. J. d’Angely</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr class="empty">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr class="border">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr class="average">
								<td class="event_name"><span>AVARAGE ALL RACES</span></td>
								<td class="event_r1 blank"><span>6</span></td>
								<td class="event_r2 blank"><span>3</span></td>
								<td class="event_gp blank"><span class="yellow">8</span></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="box team_col">
					<img src="/images/home_img8.jpg" alt="">
					<span class="overlay">&nbsp;</span>
					<span class="heading blue">VIDEO</span>
					<a href="#" class="play_button"><img src="/images/play_button.png" alt=""></a>
				</div>
				<div class="box team_col">
					<a href="/teams/">
						<img src="/images/team_img4.jpg" alt="">
						<span class="overlay">&nbsp;</span>
						<span class="heading">TEAM</span>
					</a>
					<p class="black font_18">R. COIFFARD - MECHANIC FEBVRE</p>
				</div>
				<div class="box_equal">
					<div class="load_more">
						<a id="load-images">MERCHANDISE</a>
					</div>
					<div class="box team_col item">
						<img src="/images/team_img5.jpg" alt="">
						<span class="heading blue">MERCHANDISE</span>
						<div class="description">
							<p class="era">Race Shirt - Red Bull &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
							<div class="share">
								<ul>
									<li>SHARE &nbsp;&nbsp;</li>
									<li class="fb"><a href="#">&nbsp;</a></li>
									<li class="twitter"><a href="#">&nbsp;</a></li>
									<li class="google"><a href="#">&nbsp;</a></li>
								</ul>
								<a href="#" class="button">BUY THIS ITEM</a>
							</div>
						</div>
					</div>
					<div class="box team_col item">
						<img src="/images/team_img6.jpg" alt="">
						<span class="heading blue">MERCHANDISE</span>
						<div class="description">
							<p class="era">New Era - Red Bull Cap &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
							<div class="share">
								<ul>
									<li>SHARE &nbsp;&nbsp;</li>
									<li class="fb"><a href="#">&nbsp;</a></li>
									<li class="twitter"><a href="#">&nbsp;</a></li>
									<li class="google"><a href="#">&nbsp;</a></li>
								</ul>
								<a href="#" class="button">BUY THIS ITEM</a>
							</div>
						</div>
					</div>
				</div>
				<div class="box_equal">
					<div class="load_more">
						<a id="load-images">MAIN SPONSORS</a>
					</div>
					<div class="box team_col">
						<a href="#"><img src="/images/item_logo1.png" alt=""></a>
					</div>
					<div class="box team_col">
						<a href="#"><img src="/images/item_logo2.png" alt=""></a>
					</div>
					<div class="box team_col w4">
						<a href="#"><img src="/images/item_logo3.png" alt=""></a>
					</div>
				</div>
	</div>

<?php
	}
	else{
?>

	<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
				<div class="box w2 event_w2">
					<div class="box_top team_col">
						<a>
							<img src="/images/big_img3.jpg" alt="">
						</a>
						<p class="black"> ROMAIN FEBVRE #461</p>
					</div>
					<div class="box_info box_profile">
						<div class="description">
							<h1>Profile</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id feugiat urna. Duis consequat varius lacinia. Donec ac risus cursus, elementum leo sit amet, cursus magna. Sed in porta mi. Praesent ut est convallis, sodales purus ut, ultricies lorem. Vivamus vestibulum urna ac tempor cursus. Phasellus pellentesque commodo nunc, quis lobortis nunc fermentum at. In pellentesque sagittis felis, non ornare turpis auctor non. Aenean rutrum tristique mi, non pulvinar nisl porta in.
							<br><br>
							Cras vitae urna lectus. Aliquam condimentum ipsum nisi, a faucibus ante tempor sed. Phasellus aliquam nisl a urna dignissim, fermentum mattis arcu sollicitudin. Etiam sed mauris dapibus, hendrerit eros sed, pellentesque tellus. Phasellus malesuada, eros vel viverra tristique, tellus tortor tincidunt mauris, eu ornare lectus enim sit amet felis. Donec dapibus pulvinar tortor, vel feugiat dolor cursus in. Quisque sit amet ipsum ac nulla lacinia accumsan at at felis. Aliquam accumsan scelerisque lacus. Ut lobortis aliquam posuere.</p>
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
				</div>
				<div class="box">
					<div class="personal_info">
						<h1>PERSONAL INFO</h1>
						<ul>
							<li>
								<span class="label">Date of Birth</span>
								<span class="desc">26 - 08 - 1986</span>
							</li>
							<li>
								<span class="label">Place of Birth</span>
								<span class="desc">Lorem Ipsum</span>
							</li>
							<li>
								<span class="label">Nationality</span>
								<span class="desc">Poland</span>
							</li>
							<li>
								<span class="label">Residence</span>
								<span class="desc">Amsterdam</span>
							</li>
							<li>
								<span class="label">Height</span>
								<span class="desc">1.88 cm</span>
							</li>
							<li>
								<span class="label">Weight</span>
								<span class="desc">86 kg</span>
							</li>
							<li>
								<span class="label">Hardware</span>
								<span class="desc">Husqvarna TE 310R</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="box">
					<div class="results_event">
						<h1>RESULTS <span>ROMAIN FEBVRE</span> #461</h1>
						<table>
							<tr>
								<th class="yellow">EVENT</th>
								<th>R 1</th>
								<th>R 2</th>
								<th>GP</th>
							</tr>
							<tr class="empty">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td class="event_name"><span>France</span> - St. J. d’Angely</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Italy</span> - Maggiori</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Germany</span> - Teutschent...</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Sweden</span> - Uddevalla</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Finland</span> - Hyvinkää</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Czech Republic</span> - Loket</td>
								<td class="event_r1"><span>6</span></td>
								<td class="event_r2"><span>3</span></td>
								<td class="event_gp"><span>8</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>France</span> - St. J. d’Angely</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Italy</span> - Maggiori</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Germany</span> - Teutschent...</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Sweden</span> - Uddevalla</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Finland</span> - Hyvinkää</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>Czech Republic</span> - Loket</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr>
								<td class="event_name"><span>France</span> - St. J. d’Angely</td>
								<td class="event_r1 blank"><span>&nbsp;</span></td>
								<td class="event_r2 blank"><span>&nbsp;</span></td>
								<td class="event_gp blank"><span>&nbsp;</span></td>
							</tr>
							<tr class="empty">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr class="border">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr class="average">
								<td class="event_name"><span>AVARAGE ALL RACES</span></td>
								<td class="event_r1 blank"><span>6</span></td>
								<td class="event_r2 blank"><span>3</span></td>
								<td class="event_gp blank"><span class="yellow">8</span></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="box team_col">
					<img src="/images/home_img8.jpg" alt="">
					<span class="overlay">&nbsp;</span>
					<span class="heading blue">VIDEO</span>
					<a href="#" class="play_button"><img src="/images/play_button.png" alt=""></a>
				</div>
				<div class="box team_col">
					<a href="/teams/">
						<img src="/images/team_img4.jpg" alt="">
						<span class="overlay">&nbsp;</span>
						<span class="heading">TEAM</span>
					</a>
					<p class="black font_18">R. COIFFARD - MECHANIC FEBVRE</p>
				</div>
				<div class="box_equal">
					<div class="load_more">
						<a id="load-images">MERCHANDISE</a>
					</div>
					<div class="box team_col item">
						<img src="/images/team_img5.jpg" alt="">
						<span class="heading blue">MERCHANDISE</span>
						<div class="description">
							<p class="era">Race Shirt - Red Bull &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
							<div class="share">
								<ul>
									<li>SHARE &nbsp;&nbsp;</li>
									<li class="fb"><a href="#">&nbsp;</a></li>
									<li class="twitter"><a href="#">&nbsp;</a></li>
									<li class="google"><a href="#">&nbsp;</a></li>
								</ul>
								<a href="#" class="button">BUY THIS ITEM</a>
							</div>
						</div>
					</div>
					<div class="box team_col item">
						<img src="/images/team_img6.jpg" alt="">
						<span class="heading blue">MERCHANDISE</span>
						<div class="description">
							<p class="era">New Era - Red Bull Cap &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
							<div class="share">
								<ul>
									<li>SHARE &nbsp;&nbsp;</li>
									<li class="fb"><a href="#">&nbsp;</a></li>
									<li class="twitter"><a href="#">&nbsp;</a></li>
									<li class="google"><a href="#">&nbsp;</a></li>
								</ul>
								<a href="#" class="button">BUY THIS ITEM</a>
							</div>
						</div>
					</div>
				</div>
				<div class="box_equal">
					<div class="load_more">
						<a id="load-images">MAIN SPONSORS</a>
					</div>
					<div class="box team_col">
						<a href="#"><img src="/images/item_logo1.png" alt=""></a>
					</div>
					<div class="box team_col">
						<a href="#"><img src="/images/item_logo2.png" alt=""></a>
					</div>
					<div class="box team_col w4">
						<a href="#"><img src="/images/item_logo3.png" alt=""></a>
					</div>
				</div>
	</div>

<?php
	}
?>