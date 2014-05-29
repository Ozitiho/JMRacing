<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();

// Get events
$events = $this->requestAction('events/getEventsByYear/2014');

?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Sponsors for Event</h1>
    </legend>
    <table>
        <tr>
            <th>Event</th>
            <th>Sponsors</th>
        </tr>

        <?php
		foreach ($events as $event) {
			?>
			<tr>
			<td><?php echo $event['Event']['Country']." - ".$event['Event']['City']; ?></td>
			<td>
			
			<?php
			foreach ($eventSponsors as $eventSponsor) {
				if ($eventSponsor['EventSponsor']['event_id'] == $event['Event']['id']) {
					echo $eventSponsor['Sponsor']['Name']." ";
				}
			}
			?>
			
			</td>
			<td><a href='/EventSponsors/edit/<?php echo $event['Event']['id'];?>'>Edit</a></td>
			</tr>
		<?php
		}
		?>
    </table>
</div>