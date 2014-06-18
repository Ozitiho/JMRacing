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

<link href="/js/RateIt/rateit.css" rel="stylesheet" type="text/css">

<script src="/js/RateIt/jquery.rateit.min.js" type="text/javascript"></script>

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
		?>
		
		<!-- The priority input is done like this to show the rating stars-->
		<div class="input range required">
			<label class="tooltip" tooltip="
				The highest priorities will always stay on top on the homepage. The lowest priority will never show on the homepage.
				" for="ArticlePriority">
				Priority
			</label>
			<input name="data[Article][priority]" type="range" value="<?php echo $article['Article']['priority'] ?>" id="backing4">
			<div class="rateit" data-rateit-resetable="false" data-rateit-ispreset="true"
				data-rateit-min="0" data-rateit-max="5" data-rateit-step="1"  data-rateit-backingfld="#backing4">
			</div>
		</div>
		
		<?php
        echo $this->Form->input('Tags', array('value' => $this->requestAction('articles/getTagsForArticle/' . $article['Article']['id'])));
        print("(Seperate tags by using a comma and a space between tags)");
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Edit Article');
        ?>
    </fieldset>
</div>