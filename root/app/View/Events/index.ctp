<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
    <?php
    if ($upcomingEvents) {
        ?>
        <div class="box w2 event_w2">
            <div class="equal white_bg">
                <div class="left">
                    <?php
                    $fullImageLocation = "/images/no-photo.jpg"; // In case no image can be found
                    $thumbImageLocation = $fullImageLocation; // In case no image can be found
                    if (isset($upcomingEvents[0]['Event']['photo_id'])) {
                        $imageDetails = $this->requestAction('albums/getDetailsFromPhotoID/' . $upcomingEvents[0]['Event']['photo_id']);
                    }

                    // If an image is found
                    if (isset($imageDetails)) {
                        $albumID = $imageDetails["Photo"]["album_id"];
                        $imageName = $imageDetails["Photo"]["name"];
                        $fullImageLocation = "/images/albums/$albumID/$imageName";
                        $thumbImageLocation = "/images/albums/$albumID/thumbs/$imageName";
                    }
                    ?>
                    <a href="/events/view/<?php print($upcomingEvents[0]["Event"]["id"]); ?>"><img src="<?php print($thumbImageLocation); ?>" alt=""></a>
                    <a href="#"><img src="/images/event_img2.jpg" alt=""></a>
                </div>
                <div class="right">
                    <h1 class="heading2">UPCOMING RACE </h1>
                    <h1><span><?php print(date("d F Y", strtotime($upcomingEvents[0]["Event"]["Date"]))); ?></span><br><?php print($upcomingEvents[0]["Event"]["City"]); ?> - <?php print($upcomingEvents[0]["Event"]["Country"]); ?></h1>
                    <p><?php print($upcomingEvents[0]["Event"]["Description"]); ?></p>
                    <a href="#" class="gray">GET TICKETS</a>
                    <a href="#" class="yellow">SEE RESULTS MX2 2014</a>
                </div>
            </div>
        </div>
        <?php
    }

    // Get the race results for all racers
    $racers = $this->requestAction('racers/getRacerResults');

    // Show the results for each racer
    foreach ($racers as $racer) {
        ?>
        <div class="box">
            <div class="results_event">
                <h1>RESULTS <span style="text-transform: uppercase;"><?php print($racer["Racer"]["Name"]); ?></span> #<?php print($racer["Racer"]["RacerNumber"]); ?></h1>
                <table>
                    <tr>
                        <th class="yellow">EVENT</th>
                        <th>R 1</th>
                        <th>R 2</th>
                        <th>GP</th>
                    </tr>
                    <tr class="empty">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    // Show all events for this year
                    foreach ($yearEvents as $event) {
                        $resultFound = false;
                        ?>
                        <tr>
                            <td class="event_name"><span><?php print($event["Event"]["Country"]); ?></span> - <?php print($event["Event"]["City"]); ?></td>
                            <?php
                            // Loop through all results for a racer and add them besides the event
                            foreach ($racer["Result"] as $result) {
                                if ($event["Event"]["id"] == $result["event_id"]) {
                                    $resultFound = true;
                                    ?>
                                    <td class="event_r1"><span><?php print($result["R1"]); ?></span></td>
                                    <td class="event_r2"><span><?php print($result["R2"]); ?></span></td>
                                    <td class="event_gp"><span><?php print($result["GP"]); ?></span></td>
                                    <?php
                                }
                            }

                            // If no result has been found, show empty rounds
                            if (!$resultFound) {
                                ?>
                                <td class="event_r1 blank"><span></span></td>
                                <td class="event_r2 blank"><span></span></td>
                                <td class="event_gp blank"><span></span></td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr class="empty">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="border">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="average">
                        <td class="event_name"><span>WORLD CUP STANDING</span></td>
                        <td class="event_gp blank"><span class="yellow">
                                <?php
                                print($racer["Racer"]["WorldCupStanding"]);
                                ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if ($yearEvents) {
        ?>
        <div class="box w2">
            <div class="year_events">
                <h1>THIS YEARS EVENTS</h1>
                <div class="all_events">
                    <ul>
                        <?php
                        $amountOfEvents = count($yearEvents);
                        $count = 0;
                        $amountToSplitRows = round($amountOfEvents / 2);

                        foreach ($yearEvents as $event) {
                            $count++;
                            $country = $event["Event"]["Country"];
                            $city = $event["Event"]["City"];
                            $date = $event["Event"]["Date"];
                            $id = $event["Event"]["id"];

                            // The last event needs a specific li class
                            if ($count == $amountOfEvents || $count == $amountToSplitRows) {
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
                            // Split the rows halfway, to they form nice rows
                            if ($count == $amountToSplitRows) {
                                ?>
                            </ul>
                        </div>
                        <div class="all_events">
                            <ul>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="box_equal">
        <div class="load_more">
            <a id="load-images">MERCHANDISE</a>
        </div>
        <div class="box team_col item">
            <img src="/images/team_img5.jpg" alt="">
            <span class="heading blue">MERCHANDISE</span>
            <div class="description">
                <p class="era">Race Shirt - Red Bull &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
                <div class="share">
                    <ul>
                        <li>SHARE &nbsp;&nbsp;</li>
                        <li class="fb"><a href="#">&nbsp;</a></li>
                        <li class="twitter"><a href="#">&nbsp;</a></li>
                        <li class="google"><a href="#">&nbsp;</a></li>
                    </ul>
                    <a href="#" class="button">BUY THIS ITEM</a>
                </div>
            </div>
        </div>
        <div class="box team_col item">
            <img src="/images/team_img6.jpg" alt="">
            <span class="heading blue">MERCHANDISE</span>
            <div class="description">
                <p class="era">New Era - Red Bull Cap &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
                <div class="share">
                    <ul>
                        <li>SHARE &nbsp;&nbsp;</li>
                        <li class="fb"><a href="#">&nbsp;</a></li>
                        <li class="twitter"><a href="#">&nbsp;</a></li>
                        <li class="google"><a href="#">&nbsp;</a></li>
                    </ul>
                    <a href="#" class="button">BUY THIS ITEM</a>
                </div>
            </div>
        </div>
    </div>
    <div class="box_equal">
        <div class="load_more">
            <a id="load-images">MAIN SPONSORS</a>
        </div>
        <div class="box team_col">
            <a href="#"><img src="/images/item_logo1.png" alt=""></a>
        </div>
        <div class="box team_col">
            <a href="#"><img src="/images/item_logo2.png" alt=""></a>
        </div>
        <div class="box team_col w4">
            <a href="#"><img src="/images/item_logo3.png" alt=""></a>
        </div>
    </div>
</div>