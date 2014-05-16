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
            <h1>Edit <?php print($result["Racer"]["Name"]);?>'s <?php print($result["Event"]["City"]);?> Results</h1>
        </legend>
        <?php
        echo $this->Form->create('Result');
        echo $this->Form->input('R1');
        echo $this->Form->input('R2');
        echo $this->Form->input('GP');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Edit Results');
        ?>
    </fieldset>
</div>