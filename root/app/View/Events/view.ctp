<!-- File: /app/View/Events/view.ctp -->

<h1><?php echo h($event['Event']['Country']); ?></h1>

<p><small>City: <?php echo $event['Event']['City']; ?></small></p>
<p><small>Date: <?php echo $event['Event']['Date']; ?></small></p
<p><small>Photo:<br> <img src='<?php echo $event['Event']['Photo']; ?>'></img></small></p>