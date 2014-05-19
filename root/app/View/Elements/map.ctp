<?php
$this->start('map');

// Get the flag positions
$events = $this->requestAction('events/getUpcomingEvents');

// Only show the flag positions if there are any
if ($events) {
	foreach ($events as $event) {
		//if($event['Event']['id'] == 16){
			// Calculate flag position
			$marginTop = (20 + (((($event['Event']['Latitude'] * 100) / 85) * 20) / 100));
			$marginLeft = (40 + (((($event['Event']['Longitude'] * 100) / 180) * 40) / 100));
			
			print("
				<div class='flag' style='margin-left:".$marginLeft."%;margin-top:".$marginTop."%;'>
					<img src='/images/flag.png'>
				</div>
			");
		//}
	}
}

$this->end();
?>