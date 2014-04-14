<!-- File: /app/View/Events/add.ctp -->

<h1>Add Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('Country');
echo $this->Form->input('City');
echo $this->Form->input('Photo');
echo $this->Form->input('Date');
echo $this->Form->end('Save Post');
?>