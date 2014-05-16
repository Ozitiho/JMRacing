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
        echo $this->Form->input('Photo');
        echo $this->Form->input('CreateDate');
        echo $this->Form->input('user_id', array('type' => 'hidden', 'default'=>AuthComponent::user('id')));
        echo $this->Form->end('Save Article');
        ?>
    </fieldset>
</div>