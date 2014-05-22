<?php
$this->start('bannerImage');
?>
<img src="/<?php print($article['Article']['Photo']);?>" alt="">
<?php
$this->end();

// Set a custom title
$this->start('title');
echo $article['Article']['Title'];
$this->end();
?>
<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
    <div class="box w3 only_description">
        <span class="heading">NEWS</span>
        <div class="description">
            <h2><?php echo h($article['Article']['Title']); ?></h2>
            <span class="small">
                Created: <?php echo $article['Article']['CreateDate']; ?>
                <?php if ($article['Article']['LastUpdatedDate'] != null) {
                    echo " | Last updated: " . $article['Article']['LastUpdatedDate'];
                } ?>
            </span>
            <br><br>
            <p><?php echo ($article['Article']['Message']); ?></p>
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
    <div class="facebook_box box">
            <!--<img src="images/big_fb.png" alt="" class="position">-->
        <h1>FACEBOOK</h1>
        <ul>
            <li>
                <span>03 April 2014</span>
                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod venenatis viverra. http://pra.erat/ante</a>
            </li>
            <li>
                <span>05 April 2014</span>
                <a href="#">Imperdiet luctus lectus porttitor, aliquam placerat massa. Aenean elit arcu, pretium non ultrices a, volutpat aliquet nibh.</a>
            </li>
        </ul>
        <a href="#" class="button">JOIN OUR FACEBOOK</a>
    </div>
    <div class="facebook_box twitter_box box">
        <h1>TWITTER</h1>
        <ul>
            <li>
                <span>03 April 2014</span>
                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod venenatis viverra. http://pra.erat/ante</a>
            </li>
            <li>
                <span>05 April 2014</span>
                <a href="#">Imperdiet luctus lectus porttitor, aliquam placerat massa. Aenean elit arcu, pretium non ultrices a, volutpat aliquet nibh.</a>
            </li>
        </ul>
        <a href="#" class="button">FOLLOW ON TWITTER</a>
    </div>

    <?php
    if ($articles != null) {
        echo "<div class='load_more'><a>NEWEST NEWS ITEMS</a></div>";
        $count = 0;
        foreach ($articles as $article) {
            ?>
            <div class="box">
                <img src="/<?php echo $article['Article']['Photo']; ?>" alt="">
                <span class="heading">NEWS</span>
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
                        <a href="/articles/view/<?php echo $article['Article']['id']; ?>" class="button yellow">READ FULL ARTICLE</a>
                    </div>
                </div>
            </div>	
            <?php
            $count ++;
            //Don't display more than 4 articles
            if ($count == 4)
                break;
        }
    }
    ?>
</div>