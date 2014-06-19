// This function shows a event popup
function showEventPopup(eventImage, country, city, date)
{
    $("#merchandisePopup").css('background-image', 'url(' + eventImage + ')');
    $("#merchandisePopup").css('display', 'block');
    var popupContent = '<p class="mapEventName">' + country + ' - ' + city + '</p><div class="eventPopupDate"><p><b>Date:</b><br />' + date + '</p></div>';

    $("#merchandisePopup").html(popupContent);
}

// When the box gets clicked, hide it
$(function()
{
    $("#merchandisePopup").click(function()
    {
        $("#merchandisePopup").css('display', 'none');
    });
});
