<h1>Add Article</h1>
<?php
echo $this->Form->create('Article');
echo $this->Form->input('Title');
echo $this->Form->input('Message', array('rows' => '3'));
echo $this->Form->input('CreateDate');
echo $this->Form->input('EditorID');
echo $this->Form->end('Save Article');
?>