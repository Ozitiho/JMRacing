<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>

<div class="box users form cms">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <legend class="legend">
            <h1>Edit Product</h1>
        </legend>
        <?php
        echo $this->Form->create('Product');
        echo $this->Form->input('Name');
        echo $this->Form->input('Price');
        echo $this->Form->input('DiscountPrice');
        echo $this->Form->input('description', array('rows' => '5'));
		echo $this->Form->input('Size', array('type'=>'select', 'multiple'=>'checkbox', 'label'=> __('Email notice'), 'class'=>'multiple-chb', 'options'=> array('title...'=>array( '5'=>'5 days', '15'=>'15 days', '30'=>'30 days', '60'=>'60 days');
        echo $this->Form->input('photo_id', array('label' => 'Photo ID (<a href="/albums/cms" target="_blank">browse through albums</a>)', 'type' => 'number'));
        echo $this->Form->end('Edit Product');
        ?>
    </fieldset>
</div>