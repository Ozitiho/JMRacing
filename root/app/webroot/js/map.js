// This function shows a event popup
function showEventPopup(country, city, date)
{
	$("#merchandisePopup").css('display', 'block');
	var popupContent = '<div class="productPopupDescription"><p>' + country + ' - ' + city + '</p>';
	
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
