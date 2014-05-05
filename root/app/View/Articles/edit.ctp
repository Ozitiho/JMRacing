<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner.jpg" alt="">
<?php
$this->end();
?>
<h1>Edit Article</h1>
<?php
echo $this->Form->create('Article');
echo $this->Form->input('Title');
echo $this->Form->input('Message', array('rows' => '3'));
echo $this->Form->input('Photo', array('rows' => '3'));
echo $this->Form->input('LastUpdatedDate');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>