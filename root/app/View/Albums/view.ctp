<script>
    // This function fills the box with the details/img of the clicked thumbnail
    function setBoxImage(albumID, imgName, photoID)
    {
        $("#includeBox").css('background-image', 'url(/images/albums/' + albumID + '/' + imgName + ')');
        $("#includeBox").css('display', 'block');
        $("#includeBox").html('<p class="articleImageLink">Photo ID: ' + photoID + '</p>');

        // Don't close the box when the user clicks the links text
        $(".articleImageLink").click(function(e)
        {
            e.stopPropagation();
        });
    }

    // When the box gets clicked, hide it
    $(function()
    {
        $("#includeBox").click(function()
        {
            $("#includeBox").css('display', 'none');
        });

        $(".deleteBox").click(function(e)
        {
            e.stopPropagation();
        });
    });
</script>
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();

$albumID = $album["Album"]["id"];
$albumImages = $this->requestAction('albums/getSpecificAlbumImages/' . $albumID);
?>
<div class="box users form cms">
    <fieldset>
        <legend class="legend">
            <h1><?php print($album["Album"]["name"]); ?> Album</h1>
        </legend>
        <legend class="legend">
            <h1>Add pictures</h1>
        </legend>
        <p>The max file size is xxxx MB</p>
        <p>You can upload up to xxxx files at once</p>
        <?php
        if (isset($errorMessages) && $errorMessages) {
            foreach ($errorMessages as $errorMessage) {
                print("<p class='error-message'>" . $errorMessage . "</p>");
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data" id="photoUploadForm">
            <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
            <p><input type="submit" value="Upload Photos" name="uploadPhotosButton" class="redButton" /></p>
        </form>
        <?php
        // If the album contains images
        if ($albumImages) {
            ?>
            <form action="" method="post">
                <ul class="albumViewImages">
                    <?php
                    foreach ($albumImages as $image) {
                        $photoID = $image["Photo"]["id"];
                        $imageName = $image["Photo"]["name"];
                        $rawImage = rawurlencode($imageName); // convert spaces to %20
                        ?>
                        <li style="background-image: url(/images/albums/<?php print($albumID . "/thumbs/" . $rawImage); ?>);"
                            onclick="setBoxImage('<?php print($albumID); ?>', '<?php print($rawImage); ?>', '<?php print($photoID);?>')" 
                            title="Click to see a bigger version of this image">
                            <p>
                                <input type="checkbox" class="deleteBox" name="deleteImage[]" value="<?php print($imageName); ?>">
                            </p>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <input type="submit" name="deleteImagesButton" value="Delete Images" class="redButton">
            </form>
            <?php
        } else {
            print("This album does not contain any images.");
        }
        ?>
    </fieldset>
</div>
<div id="includeBox" title="Click to close this image">

</div>