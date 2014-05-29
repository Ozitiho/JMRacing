<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms cmsResults">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <legend class="legend">
            <h1>Edit: <?php print($eventSponsor["Event"]["Country"]);?> - <?php print($eventSponsor["Event"]["City"]);?> sponsor</h1>
        </legend>
        <?php
        echo $this->Form->create('EventSponsor');
        echo $this->Form->input('sponsor_id');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Edit Sponsor');
        ?>
    </fieldset>
</div>