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
echo $this->Form->input('Biography', array('rows' => '5'));
echo $this->Form->input('DateOfBirth');
echo $this->Form->input('PlaceOfBirth');
echo $this->Form->input('Nationality');
echo $this->Form->input('Residence');
echo $this->Form->input('Height', array('type' => 'number'));
echo $this->Form->input('Weight', array('type' => 'number'));
echo $this->Form->input('Hardware');
echo $this->Form->input('RacerNumber');
echo $this->Form->input('Photo', array('type' => 'url'));
echo $this->Form->input('TicketsLink', array('type' => 'url'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>