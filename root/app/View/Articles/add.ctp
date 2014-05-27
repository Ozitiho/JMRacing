<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>

<?php
// Set a custom title
$this->start('title');
print("Add Article");
$this->end();
?>

<div class="box users form cms">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <legend class="legend">
            <h1>Add Article</h1>
        </legend>
        <?php
        echo $this->Form->create('Article');
        echo $this->Form->input('Title');
        echo $this->Form->input('Message', array('rows' => '10'));
        echo $this->Form->input('photo_id', array('label' => 'Photo ID (<a href="/albums/cms" target="_blank">browse through albums</a>)', 'type' => 'number'));
        echo $this->Form->input('CreateDate');
		echo $this->Form->input('Priority', array('options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5')));
        echo $this->Form->input('user_id', array('type' => 'hidden', 'default'=>AuthComponent::user('id')));
        echo $this->Form->end('Add Article');
        ?>
    </fieldset>
</div>