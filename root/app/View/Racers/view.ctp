<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
			<div class="box w2 event_w2">
				<div class="box_top team_col">
					<a>
						<img src="/images/big_img1.jpg" alt="">
					</a>
					<p class="black"><?php echo strtoupper($racer['Racer']['Name'])." #".$racer['Racer']['RacerNumber'] ?></p>
				</div>
				<div class="box_info box_profile">
					<div class="description">
						<h1>Profile</h1>
						<p><?php echo $racer['Racer']['Biography'] ?></p>
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
							<span class="desc"><?php echo $racer['Racer']['DateOfBirth'] ?></span>
						</li>
						<li>
							<span class="label">Place of Birth</span>
							<span class="desc"><?php echo $racer['Racer']['PlaceOfBirth'] ?></span>
						</li>
						<li>
							<span class="label">Nationality</span>
							<span class="desc"><?php echo $racer['Racer']['Nationality'] ?></span>
						</li>
						<li>
							<span class="label">Residence</span>
							<span class="desc"><?php echo $racer['Racer']['Residence'] ?></span>
						</li>
						<li>
							<span class="label">Height</span>
							<span class="desc"><?php echo $racer['Racer']['Height'] ?> cm</span>
						</li>
						<li>
							<span class="label">Weight</span>
							<span class="desc"><?php echo $racer['Racer']['Weight'] ?> kg</span>
						</li>
						<li>
							<span class="label">Hardware</span>
							<span class="desc"><?php echo $racer['Racer']['Hardware'] ?></span>
						</li>
					</ul>
				</div>
			</div>
			<div class="box">
				<div class="results_event">
					<h1>RESULTS <span><?php echo strtoupper($racer['Racer']['Name']) ?></span> #<?php echo $racer['Racer']['RacerNumber'] ?></h1>
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
						
						<?php
							foreach($results as $result){
								if($racer['Racer']['id'] == $result['Result']['racer_id'])
								{
									print("
									<tr>
										<td class='event_name'><span>".$result['Event']['Country']."</span> - ".$result['Event']['City']."</td>
										<td class='event_r1'><span>".$result['Result']['R1']."</span></td>
										<td class='event_r2'><span>".$result['Result']['R2']."</span></td>
										<td class='event_gp'><span>".$result['Result']['GP']."</span></td>
									</tr>
									");
								}
							
							}
						?>
						
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
							<td class="event_name"><span>WORLD CUP STANDING</span></td>
							<td class="event_gp blank"><span class="yellow"><?php echo $racer['Racer']['WorldCupStanding'] ?></span></td>
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