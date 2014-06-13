<?php
$this->start('map');

// Get events
$date = date("Y");
$events = $this->requestAction("events/getEventsByYear/$date");
?>
	<!-- id = 1 -->
	<div class='flag' style='margin-left:58%;margin-top:22%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 2 -->
	<div class='flag' style='margin-left:72.5%;margin-top:25.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 3 -->
	<div class='flag' style='margin-left:30%;margin-top:40%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 4 -->
	<div class='flag' style='margin-left:46%;margin-top:15.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 5 -->
	<div class='flag' style='margin-left:50%;margin-top:16.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 6 -->
	<div class='flag' style='margin-left:44.5%;margin-top:13.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 7 -->
	<div class='flag' style='margin-left:41.5%;margin-top:17.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 8 -->
	<div class='flag' style='margin-left:42.5%;margin-top:13.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 9 -->
	<div class='flag' style='margin-left:43%;margin-top:15.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 10 -->
	<div class='flag' style='margin-left:45.5%;margin-top:15.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 11 -->
	<div class='flag' style='margin-left:46.5%;margin-top:14%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 12 -->
	<div class='flag' style='margin-left:46.5%;margin-top:11%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 13 -->
	<div class='flag' style='margin-left:50%;margin-top:10%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 14 -->
	<div class='flag' style='margin-left:47%;margin-top:14.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 15 -->
	<div class='flag' style='margin-left:44%;margin-top:14%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 16 -->
	<div class='flag' style='margin-left:54%;margin-top:14.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 17 -->
	<div class='flag' style='margin-left:30%;margin-top:36.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
	
	<!-- id = 18 -->
	<div class='flag' style='margin-left:16%;margin-top:25%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png'></a>
	</div>
<?php
$this->end();
?>