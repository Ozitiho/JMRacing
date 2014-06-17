<?php
//Load the picture loading library
require_once(APP . 'Vendor' . DS . "functions/imageload.php");

$sponsors = $this->requestAction('sponsors/index');

$this->start('bannerImage');
?>
<img src="/images/inner_banner4.jpg" alt="">
<?php
$this->end();
?>
<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
	<?php
		$count = 0;
		foreach($sponsors as $sponsor):
			//Dont include the main sponsors
			$count++;
			if($count <= 3) $image = loadImage($sponsor['Sponsor']['wide_image'], $this);
			else $image = loadImage($sponsor['Sponsor']['box_image'], $this);
			$image = $image['full'];		
		?>
		<div class="box team_col sponsor">
			<a href="<?php echo $sponsor['Sponsor']['URL'] ?>">
				<div class="center-cropped" style="background-image: url('<?php echo $image; ?>'); width: 
					<?php 
						if($count <= 3) echo "417px" ;
						else echo "240px";
					?>
						; h
					eight: 240px;">
					<img src="<?php echo $image ?>" alt="">
				</div>
				<span class="overlay">&nbsp;</span>
			</a>
		</div>
		<?php
		endforeach;
	?>
	
</div>