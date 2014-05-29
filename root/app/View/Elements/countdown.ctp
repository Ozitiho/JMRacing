<?php
$this->start('header');

// Get the upcoming events
$events = $this->requestAction('events/getUpcomingEvents');
$sponsors = $this->requestAction('events/getSponsorsOfEvent/'.$events[0]["Event"]["id"]);

// Only show the countdown/event bar if there are any events
if ($events) {
    ?>
    <section class="container">
        <div class="events">
            <a id="event">SHOW MORE INFO NEXT EVENT</a>
            <div class="full_event">
                <div class="equal white_bg">
                    <h1 class="heading">NEXT EVENT: <?php print($events[0]["Event"]["City"]); ?> - <?php print($events[0]["Event"]["Country"]); ?></h1>
                    <div class="left">
                        <a href="#"><img src="/images/event_img1.jpg" alt=""></a>
                        <a href="#"><img src="/images/event_img2.jpg" alt=""></a>
                    </div>
                    <div class="right">
                        <h1><span><?php print(date("d F Y", strtotime($events[0]["Event"]["Date"]))); ?></span><br><?php print($events[0]["Event"]["City"]); ?> - <?php print($events[0]["Event"]["Country"]); ?></h1>
                        <h3>45°56’48’’N 0°31’46’’W</h3>
                        <p><?php print($events[0]["Event"]["Description"]); ?></p>
                        <a href="events/view/<?php print($events[0]["Event"]["id"]); ?>" class="red">MORE INFO</a>
                        <a href="#" class="gray">GET TICKETS</a>
                        <a href="#" class="yellow">SEE RESULTS MX2 2014</a>
                    </div>
                </div>
                <div class="equal">
                    <h1 class="heading">CALENDAR UPCOMING EVENTS</h1>
                    <div class="all_events">
                        <ul>
                            <?php
                            $amountOfEvents = count($events);
                            $count = 0;

                            foreach ($events as $event) {
                                $count++;
                                $country = $event["Event"]["Country"];
                                $city = $event["Event"]["City"];
                                $date = $event["Event"]["Date"];
                                $id = $event["Event"]["id"];

                                /* The last event needs a specific li class, don't ask me why...
                                 * The max amount of events to show are 6, to keep the layout 
                                 * intact. So show the last class when the last or sixth event 
                                 * has been reached
                                 */
                                if ($count == $amountOfEvents || $count == 6) {
                                    ?>
                                    <li class="last">
                                        <?php
                                    } else {
                                        ?>
                                    <li>
                                        <?php
                                    }
                                    ?>
                                    <a href="/events/view/<?php print($id); ?>"><?php print($country); ?> <span>- <?php print($city); ?> -</span> <?php print(date("d F Y", strtotime($event["Event"]["Date"]))); ?></a>
                                </li>
                                <?php
                                // If the max of 6 events has been reached, break the foreach loop
                                if($count == 6)
                                {
                                    break;
                                }
                            }
                            ?>
                        </ul>
                        <a href="/events" class="button light_gray">ALL EVENTS <?php print(date("Y")); ?></a>
                    </div>
                    <div class="events_logo">
						<?php
							if(isset($sponsors[0])){
								echo "<a href='".$sponsors[0]['Sponsor']['URL']."'><img src='/images/".$sponsors[0]['Sponsor']['Image']."' alt=''></a>";
							}
							echo "<ul>";
							if(isset($sponsors[1])){
								echo "<li><a href='".$sponsors[1]['Sponsor']['URL']."'><img src='/images/".$sponsors[1]['Sponsor']['Image']."' alt=''></a></li>";
							}
							if(isset($sponsors[2])){
								echo "<li class='fright'><a href='".$sponsors[2]['Sponsor']['URL']."'><img src='/images/".$sponsors[2]['Sponsor']['Image']."' alt=''></a></li>";
							}
							echo "</ul>
								<ul>";
							if(isset($sponsors[3])){
								echo "<li><a href='".$sponsors[3]['Sponsor']['URL']."'><img src='/images/".$sponsors[3]['Sponsor']['Image']."' alt=''></a></li>";
							}
							if(isset($sponsors[4])){
								echo "<li class='fright'><a href='".$sponsors[4]['Sponsor']['URL']."'><img src='/images/".$sponsors[4]['Sponsor']['Image']."' alt=''></a></li>";
							}
							echo "</ul>";
						?>
                    </div>
                </div>
            </div>
            <p class="event_text"><?php print($events[0]["Event"]["City"]); ?> - <?php print($events[0]["Event"]["Country"]); ?> - <?php print(date("d F", strtotime($events[0]["Event"]["Date"]))); ?></p>
        </div>
        <div class="time_left">
            <?php
            // Get the time info from the events action countdown
            $time = $this->requestAction('events/countdown');

            // Add 0's to the amount of hours/days if necessary
            $updatedDays = $time["Days"];
            $updatedHours = $time["Hours"];

            for ($i = 3; $i > strlen($time["Days"]); $i--) {
                $updatedDays = 0 . $updatedDays;
            }

            for ($i = 2; $i > strlen($time["Hours"]); $i--) {
                $updatedHours = 0 . $updatedHours;
            }
            ?>
            <img src="/images/days.png" alt="">
            <ul>
                <li><?php print(substr($updatedDays, 0, 1)); ?></li>
                <li><?php print(substr($updatedDays, 1, 1)); ?></li>
                <li><?php print(substr($updatedDays, 2, 1)); ?></li>
            </ul>
            <img src="/images/hours.png" alt="">
            <ul>
                <li><?php print(substr($updatedHours, 0, 1)); ?></li>
                <li><?php print(substr($updatedHours, 1, 1)); ?></li>
            </ul>
        </div>
        <div class="results">
            <ul>
                <li><a class="map_open scroll" href="#map"><img src="/images/map.png" alt=""></a></li>
                <li class="race_results"><a href="/events"><span>RACE RESULTS</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </section>
    <?php
}
?>

<?php $this->end(); ?>