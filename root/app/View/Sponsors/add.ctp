<h1>Add Sponsor</h1>
<?php
echo $this->Form->create('Sponsor');
echo $this->Form->input('Name');
echo $this->Form->input('Image');
echo $this->Form->input('URL', array('type' => 'url'));
echo $this->Form->end('Save Sponsor');
?>