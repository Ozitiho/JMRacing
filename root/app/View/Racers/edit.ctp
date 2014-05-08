<!-- File: /app/View/Posts/edit.ctp -->
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>
<h1>Edit Racer</h1>
<?php
echo $this->Form->create('Racer');
echo $this->Form->input('Name');
echo $this->Form->input('RacerNumber');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>