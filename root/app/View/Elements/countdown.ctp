<?php

//Load the picture loading library
require_once(APP . 'Vendor' . DS . "functions/imageload.php");

$this->start('header');

// Get the upcoming events
$events = $this->requestAction('events/getUpcomingEvents');
$sponsors = $this->requestAction('events/getSponsorsOfEvent/' . $events[0]["Event"]["id"]);

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
                        <?php
                        $fullImageLocation = "/images/no-photo.jpg"; // In case no image can be found
                        $thumbImageLocation = $fullImageLocation; // In case no image can be found
                        if (isset($events[0]['Event']['photo_id'])) {
                            $imageDetails = $this->requestAction('albums/getDetailsFromPhotoID/' . $events[0]['Event']['photo_id']);
                        }

                        // If an image is found
                        if (isset($imageDetails)) {
                            $albumID = $imageDetails["Photo"]["album_id"];
                            $imageName = $imageDetails["Photo"]["name"];
                            $fullImageLocation = "/images/albums/$albumID/$imageName";
                            $thumbImageLocation = "/images/albums/$albumID/thumbs/$imageName";
                        }
                        ?>
						<div class="center-cropped event" style="background-image: url('<?php echo $thumbImageLocation; ?>'); max-width: 100%; border:1px solid #828D9F;">
						</div>
                        <img src="/images/event_img2.jpg" alt="">
                    </div>
                    <div class="right">
                        <h1><span><?php print(date("d F Y", strtotime($events[0]["Event"]["Date"]))); ?></span><br><?php print($events[0]["Event"]["City"]); ?> - <?php print($events[0]["Event"]["Country"]); ?></h1>
                        <p><?php print($events[0]["Event"]["Description"]); ?></p>
                        <a href="#" class="gray">GET TICKETS</a>
                        <a href="/events" class="yellow">SEE RESULTS MX2 2014</a>
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
                                if ($count == 6) {
                                    break;
                                }
                            }
                            ?>
                        </ul>
                        <a href="/events" class="button light_gray">ALL EVENTS <?php print(date("Y")); ?></a>
                    </div>
                    <div class="events_logo">
                        <?php
                        if (isset($sponsors)) {
                            /* The first couple sponsors are ALWAYS the main
                             * sponsors. However the top first sponsor is variable.
                             * To support this, simply switch around the image
                             * if the first sponsor is not husqvarna
                             */
							 
							 //Get the image
							$image = loadImage($sponsors[0]['Sponsor']['wide_image'], $this);
							$image = $image['full'];
                            echo "<a href='" . $sponsors[0]['Sponsor']['URL'] . "'><img src='" . $image . "' alt=''></a>";

                            //The given slicing requires every row to be placed in a seperate <ul> element.
                            echo "<ul>";
                            //So, if the main sponsor of the event is Nestaan, then put Husqvarna in the spot of Nestaan.
                            if ($sponsors[0]['Sponsor']['Name'] == "Nestaan") {
                                //TODO: Edit with husqvarna picture
                                echo "<li><a href='http://www.husqvarna.com'><img src='/images/event_logo2.png' alt=''></a></li>";
                            } else {
                                echo "<li><a href='http://www.nestaan.nl'><img src='/images/event_logo2.png' alt=''></a></li>";
                            }

                            //Now, do the same for Wilvo
                            if ($sponsors[0]['Sponsor']['Name'] == "Wilvo") {
                                echo "<li class=\"fright\"><a href='http://www.husqvarna.com'><img src='/images/event_logo2.png' alt=''></a></li>";
                            } else {
                                echo "<li class=\"fright\"><a href='http://www.wilvo.nl'><img src='/images/event_logo3.png' alt=''></a></li>";
                            }

                            //End of the row, print a new <ul> element for the new row
                            echo "</ul><ul>";
							
							$image = loadImage($sponsors[1]['Sponsor']['box_image'], $this);
							$image = $image['full'];
							
                            //First other sponsor
                            echo "<li><a href='" . $sponsors[1]['Sponsor']['URL'] . "'><img src='" . $image . "' alt=''></a></li>";

                            $image = loadImage($sponsors[2]['Sponsor']['box_image'], $this);
							$image = $image['full'];
							
							//Second other sponsor.
                            echo "<li class='fright'><a href='" . $sponsors[2]['Sponsor']['URL'] . "'><img src='" . $image . "' alt=''></a></li>";

                            //End second row
                            echo "</ul>";
                        }
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