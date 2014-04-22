$(document).ready(function(){		
	  $("#menu a").click(function(){
		$(".menu_open").fadeToggle("slow");
		$("#menu a").toggleClass("active");
	  });
	  
	  $("a#event").click(function(){
		$(".full_event").fadeToggle("slow");
	  });
	  
	  $(".map_main .button").click(function(){
		$(".map1").fadeIn('slow').addClass("map_new");
		$(".map_main .center").hide("");
	  });
	  
  	  $(".results .map_open").click(function(){
		$(".map1").fadeIn('slow').addClass("map_new");
		$(".map_main").toggleClass('map_main1');
		$(".map_main .center").hide("");
		
	  });
	  
	  $(".map1 #close").click(function(){
		$(".map1").hide();
		$(".map_main .center").show("");
		$(".map_main .hide").hide("");
		$(".map_main").removeClass('map_main1');
	  });
	  
	   $(".photos_main #photos").click(function(){
		$(".photos_main .hide").fadeToggle('slow');
	  });
	  
	  $("#explore_map").click(function(){
		$(".map_main .hide").fadeToggle('slow');
		$(".map_main").toggleClass('map_main1');
	  });
	  
	 // $("#load-images").click(function(){
//		$(".more_items").slideToggle('slow');
//		$("#load-images").hide();
//	  });
	  
	  //$('html,body').bind("click touchstart touchend", function(event){
//		 if(event.target.id == 'A_map' || event.target.id == 'explore' || event.target.id == 'A_map_img' ){
//			 $(".map1").show();
//			 $(".map_main .center").hide();
//		 }else{
//			 $(".map1").hide();
//			 $(".map_main .center").show();
//		 }
//	  });
	  
		//$('#container .box:gt(9)').hide().last().after(
//                $('<a class="more_items"><span>MEER LADEN</span></a>').click(function(){
//                    var a = this;
//                    $('#container .box:not(:visible):lt(5)').fadeIn(function(){
//                     if ($('#container .box:not(:visible)').length == 0) $(a).remove();   
//                    }); return false;
//                })
//            );
	  
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

