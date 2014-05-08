<!-- File: /app/View/Posts/add.ctp -->
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>
<h1>Add Racer</h1>
<?php
echo $this->Form->create('Racer');
echo $this->Form->input('Name');
echo $this->Form->input('RacerNumber');
echo $this->Form->end('Save Racer');
?>