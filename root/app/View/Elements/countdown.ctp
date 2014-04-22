<?php
$this->start('header');

// Get the upcoming events
$events = $this->requestAction('events/getUpcomingEvents');

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
                        <a href="events/view/<?php print($events[0]["Event"]["id"]);?>" class="red">MORE INFO</a>
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

                                // The last event needs a specific li class, don't ask me why...
                                if ($count == $amountOfEvents) {
                                    ?>
                                    <li class="last">
                                    <?php
                                } else {
                                    ?>
                                    <li>
                                        <?php
                                    }
                                    ?>
                                    <a href="/events/view/<?php print($id);?>"><?php print($country); ?> <span>- <?php print($city); ?> -</span> <?php print(date("d F Y", strtotime($event["Event"]["Date"]))); ?></a>
                                </li>
                                    <?php
                                }
                                ?>
                        </ul>
                        <a href="/events" class="button light_gray">ALL EVENTS <?php print(date("Y"));?></a>
                    </div>
                    <div class="events_logo">
                        <a href="#"><img src="/images/event_logo1.png" alt=""></a>
                        <ul>
                            <li><a href="#"><img src="/images/event_logo2.png" alt=""></a></li>
                            <li class="fright"><a href="#"><img src="/images/event_logo3.png" alt=""></a></li>
                        </ul>
                        <ul>
                            <li><a href="#"><img src="/images/event_logo2.png" alt=""></a></li>
                            <li class="fright"><a href="#"><img src="/images/event_logo3.png" alt=""></a></li>
                        </ul>
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
                <li class="race_results"><a href="#"><span>RACE RESULTS</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </section>
    <?php
}
?>

<?php $this->end(); ?>