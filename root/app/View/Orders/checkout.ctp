<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box orders form cms">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <legend class="legend">
            <h1>New Order</h1>
        </legend>
        <?php
        echo $this->Form->create('Order');
        echo $this->Form->input('name');
        echo $this->Form->input('first_name');
        echo $this->Form->input('company');
        echo $this->Form->input('country', array(
            'options' => array('netherlands' => 'Netherlands', 
				'belgium' => 'Belgium',
                'germany' => 'Germany')
        ));
        echo $this->Form->input('city');
        echo $this->Form->input('street');
        echo $this->Form->input('house_number');
        echo $this->Form->end('Add Order');
        ?>
    </fieldset>
</div>