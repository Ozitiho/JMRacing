$(document).ready(function(){		
	  $("#menu a").click(function(){
		$(".menu_open").fadeToggle("slow");
		$("#menu a").toggleClass("active");
	  });
	  
	  $("a#event").click(function(){
		$(".full_event").fadeToggle("slow");
	  });
	  
	  $(".map_main .button").click(function(){
		$(".map").toggleClass("map_new");
		$(".map_main .center").hide("");
	  });
	  
  	  $(".results .map_open").click(function(){
		$(".map").toggleClass("map_new");
		$(".map_main .center").hide("");
	  });
	  
});

$(document).ready(function(){
	$('.menu_open nav').slicknav();
});

$(function() {
  $('.scroll').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
