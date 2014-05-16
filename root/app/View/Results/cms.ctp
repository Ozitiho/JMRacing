<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();

// Get the race results for all racers
$racers = $this->requestAction('racers/getRacerResults');

// Get a list of all events
$events = $this->requestAction('events/getEventsByYear/2014');

$racerID = null;
?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Results</h1>
    </legend>
    <table>
        <tr>
            <?php
            // Show all events and the results for all racers
            foreach ($racers as $racer) {
                $racerID = $racer["Racer"]["id"];
                ?>
                <td>
                    <p class="resultsRacer"><?php print($racer["Racer"]["Name"]); ?></p>
                    <table>
                        <tr>
                            <th>Event</th><th>R1</th><th>R2</th><th>GP</th>
                        </tr>
                        <?php
                        foreach ($events as $event) {
                            $resultFound = false;
                            foreach ($racer["Result"] as $result) {
                                /* If a racer has a result for a certain race, show it and show
                                 * edit/delete links
                                 */
                                if ($event["Event"]["id"] == $result["event_id"]) {
                                    $resultFound = true;
                                    $r1 = "-";
                                    $r2 = "-";
                                    $gp = "-";

                                    if (isset($result["R1"])) {
                                        $r1 = $result["R1"];
                                    }

                                    if (isset($result["R2"])) {
                                        $r2 = $result["R2"];
                                    }

                                    if (isset($result["GP"])) {
                                        $gp = $result["GP"];
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <?php print($event["Event"]["City"]); ?>
                                        </td>
                                        <td>
                                            <?php print($r1); ?>
                                        </td>
                                        <td>
                                            <?php print($r2); ?>
                                        </td>
                                        <td>
                                            <?php print($gp); ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Html->link(
                                                    'Edit', array('action' => 'edit', $result['id'])
                                            );
                                            ?>
                                            |
                                            <?php
                                            echo $this->Form->postLink(
                                                    'Delete', array('action' => 'delete', $result['id']), array('confirm' => 'Are you sure?')
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    break;
                                }
                            }

                            // If there isn't yet a result for a certain event, show an add link
                            if (!$resultFound) {
                                ?>
                                <tr>
                                    <td>
                                        <?php print($event["Event"]["City"]);
                                        ?>
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <a href="/results/add?event=<?php print($event["Event"]["id"]); ?>&racer=<?php print($racerID); ?>">Add</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </td>
                <?php
            }
            ?>
        </tr>
    </table>
</div>