<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();

	$sponsorList = array();
	foreach($sponsors as $sponsor){
		$sponsorList[$sponsor['Sponsor']['id']] = $sponsor['Sponsor']['Name'];
	}
?>
<div class="box users form cms">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <legend class="legend">
            <h1>Add Event</h1>
        </legend>
        <?php
        echo $this->Form->create('Event');
        echo $this->Form->input('Country');
        echo $this->Form->input('City');
        echo $this->Form->input('Description', array('rows' => '5'));
        echo $this->Form->input('ticketURL');
        echo $this->Form->input('photo_id', array('label' => 'Photo ID (<a href="/albums/cms" target="_blank">browse through albums</a>)', 'type' => 'number'));
        echo $this->Form->input('Date');
        echo $this->Form->input('main_sponsor', array('options' => array(
														'1' => $sponsors[0]['Sponsor']['Name'], 
														'2' => $sponsors[1]['Sponsor']['Name'],
														'3' => $sponsors[2]['Sponsor']['Name']), 'default' => $event['Event']['main_sponsor']));
        echo $this->Form->input('sponsor1', array('options' => $sponsorList, 'default' => $event['Event']['sponsor1']));
        echo $this->Form->input('sponsor2', array('options' => $sponsorList, 'default' => $event['Event']['sponsor2']));
        echo $this->Form->end('Add Event');
        ?>
    </fieldset>
</div>