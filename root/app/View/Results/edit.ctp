<!-- File: /app/View/Result/edit.ctp -->

<h1>Edit Result</h1>
<?php
echo $this->Form->create('Result');
echo $this->Form->input('EventID');
echo $this->Form->input('RacerID');
echo $this->Form->input('R1');
echo $this->Form->input('R2');
echo $this->Form->input('GP');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>