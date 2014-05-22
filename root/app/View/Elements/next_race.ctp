<?php
$this->start('next_race');

// Get the event
$events = $this->requestAction('events/getUpcomingEvents');

if ($events) {
	foreach ($events as $event) {
		print("<p>".$event['Event']['Date']." - ".$event['Event']['City']." - ".$event['Event']['Country']."</p>");
		break;
	}
}

$this->end();
?>