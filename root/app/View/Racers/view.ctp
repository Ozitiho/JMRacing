<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();

// Get the race results for all racers
$year = date("Y");
$yearEvents = $this->requestAction('events/getEventsByYear/' . $year);
?>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
    <div class="box w2 event_w2">
        <div class="box_top team_col">
            <a>
                <img src="/images/big_img1.jpg" alt="">
            </a>
            <p class="black"><?php echo strtoupper($racer['Racer']['Name']) . " #" . $racer['Racer']['RacerNumber'] ?></p>
        </div>
        <div class="box_info box_profile">
            <div class="description">
                <h1>Profile</h1>
                <p><?php echo $racer['Racer']['Biography'] ?></p>
                <div class="share">
                    <ul>
                        <li>SHARE &nbsp;&nbsp;</li>
                        <li class="fb"><a href="#">&nbsp;</a></li>
                        <li class="twitter"><a href="#">&nbsp;</a></li>
                        <li class="google"><a href="#">&nbsp;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="personal_info">
            <h1>PERSONAL INFO</h1>
            <ul>
                <li>
                    <span class="label">Date of Birth</span>
                    <span class="desc"><?php echo $racer['Racer']['DateOfBirth'] ?></span>
                </li>
                <li>
                    <span class="label">Place of Birth</span>
                    <span class="desc"><?php echo $racer['Racer']['PlaceOfBirth'] ?></span>
                </li>
                <li>
                    <span class="label">Nationality</span>
                    <span class="desc"><?php echo $racer['Racer']['Nationality'] ?></span>
                </li>
                <li>
                    <span class="label">Residence</span>
                    <span class="desc"><?php echo $racer['Racer']['Residence'] ?></span>
                </li>
                <li>
                    <span class="label">Height</span>
                    <span class="desc"><?php echo $racer['Racer']['Height'] ?> cm</span>
                </li>
                <li>
                    <span class="label">Weight</span>
                    <span class="desc"><?php echo $racer['Racer']['Weight'] ?> kg</span>
                </li>
                <li>
                    <span class="label">Hardware</span>
                    <span class="desc"><?php echo $racer['Racer']['Hardware'] ?></span>
                </li>
            </ul>
        </div>
    </div>
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
    <div class="box team_col">
        <img src="/images/home_img8.jpg" alt="">
        <span class="overlay">&nbsp;</span>
        <span class="heading blue">VIDEO</span>
        <a href="#" class="play_button"><img src="/images/play_button.png" alt=""></a>
    </div>
    <div class="box team_col">
        <a href="/teams/">
            <img src="/images/team_img4.jpg" alt="">
            <span class="overlay">&nbsp;</span>
            <span class="heading">TEAM</span>
        </a>
        <p class="black font_18">R. COIFFARD - MECHANIC FEBVRE</p>
    </div>
    <?php print($this->element('merchandise')); ?>
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