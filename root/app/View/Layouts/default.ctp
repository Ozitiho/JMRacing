<!DOCTYPE HTML>
<html>
<head>
<?php echo $this->Html->charset(); ?>
<?php
	$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
 <title>
  <?php echo $cakeDescription ?>:
  <?php echo $title_for_layout; ?>
 </title>
 <?php
  echo $this->Html->meta('icon');

  echo $this->Html->css('css_styles');

  echo $this->fetch('meta');
  echo $this->fetch('css');
  echo $this->fetch('script');
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="/css/css_styles.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js" type="text/javascript"></script>
<script src="/js/jquery00.js" type="text/javascript"></script>
<script src="/js/jquery.slicknav.js" type="text/javascript"></script>
<script src="/js/html5_IE.js" type="text/javascript"></script>
</head>

<body>
<!-- Wrapper Div starts from here -->
<div class="wrapper"> 
  <!-- Header starts from here -->
  <header>
  	<section class="container">
  		<div class="logo">
        	<a href="/index.html"><img src="/images/logo.png" alt=""></a>
        </div>
        <div class="right">
        	<div class="social_icons">
            	<a href="#" class="fb"><img src="/images/fb.png" alt=""></a>
                <a href="#" class="twitter"><img src="/images/twitter.png" alt=""></a>
            </div>
            <div id="menu">
            	<a><span>MENU</span></a>
            </div>
            <div class="menu_open">
            	<div class="search">
                	<form action="#">
                    	<input type="text" value="">
                        <input type="submit" value="" class="submit">
                    </form>
                </div>
                <nav>
                	<ul>
                    	<li><a href="#">HOME</a></li>
                        <li class="sep">|</li>
                        <li><a href="#">NEWS</a></li>
                        <li class="sep">|</li>
                        <li><a href="#">TEAM</a>
                        	<div class="submenu">
                            	<ul>
                            	<li><a href="#">Aleksandr Tonkov #59</a></li>
                                <li class="sep">|</li>
                                <li><a href="#">Romain Febvre #461</a></li>
                                <li class="sep">|</li>
                                <li><a href="#">Team Managers</a></li>
                                <li class="sep">|</li>
                                <li><a href="#">Mechanics</a></li>
                                <li class="sep">|</li>
                                <li><a href="#">Main Sponsors</a></li>
                                <li class="sep">|</li>
                                <li><a href="#">Race Results</a></li>
                            </ul>
                            </div>
                        </li>
                        <li class="sep">|</li>
                        <li><a href="#">SPONSORS</a></li>
                        <li class="sep">|</li>
                        <li><a href="#">CALENDAR &amp; RESULTS</a></li>
                        <li class="sep">|</li>
                        <li><a href="#">PHOTOS &amp; MOVIES</a></li>
                        <li class="sep">|</li>
                        <li><a href="#">MERCHANDISE</a></li>
                        <li class="sep">|</li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    	<div class="clear"></div>
  	</section>
    <div class="home_banner">
    	<img src="/images/home_banner1.jpg" alt="">
        <div class="clear"></div>
    </div>
    <div class="events_main">
		<?php echo $this->fetch('flash');
			echo $this->fetch('header');
		?>
    </div>
  </header>
  <!-- Header ends here --> 
  <!-- Container starts from here -->
  
  <section class="main_container">
      <section class="container">
        <div class="all_news">
			<?php echo $this->fetch('flash');
				echo $this->fetch('content');
			?>
			<!-- CONTAINER VOOR IEDEREEN
        	<div id="container" class="js-masonry transitions-enabled infinite-scroll clearfix">
                        <div class="box">
                            <img src="images/home_img1.jpg" alt="">
                            <span class="heading">NEWS</span>
                            <div class="description">
                                <h2>Aleksandr Tonkov finishes sixth in the MX des Nations</h2>
                                <p>Aleksandr Tonkov of the Wilvo Nestaan JM Racing KTM Team finished sixth in the MX des Nations in...</p>
                                <div class="share">
                                    <ul>
                                        <li>SHARE &nbsp;&nbsp;</li>
                                        <li class="fb"><a href="#">&nbsp;</a></li>
                                        <li class="twitter"><a href="#">&nbsp;</a></li>
                                        <li class="google"><a href="#">&nbsp;</a></li>
                                    </ul>
                                    <a href="#" class="button yellow">READ FULL ARTICLE</a>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <img src="images/home_img2.jpg" alt="">
                            <span class="heading">NEWS</span>
                            <div class="description">
                                <h2>Romain Febvre scores top three moto finish in Brazil</h2>
                                <p>Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing has scored a top three moto finish...</p>
                                <div class="share">
                                    <ul>
                                        <li>SHARE &nbsp;&nbsp;</li>
                                        <li class="fb"><a href="#">&nbsp;</a></li>
                                        <li class="twitter"><a href="#">&nbsp;</a></li>
                                        <li class="google"><a href="#">&nbsp;</a></li>
                                    </ul>
                                    <a href="#" class="button">READ FULL ARTICLE</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="box team_col">
                            <a href="#">
                                <img src="images/home_img3.jpg" alt="">
                                <span class="overlay">&nbsp;</span>
                                <span class="heading">TEAM</span>
                            </a>
                            <p class="black">ALEKSANDR TONKOV #59</p>
                        </div>
                        <div class="facebook_box box">
                            <img src="images/big_fb.png" alt="" class="position">
                            <h1>FACEBOOK</h1>
                            <ul>
                                <li>
                                    <span>03 April 2014</span>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod venenatis viverra. http://pra.erat/ante</a>
                                </li>
                                <li>
                                    <span>05 April 2014</span>
                                    <a href="#">Imperdiet luctus lectus porttitor, aliquam placerat massa. Aenean elit arcu, pretium non ultrices a, volutpat aliquet nibh.</a>
                                </li>
                            </ul>
                            <a href="#" class="button">JOIN OUR FACEBOOK</a>
                        </div>
                        <div class="box team_col">
                            <a href="#">
                                <img src="images/home_img4.jpg" alt="">
                                <span class="overlay">&nbsp;</span>
                                <span class="heading">TEAM</span>
                            </a>
                            <p class="black">ROMAIN FEBVRE #461</p>
                        </div>
                        
                    
                        <div class="box">
                            <img src="images/home_img5.jpg" alt="">
                            <span class="heading">NEWS</span>
                            <div class="description">
                                <h2>Romain Febvre scores top three moto finish in Brazil</h2>
                                <p>Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing has scored a top three moto finish...</p>
                                <div class="share">
                                    <ul>
                                        <li>SHARE &nbsp;&nbsp;</li>
                                        <li class="fb"><a href="#">&nbsp;</a></li>
                                        <li class="twitter"><a href="#">&nbsp;</a></li>
                                        <li class="google"><a href="#">&nbsp;</a></li>
                                    </ul>
                                    <a href="#" class="button">READ FULL ARTICLE</a>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <img src="images/home_img6.jpg" alt="">
                            <span class="heading">NEWS</span>
                            <div class="description">
                                <h2>Aleksandr Tonkov finishes sixth in the MX des Nations</h2>
                                <p>Aleksandr Tonkov of the Wilvo Nestaan JM Racing KTM Team finished sixth in the MX des Nations in...</p>
                                <div class="share">
                                    <ul>
                                        <li>SHARE &nbsp;&nbsp;</li>
                                        <li class="fb"><a href="#">&nbsp;</a></li>
                                        <li class="twitter"><a href="#">&nbsp;</a></li>
                                        <li class="google"><a href="#">&nbsp;</a></li>
                                    </ul>
                                    <a href="#" class="button">READ FULL ARTICLE</a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="box team_col">
                            <a href="#">
                                <img src="images/home_img7.jpg" alt="">
                                <span class="overlay">&nbsp;</span>
                                <span class="heading blue">MERCHANDISE</span>
                            </a>
                            <p class="era">New Era - Red Bull Cap &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
                        </div>
                        <div class="facebook_box twitter_box box">
                            <h1>TWITTER</h1>
                            <ul>
                                <li>
                                    <span>03 April 2014</span>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod venenatis viverra. http://pra.erat/ante</a>
                                </li>
                                <li>
                                    <span>05 April 2014</span>
                                    <a href="#">Imperdiet luctus lectus porttitor, aliquam placerat massa. Aenean elit arcu, pretium non ultrices a, volutpat aliquet nibh.</a>
                                </li>
                            </ul>
                            <a href="#" class="button">FOLLOW ON TWITTER</a>
                        </div>
                        <div class="box team_col">
                            <img src="images/home_img8.jpg" alt="">
                            <span class="overlay">&nbsp;</span>
                            <span class="heading blue">VIDEO</span>
                            <a href="#" class="play_button"><img src="images/play_button.png" alt=""></a>
                        </div>
                        
                        
                        <nav id="page-nav">
                          <a href="pages/page2.html"></a>
                        </nav>
                        <div class="more_items">
                        	<div class="box">
                            <img src="images/home_img6.jpg" alt="">
                            <span class="heading">NEWS</span>
                            <div class="description">
                                <h2>Aleksandr Tonkov finishes sixth in the MX des Nations</h2>
                                <p>Aleksandr Tonkov of the Wilvo Nestaan JM Racing KTM Team finished sixth in the MX des Nations in...</p>
                                <div class="share">
                                    <ul>
                                        <li>SHARE &nbsp;&nbsp;</li>
                                        <li class="fb"><a href="#">&nbsp;</a></li>
                                        <li class="twitter"><a href="#">&nbsp;</a></li>
                                        <li class="google"><a href="#">&nbsp;</a></li>
                                    </ul>
                                    <a href="#" class="button">READ FULL ARTICLE</a>
                                </div>
                            </div>
                        </div>
                        	<div class="box">
                            <img src="images/home_img5.jpg" alt="">
                            <span class="heading">NEWS</span>
                            <div class="description">
                                <h2>Romain Febvre scores top three moto finish in Brazil</h2>
                                <p>Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing has scored a top three moto finish...</p>
                                <div class="share">
                                    <ul>
                                        <li>SHARE &nbsp;&nbsp;</li>
                                        <li class="fb"><a href="#">&nbsp;</a></li>
                                        <li class="twitter"><a href="#">&nbsp;</a></li>
                                        <li class="google"><a href="#">&nbsp;</a></li>
                                    </ul>
                                    <a href="#" class="button">READ FULL ARTICLE</a>
                                </div>
                            </div>
                        </div>
                            <div class="box team_col">
                                <a href="#">
                                    <img src="images/home_img7.jpg" alt="">
                                    <span class="overlay">&nbsp;</span>
                                    <span class="heading blue">MERCHANDISE</span>
                                </a>
                                <p class="era">New Era - Red Bull Cap &nbsp;&nbsp;  <del>€29,95</del> &nbsp;&nbsp;  <span>€14,95</span></p>
                            </div>
                            <div class="box team_col">
                            <a href="#">
                                <img src="images/home_img3.jpg" alt="">
                                <span class="overlay">&nbsp;</span>
                                <span class="heading">TEAM</span>
                            </a>
                            <p class="black">ALEKSANDR TONKOV #59</p>
                        </div>
                        	<div class="box team_col">
                            <a href="#">
                                <img src="images/home_img4.jpg" alt="">
                                <span class="overlay">&nbsp;</span>
                                <span class="heading">TEAM</span>
                            </a>
                            <p class="black">ROMAIN FEBVRE #461</p>
                        </div>
                        	<div class="box team_col">
                            <img src="images/home_img8.jpg" alt="">
                            <span class="overlay">&nbsp;</span>
                            <span class="heading blue">VIDEO</span>
                            <a href="#" class="play_button"><img src="images/play_button.png" alt=""></a>
                        </div>
                        </div>
                <div class="load_more">
                    <a id="load-images">LOAD MORE NEWS</a>
                </div>
            </div>
			-->
        </div>
        <div class="shadow">
        	<img src="/images/upper_shadow.png" alt="">
        </div>
        <div class="logos_slider">
        	<div class="span-24 prepend-top last" id="slider"> 
            	<a class="next-a" id="simplePrevious"></a>
                <div id="viewport">
                  <ul>
                    <li class="S_logo1">
                      <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo2">
                      <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo3">
                      <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo4">
                      <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo5">
                      <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo6">
                      <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo7">
                      <a href="#">&nbsp;</a>
                    </li>
                    <li class="S_logo8">
                      <a href="#">&nbsp;</a>
                    </li>
                  </ul>
                </div>
                <a class="back-a" id="simpleNext"></a> 
            </div>
        </div>
        <div class="shadow">
        	<img src="/images/bottom_shadow.png" alt="">
        </div>
        <div class="photos_main">
        	<h1><a id="photos">LATEST PHOTOS <br><span>&nbsp;</span></a></h1>
            <div class="hide">
                <ul>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img1.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img2.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img3.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img4.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img5.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img6.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img7.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img8.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img9.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img10.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img11.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img12.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img13.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img14.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img15.jpg" alt=""></a></li>
                    <li><a href="#"><span>&nbsp;</span><img src="images/photo_img16.jpg" alt=""></a></li>
                </ul>
                <a href="#" class="all_videos">SEE ALL PHOTOS &amp; VIDEOS</a>
            </div>
        </div>
        <div class="shadow">
        	<img src="/images/upper_shadow.png" alt="">
        </div>
        <div class="clear"></div>
      </section>
  </section>
  <section class="map_main" id="map">
  	<section class="container">
  		<div class="center">
        	<a id="explore_map">EXPLORE THE MAP<br><span>&nbsp;</span></a>
            <div class="hide">
                <img src="/images/direction_icon.png" alt="">
                
                <h2><strong>EXPLORE.</strong> <strong><span>NEXT RACE</span></strong> 45°56’48’’N 0°31’46’’W</h2>
                <p>01 June 2014 - Saint Jean d’Angely - France</p>
                <a class="button red" id="explore">EXPLORE THE MAP</a>
                <div class="map">
                    <img src="/images/full_map.png" alt="">
                </div>
            </div>
        </div>
        <div class="map map1" id="A_map">
        	<a id="close"><img src="/images/G_cross.png" alt=""></a>
        	<img src="/images/full_map.png" alt="" id="A_map_img">
        </div>
        <div class="clear"></div>
    </section>
  </section>
  <!-- Container ends here --> 
  <!-- Footer Starts from here -->
  <footer>
  	<section class="container">
  		<div class="F_top">
        	<ul>
            	<li class="sep">|</li>
                <li><a href="#">HOME</a></li>
                <li class="sep">|</li>
                <li><a href="#">NEWS</a></li>
                <li class="sep">|</li>
                <li><a href="#">TEAM</a></li>
                <li class="sep">|</li>
                <li><a href="#">SPONSORS</a></li>
                <li class="sep">|</li>
                <li><a href="#">CALENDAR &amp; RESULTS</a></li>
                <li class="sep">|</li>
                <li><a href="#">PHOTOS &amp; MOVIES</a></li>
                <li class="sep">|</li>
                <li><a href="#">MERCHANDISE</a></li>
                <li class="sep">|</li>
                <li><a href="#">CONTACT</a></li>
                <li class="sep">|</li>
            </ul>
        </div>
        <ul class="social_icons">
            <li class="fb"><a href="#">&nbsp;</a></li>
            <li class="twitter"><a href="#">&nbsp;</a></li>
            <li class="google"><a href="#">&nbsp;</a></li>
        </ul>
        <div class="F_bottom">
        	<ul>
            	<li class="sep">|</li>
                <li><strong>TEAMINFO</strong></li>
                <li class="sep">|</li>
                <li>
                	<p>Wilvo Nestaan Husqvarna MXGP<br>
                    Ondernemersstraat 16<br>
                    B-3920 Lommel<br>
                    Belgium<br>
                    E: <a href="mailto:ellen@jmracing.mx">ellen@jmracing.mx</a></p>
                </li>
                <li class="sep">|</li>
                <li><strong>CONTACT</strong></li>
                <li class="sep">|</li>
                <li>
                	<p><strong>Jacky Martens</strong><br>
                    Team manager<br>
                    T: +32 (0) 11 61 16 33<br>
                    F: +32 (0) 11 55 58 39<br>
                    E: <a href="mailto:jacky@jmracing.mx">jacky@jmracing.mx</a></p>
                </li>
            </ul>
            <p class="copyright">Husqvarna MXGP Copyright © 2013/2014. All Rights Reserved.<br>
            WebDesign &amp; WebDevelopment by <a href="http://provenwebconcepts.nl/" target="_blank">Proven Web Concepts</a> 2014.</p>
        </div>
    	<div class="clear"></div>
    </section>
  </footer>
  <div class="clear"></div>
  <!-- Footer ends here --> 
</div>
<!-- Wrapper Div ends here -->
<script src="/js/masonry.pkgd.min.js"></script>
<script src="/js/jquery.infinitescroll.min.js"></script>
<script src="/js/scripts.js" type="text/javascript"></script>

<script type="text/javascript">
 $(function(){

    var $container = $('#container');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.box'
      });
    });

    $container.infinitescroll({
      navSelector  : '#page-nav',    // selector for the paged navigation
      nextSelector : '#page-nav a',  // selector for the NEXT link (to page 2)
      itemSelector : '.box',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'No more pages to load.',
          img: 'http://i.imgur.com/6RMhx.gif'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they're ready
          $newElems.animate({ opacity: 1 });
          $container.masonry( 'appended', $newElems, true );
        });
      }
    );

  });
</script>


</body>
</html>
