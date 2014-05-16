<?php
// Include the countdown element
print($this->element('countdown'));

$this->start('bannerImage');
?>
<img src="/images/inner_banner.jpg" alt="">
<?php
$this->end();

$tweets = $this->requestAction('socialMedia/getTweets');

$pageposts = $this->requestAction('socialMedia/getFacebookPosts');
?>
<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
    <?php
    $url = $actual_link = "$_SERVER[HTTP_HOST]";

    $count = 0;
    foreach ($articles as $article) {
        $currentUrl = $url . "/articles/" . $article['Article']['id'];
        $count++;
        if ($count == 1) {
            ?>
            <div class="box w3">
                <div class="image_left"><img src="<?php echo $article['Article']['Photo']; ?>" alt=""></div>
                <span class="heading">LATEST NEWS</span>
                <div class="description">
                    <h2><?php echo $article['Article']['Title']; ?></h2>
                    <p><?php echo $article['Article']['Message']; ?></p>
                    <div class="share">
                        <ul>
                            <li>SHARE &nbsp;&nbsp;</li>
                            <li class="fb"><a href="#">&nbsp;</a></li>
                            <li class="twitter"><a href="#">&nbsp;</a></li>
                            <li class="google"><a href="#">&nbsp;</a></li>
                        </ul>
                        <a href="/articles/view/<?php print($article['Article']['id']); ?>" class="button yellow">READ FULL ARTICLE</a>
                    </div>
                </div>
            </div>

            <div class="facebook_box box">
                <h1>FACEBOOK</h1>
                <ul>
                    <?php
                    for ($i = 0; $i < 2; $i++):
                        ?>
                        <li>
                            <span>
                                <?php
                                //Take the facebook date info and format it to: 01 Januari 2000
                                $datetime = new DateTime($pageposts['data'][$i]['created_time']);
                                echo $datetime->format('d M Y');
                                ?>
                            </span>
                            <a href="https://www.facebook.com/husqvarnamxgp"><?php echo $pageposts['data'][$i]['message']; ?></a>
                        </li>

                        <?php
                    endfor;
                    ?>
                </ul>
                <a href="https://www.facebook.com/JMRacingTeamMX" class="button">JOIN OUR FACEBOOK</a>
            </div>
            <div class="facebook_box twitter_box box">
                <h1>TWITTER</h1>
                <ul>
                    <?php
                    for ($i = 0; $i < 2; $i++):
                        ?>
                        <li>
                            <span>
                                <?php
                                $datetime = new DateTime($tweets[$i]['created_at']);
                                echo $datetime->format('d M Y');
                                ?>
                            </span>
                            <a href="https://twitter.com/HusqvarnaMXGP"><?php echo $tweets[$i]['text'] ?></a>
                        </li>
                        <?php
                    endfor;
                    ?>
                </ul>
                <a href="https://twitter.com/JMRacingMX" class="button">FOLLOW ON TWITTER</a>
            </div>
            <?php
        }
        else {
            ?>
            <div class="box">
                <img src="<?php echo $article['Article']['Photo']; ?>" alt="">
                <span class="heading">NEWS</span>
                <div class="description">
                    <h2><?php echo $article['Article']['Title']; ?></h2>
                    <p><?php echo $article['Article']['Message']; ?></p>
                    <div class="share">
                        <ul>
                            <li>SHARE &nbsp;&nbsp;</li>
                            <li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl; ?>"  target="_blank">&nbsp;</a></li>
                            <li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $currentUrl . " " . $article['Article']['Title']; ?>" target="_blank">&nbsp;</a></li>
                            <li class="google"><a href="https://plus.google.com/share?url=<?php echo $currentUrl ?>" target="_blank">&nbsp;</a></li>
                        </ul>
                        <a href="#" class="button yellow">READ FULL ARTICLE</a>
                    </div>
                </div>
            </div>	
            <?php
        }
    }
    ?>
</div>
