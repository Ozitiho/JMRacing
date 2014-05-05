<!-- File: /app/View/Posts/view.ctp -->
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>
<h1><?php echo h($racer['Racer']['Name']); ?></h1>

<p><small>Date of Birth: <?php echo $racer['Racer']['DateOfBirth']; ?></small></p>
<p><small>Place of Birth: <?php echo $racer['Racer']['PlaceOfBirth']; ?></small></p>
<p><small>Nationality: <?php echo $racer['Racer']['Nationality']; ?></small></p>
<p><small>Residence: <?php echo $racer['Racer']['Residence']; ?></small></p>
<p><small>Height: <?php echo $racer['Racer']['Height']; ?></small></p>
<p><small>Weight: <?php echo $racer['Racer']['Weight']; ?></small></p>
<p><small>Hardware: <?php echo $racer['Racer']['Hardware']; ?></small></p>

<p><?php echo h($racer['Racer']['Biography']); ?></p>