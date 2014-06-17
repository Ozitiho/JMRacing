<script>
    // This function shows a product popup
    function showProductPopup(albumID, imgName, photoID, productDescription)
    {
        $("#merchandisePopup").css('background-image', 'url(/images/albums/' + albumID + '/' + imgName + ')');
        $("#merchandisePopup").css('display', 'block');
        var popupContent = '<div class="productPopupDescription"><p>' + productDescription + '</p>';
        popupContent += 'Size: <select class="sizeSelector"><option>S</option><option>M</option><option>L</option><option>XL</option></select>';
        popupContent += '<input type="button" value="Add to cart" class="button addToCartButton"></div>';

        $("#merchandisePopup").html(popupContent);

        // Don't close the box when the user clicks the sizeSelector
        $(".sizeSelector").click(function(e)
        {
            e.stopPropagation();
        });
    }

    // When the box gets clicked, hide it
    $(function()
    {
        $("#merchandisePopup").click(function()
        {
            $("#merchandisePopup").css('display', 'none');
        });
    });
</script>
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>

<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
    <!-- There is currently no means for sharing products, so do so later -->
    <?php $currentUrl = "http://$_SERVER[HTTP_HOST]"; ?>

    <div class="merch index">
        <?php
        $count = 0;
        if ($products) {
            foreach ($products as $product) {
                $productDescription = $product['Product']['description'];
                $count++;

                $fullImageLocation = "/images/no-photo.jpg"; // In case no image can be found
                $thumbImageLocation = $fullImageLocation; // In case no image can be found
                $photoID = 0;
                $imageName = null;
                if (isset($product['Product']['photo_id'])) {
                    $imageDetails = $this->requestAction('albums/getDetailsFromPhotoID/' . $product['Product']['photo_id']);
                }

                // If an image is found
                if (isset($imageDetails)) {
                    $photoID = $product['Product']['photo_id'];
                    $albumID = $imageDetails["Photo"]["album_id"];
                    $imageName = $imageDetails["Photo"]["name"];
                    $fullImageLocation = "/images/albums/$albumID/$imageName";
                    $thumbImageLocation = "/images/albums/$albumID/thumbs/$imageName";
                }
                ?>
                <div class="box team_col item">
                    <div class="center-cropped news" style="background-image: url('<?php echo $thumbImageLocation; ?>');">
                    </div>
                    <span class="heading blue">MERCHANDISE</span>
                    <div class="description merch">
                        <p class="era"><?php echo $product['Product']['Name'] ?></p><p class="era"> &nbsp;&nbsp;
                            <?php
                            if ($product['Product']['DiscountPrice'] > 0) {
                                echo ('<del>&euro;' . $product['Product']['Price'] . '</del> &nbsp;&nbsp;  <span>&euro;' . $product['Product']['DiscountPrice'] . '</span></p>');
                            } else {
                                echo ('<normal>&euro;' . $product['Product']['Price'] . '</normal></p>');
                            }
                            ?>
                        <div class="share">
                            <ul>
                                <li>SHARE &nbsp;&nbsp;</li>
                                <li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $currentUrl . "/products"; ?>"  target="_blank">&nbsp;</a></li>
                                <li class="twitter"><a href=" https://twitter.com/home?status=<?php echo $currentUrl . "/products Check out this " . $product['Product']['Name'] . " for sale on the JMRacing website!"; ?>" target="_blank">&nbsp;</a></li>
                                <li class="google"><a href="https://plus.google.com/share?url=<?php echo $currentUrl . "/products"; ?>" target="_blank">&nbsp;</a></li>
                            </ul>
                            <a style="cursor: pointer;" onclick="showProductPopup('<?php print($albumID); ?>', '<?php print($imageName); ?>', '<?php print($photoID); ?>', '<?php print($productDescription); ?>')" class="button">BUY THIS ITEM</a>
                        </div>
                    </div>
                    <?php
                    if ($count == 3)
                        print($this->element('socialmedia'));
                }
            }

            else {
                ?>
                <div class="noMerch box">
                    <h1>MERCHANDISE</h1>
                    There is no merchandise yet.
                </div>
                <?php
            }

            print($this->element('socialmedia'));
            ?>
        </div>
    </div>
    <div id="merchandisePopup" title="Click to close this product">

    </div>