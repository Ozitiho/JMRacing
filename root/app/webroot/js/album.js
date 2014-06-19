// This function fills the box with the details/img of the clicked thumbnail
function setBoxImage(albumID, imgName, photoID)
{
    $("#includeBox").css('background-image', 'url(/images/albums/' + albumID + '/' + imgName + ')');
    $("#includeBox").css('display', 'block');
    $("#includeBox").html('<p>This image has the ID: <b>' + photoID + '</b></p><a href="/articles/add" class="redButton popupButton">Create an article with this image</a>');
    $("#includeBox").html('<a href="/articles/add/' + photoID + '" class="redButton popupButton">Create an article with this image</a>');

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
