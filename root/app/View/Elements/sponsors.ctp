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
						if($sponsor["Sponsor"]["Image"] !== "NULL"){
                        ?>
						<li>
							<a href="<?php print($sponsor["Sponsor"]["URL"]);?>" style="background:url(/images/<?php print($sponsor["Sponsor"]["Image"]);?>) no-repeat" target="_blank">&nbsp;</a>
						</li>
                        <?php
						}
                    }
                    ?>
                </ul>
            </div>
            <a class="back-a" id="simpleNext"></a> 
        </div>
    </div>
    <?php
	}
?>

<?php $this->end(); ?>