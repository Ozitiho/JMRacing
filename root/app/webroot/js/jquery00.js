/**
 * @author Stéphane Roucheray 
 * @extends jquery
 */
jQuery.fn.carousel = function(previous, next, options){
	var sliderList = jQuery(this).children()[0];
	
	if (sliderList) {
		var increment = jQuery(sliderList).children().outerWidth("true"),
		elmnts = jQuery(sliderList).children(),
		numElmts = elmnts.length,
		sizeFirstElmnt = increment,
		shownInViewport = Math.round(jQuery(this).width() / sizeFirstElmnt),
		firstElementOnViewPort = 1,
		isAnimating = false;
		for (i = 0; i < shownInViewport; i++) {
			jQuery(sliderList).css('width',(numElmts+shownInViewport)*increment + increment + "px");
			jQuery(sliderList).append(jQuery(elmnts[i]).clone().addClass('clone'));
			
		}
		
		jQuery(previous).click(function(event){
			if (!isAnimating) {
				if (firstElementOnViewPort == 1) {
					jQuery(sliderList).css('left', "-" + numElmts * sizeFirstElmnt + "px");
					firstElementOnViewPort = numElmts;
				}
				else {
					firstElementOnViewPort--;
				}
				
				jQuery(sliderList).animate({
					left: "+=" + increment,
					y: 0,
					queue: true
				}, "swing", function(){isAnimating = false;});
				isAnimating = true;
			}
			
		});
		
		jQuery(next).click(function(event){
			if (!isAnimating) {
				if (firstElementOnViewPort > numElmts) {
					firstElementOnViewPort = 2;
					jQuery(sliderList).css('left', "0px");
				}
				else {
					firstElementOnViewPort++;
				}
				jQuery(sliderList).animate({
					left: "-=" + increment,
					y: 0,
					queue: true
				}, "swing", function(){isAnimating = false;});
				isAnimating = true;
			}
		});
	}
	
};
jQuery(document).ready(function(){
	jQuery('#slider-stage').carousel('#previous', '#next');
	jQuery('#viewport').carousel('#simplePrevious', '#simpleNext');  
	//The auto-scrolling function
	function slide(){
	$('#simpleNext').click();
	}
	
	//Launch the scroll every 2 seconds
	//var intervalId = window.setInterval(slide, 5000);
	var t=setTimeout(slide, 5000);
	var c = 0;
	function do_slide()
	{
		c++;
		if(c == 1)
		{
			var t=setTimeout(slide, 5000);
			c =0;
		}
		var tt=setTimeout(do_slide, 5000);
	}
	do_slide();
	//On user click deactivate auto-scrolling
	$('#previous, #simpleNext').click(
	function(){
	}
	);
});
jQuery(document).ready(function(){
	jQuery('#slider-stage').carousel('#previous2', '#next2');
	jQuery('#viewport2').carousel('#simplePrevious2', '#simpleNext2');  
	//The auto-scrolling function
	function slide(){
	$('#simpleNext2').click();
	}
	
	//Launch the scroll every 2 seconds
	//var intervalId = window.setInterval(slide, 5000);
	var t=setTimeout(slide, 5000);
	var c = 0;
	function do_slide()
	{
		c++;
		if(c == 1)
		{
			var t=setTimeout(slide, 5000);
			c =0;
		}
		var tt=setTimeout(do_slide, 5000);
	}
	do_slide();
	//On user click deactivate auto-scrolling
	$('#previous2, #simpleNext2').click(
	function(){
	}
	);
});