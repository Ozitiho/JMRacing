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
        echo $this->Form->input('photo_id', array('label' => 'Photo ID (<a href="/albums/cms" target="_blank">browse through albums</a>)', 'type' => 'number'));
        echo $this->Form->input('CreateDate');
        echo $this->Form->input('Tags', array('value' => $this->requestAction('articles/getTagsForArticle/' . $articleID)));
        print("(Seperate tags by using a comma and a space after the last tag)");
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Edit Article');
        ?>
    </fieldset>
</div>