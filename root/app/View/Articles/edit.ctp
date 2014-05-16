<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner.jpg" alt="">
<?php
$this->end();
?>

<?php
// Set a custom title
$this->start('title');
print("Edit Article");
$this->end();
?>

<div class="box users form cms">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <legend class="legend">
            <h1>Edit Article</h1>
        </legend>
        <?php
        echo $this->Form->create('Article');
        echo $this->Form->input('Title');
        echo $this->Form->input('Message', array('rows' => '10'));
        echo $this->Form->input('Photo');
        echo $this->Form->input('CreateDate');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Save Post');
        ?>
    </fieldset>
</div>