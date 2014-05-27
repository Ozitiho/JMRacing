<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Events</h1>
    </legend>
    <table>
        <tr>
            <th>Country</th>
            <th>City</th>
            <th>Date</th>
			<th>Sponsors</th>
        </tr>

        <?php foreach ($events as $event): 
			$sponsors = $this->requestAction('events/getSponsorsOfEvent/'.$event["Event"]["id"]);
		?>
            <tr>
                <td>
                    <?php echo $this->Html->link($event['Event']['Country'], array('controller' => 'events', 'action' => 'view', $event['Event']['id']));
                    ?>
                </td>
                <td><?php echo $event['Event']['City']; ?></td>
                <td><?php echo $event['Event']['Date']; ?></td>
				<td>
				<?php 
					foreach ($sponsors as $sponsor) {
						echo $sponsor['Sponsor']['Name'] . " ";
					}
				?>
				</td>
                <td>
                    <?php
                    echo $this->Html->link(
                            'Edit', array('action' => 'edit', $event['Event']['id'])
                    );
                    ?>
                    |
                    <?php
                    echo $this->Form->postLink(
                            'Delete', array('action' => 'delete', $event['Event']['id']), 
                            array('confirm' => 'Are you sure?')
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php unset($event); ?>
    </table>
    <a href="/events/add" class="buttonLink">Add Event</a>
</div>