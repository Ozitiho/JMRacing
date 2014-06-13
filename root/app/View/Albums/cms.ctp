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
    <?php
    if ($canAddAlbum) {
        ?>
        <a href="/albums/add" class="buttonLink">Add Album</a>
        <?php
    }

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
                            <?php
                            // Check if the user has the right to delete/edit albums
                            $hasRights = $this->requestAction('albums/isOwnedBy/' . $albumID);
                            if ($hasRights) {
                                ?>
                                <input type="checkbox" name="deleteAlbum[]" value="<?php print($albumID); ?>">
                                <a href="/albums/edit/<?php print($albumID); ?>">
                                    <img src="/images/editIcon.png" alt="" class="pencilIcon">
                                </a>
                                <?php
                            }
                            ?>
                            <a href="/albums/view/<?php print($albumID); ?>" class="blockLink">
                                <?php
                                print("<p>" . $album["Album"]["name"] . "</p>");
                                ?>
                            </a>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </ul>
                <?php
                if ($canAddAlbum) {
                    ?>
                    <input type="submit" name="deleteAlbumsButton" value="Delete Albums" class="redButton">
                <?php }
                ?>
            </form>
        </div>
        <?php
    } else {
        print("<p>There are no albums yet.</p>");
    }
    ?>
    <?php unset($album); ?>
</div>