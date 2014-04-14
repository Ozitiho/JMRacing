<!-- File: /app/View/Results/add.ctp -->

<h1>Add Result</h1>
<?php
echo $this->Form->create('Result');
echo $this->Form->input('EventID');
echo $this->Form->input('RacerID');
echo $this->Form->input('R1');
echo $this->Form->input('R2');
echo $this->Form->input('GP');
echo $this->Form->input('Date');
echo $this->Form->end('Save Post');
?>