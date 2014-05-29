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
        echo $this->Form->input('priority', array('label' => '<p>5: Always on top <br> 
													4: Always after 5 <br> 3: Default (sort by date) 
													<br> 2: Usually after 3 (unless the newest 3 is really old) 
													<br> 1: Similar to 2, but usually after 2 <br> 0: Only show in article index</p>Priority ', 
													'options' => array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5')));
        echo $this->Form->input('user_id', array('type' => 'hidden', 'default'=>AuthComponent::user('id')));
        echo $this->Form->end('Add Article');
        ?>
    </fieldset>
</div>