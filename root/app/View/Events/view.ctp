<!-- File: /app/View/Events/view.ctp -->
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>
<h1><?php echo h($event['Event']['Country']); ?></h1>

<p><small>Country: <?php echo $event['Event']['Country']; ?></small></p>
<p><small>City: <?php echo $event['Event']['City']; ?></small></p>
<p><small>Description: <?php echo $event['Event']['Description']; ?></small></p>
<p><small>Photo:<br> <img src='<?php echo $event['Event']['Photo']; ?>'></small></p>
<p><small>Latitude: <?php echo $event['Event']['Latitude']; ?></small></p>
<p><small>Longitude: <?php echo $event['Event']['Longitude']; ?></small></p>
<p><small>Date: <?php echo $event['Event']['Date']; ?></small></p>