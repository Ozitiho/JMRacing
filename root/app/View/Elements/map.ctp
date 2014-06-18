<?php
$this->start('map');

// Get events
$date = date("Y");
$events = $this->requestAction("events/getEventsByYear/$date");
?>
	<!-- id = 1 -->
	<div class='flag' style='left:63.5%;top:45.5%;'>
		<a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 2 -->
	<div class='flag' style='left:77.5%;top:52.5%;'>
		<a onclick="showEventPopup('<?php print($events[1]['Event']['Country']); ?>', '<?php print($events[1]['Event']['City']); ?>', '<?php print($events[1]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 3 -->
	<div class='flag' style='left:36%;top:82.5%;'>
		<a onclick="showEventPopup('<?php print($events[2]['Event']['Country']); ?>', '<?php print($events[2]['Event']['City']); ?>', '<?php print($events[2]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 4 -->
	<div class='flag' style='left:52%;top:32%;'>
		<a onclick="showEventPopup('<?php print($events[3]['Event']['Country']); ?>', '<?php print($events[3]['Event']['City']); ?>', '<?php print($events[3]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 5 -->
	<div class='flag' style='left:56%;top:34%;'>
		<a onclick="showEventPopup('<?php print($events[4]['Event']['Country']); ?>', '<?php print($events[4]['Event']['City']); ?>', '<?php print($events[4]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 6 -->
	<div class='flag' style='left:50.5%;top:28.5%;'>
		<a onclick="showEventPopup('<?php print($events[5]['Event']['Country']); ?>', '<?php print($events[5]['Event']['City']); ?>', '<?php print($events[5]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 7 -->
	<div class='flag' style='left:47.5%;top:36%;'>
		<a onclick="showEventPopup('<?php print($events[6]['Event']['Country']); ?>', '<?php print($events[6]['Event']['City']); ?>', '<?php print($events[6]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 8 -->
	<div class='flag' style='left:48.5%;top:28%;'>
		<a onclick="showEventPopup('<?php print($events[7]['Event']['Country']); ?>', '<?php print($events[7]['Event']['City']); ?>', '<?php print($events[7]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 9 -->
	<div class='flag' style='left:49%;top:32.5%;'>
		<a onclick="showEventPopup('<?php print($events[8]['Event']['Country']); ?>', '<?php print($events[8]['Event']['City']); ?>', '<?php print($events[8]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 10 -->
	<div class='flag' style='left:51.5%;top:32%;'>
		<a onclick="showEventPopup('<?php print($events[9]['Event']['Country']); ?>', '<?php print($events[9]['Event']['City']); ?>', '<?php print($events[9]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 11 -->
	<div class='flag' style='left:52%;top:28%;'>
		<a onclick="showEventPopup('<?php print($events[10]['Event']['Country']); ?>', '<?php print($events[10]['Event']['City']); ?>', '<?php print($events[10]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 12 -->
	<div class='flag' style='left:52.5%;top:23%;'>
		<a onclick="showEventPopup('<?php print($events[11]['Event']['Country']); ?>', '<?php print($events[11]['Event']['City']); ?>', '<?php print($events[11]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 13 -->
	<div class='flag' style='left:56%;top:20.5%;'>
		<a onclick="showEventPopup('<?php print($events[12]['Event']['Country']); ?>', '<?php print($events[12]['Event']['City']); ?>', '<?php print($events[12]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 14 -->
	<div class='flag' style='left:52.5%;top:29%;'>
		<a onclick="showEventPopup('<?php print($events[13]['Event']['Country']); ?>', '<?php print($events[13]['Event']['City']); ?>', '<?php print($events[13]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 15 -->
	<div class='flag' style='left:50%;top:29.5%;'>
		<a onclick="showEventPopup('<?php print($events[14]['Event']['Country']); ?>', '<?php print($events[14]['Event']['City']); ?>', '<?php print($events[14]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 16 -->
	<div class='flag' style='left:59%;top:30.5%;'>
		<a onclick="showEventPopup('<?php print($events[15]['Event']['Country']); ?>', '<?php print($events[15]['Event']['City']); ?>', '<?php print($events[15]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 17 -->
	<div class='flag' style='left:36.5%;top:76%;'>
		<a onclick="showEventPopup('<?php print($events[16]['Event']['Country']); ?>', '<?php print($events[16]['Event']['City']); ?>', '<?php print($events[16]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<!-- id = 18 -->
	<div class='flag' style='left:23%;top:52%;'>
		<a onclick="showEventPopup('<?php print($events[17]['Event']['Country']); ?>', '<?php print($events[17]['Event']['City']); ?>', '<?php print($events[17]['Event']['Date']);?>')"><img src='/images/flag.png' alt=''></a>
	</div>
	
	<div id="merchandisePopup" title="Click to close this information">

    </div>
	
<?php
$this->end();
?>