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
        echo $this->Form->input('Size', array('type' => 'select', 'options' =>
            array("none" => "None", "s" => "S", "m" => "M", "l" => "L", "xl" => "XL")));
        echo $this->Form->input('photo_id', array('label' => 'Photo ID (<a href="/albums/cms" target="_blank">browse through albums</a>)', 'type' => 'number'));
        echo $this->Form->end('Edit Product');
        ?>
    </fieldset>
</div>