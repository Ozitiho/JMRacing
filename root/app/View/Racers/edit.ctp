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
            <h1>Edit Racer</h1>
        </legend>
        <?php
        echo $this->Form->create('Racer');
        echo $this->Form->input('Name');
        echo $this->Form->input('RacerNumber');
        echo $this->Form->input('Biography', array('rows' => '10'));
        echo $this->Form->input('DateOfBirth');
        echo $this->Form->input('PlaceOfBirth');
        echo $this->Form->input('Nationality');
        echo $this->Form->input('Residence');
        echo $this->Form->input('Height');
        echo $this->Form->input('Weight');
        echo $this->Form->input('Hardware');
        echo $this->Form->input('WorldCupStanding');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Edit Racer');
        ?>
    </fieldset>
</div>