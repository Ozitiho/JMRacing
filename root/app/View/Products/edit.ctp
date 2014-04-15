<h1>Edit Product</h1>
<?php
echo $this->Form->create('Product');
echo $this->Form->input('Name');
echo $this->Form->input('Price');
echo $this->Form->input('Size');
echo $this->Form->input('Photo');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>