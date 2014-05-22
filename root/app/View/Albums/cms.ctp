<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Albums</h1>
    </legend>
    <a href="/albums/add" class="buttonLink">Add Album</a>
    <?php
    if ($albums) {
        ?>
        <div id="album">
            <form action="/albums/delete" method="post">
                <ul>
                    <?php
                    foreach ($albums as $album):
                        $albumID = $album["Album"]["id"];
                        // Check if the album contains images
                        $albumImage = $this->requestAction('albums/returnAlbumImage/' . $albumID);
                        ?>
                        <li style="background-image: url(<?php print($albumImage); ?>);">
                            <input type="checkbox" name="deleteAlbum[]" value="<?php print($albumID); ?>">
                            <a href="/albums/view/<?php print($albumID); ?>">
                                <?php
                                print("<p>" . $album["Album"]["name"] . "</p>");
                                ?>
                            </a>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </ul>
                <input type="submit" name="deleteAlbumsButton" value="Delete Albums" class="redButton">
            </form>
        </div>
        <?php
    } else {
        print("<p>There are no albums yet.</p>");
    }
    ?>
    <?php unset($album); ?>
</div>