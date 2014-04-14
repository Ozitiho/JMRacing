<!-- File: /app/View/Event/edit.ctp -->

<h1>Edit Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('Country');
echo $this->Form->input('City');
echo $this->Form->input('Photo');
echo $this->Form->input('Date');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>