<?php
$this->start('sponsors');

// Get the sponsors
$sponsors = $this->requestAction('sponsors/index');

// Only show the sponsors if there are any
if ($sponsors) {
    ?>
    <div class="logos_slider">
        <div class="span-24 prepend-top last" id="slider"> 
            <a class="next-a" id="simplePrevious"></a>
            <div id="viewport">
                <ul>
                    <?php
                    foreach($sponsors as $sponsor)
                    {
                        ?>
                    <li>
                        <a href="<?php print($sponsor["Sponsor"]["URL"]);?>" style="background:url(/images/<?php print($sponsor["Sponsor"]["Image"]);?>) no-repeat">&nbsp;</a>
                    </li>
                        <?php
                    }
                    ?>
                    <li class="S_logo1">
                        <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo2">
                        <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo3">
                        <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo4">
                        <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo5">
                        <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo6">
                        <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo7">
                        <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo8">
                        <a href="#">&nbsp;</a>
                    </li>
                </ul>
            </div>
            <a class="back-a" id="simpleNext"></a> 
        </div>
    </div>
    <?php
}
?>

<?php $this->end(); ?>