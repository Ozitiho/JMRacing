<h1>Add Product</h1>
<?php
echo $this->Form->create('Product');
echo $this->Form->input('Name');
echo $this->Form->input('Price');
echo $this->Form->input('Size');
echo $this->Form->input('Photo');
echo $this->Form->end('Save Article');
?>