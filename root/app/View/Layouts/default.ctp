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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js" type="text/javascript"></script>
<script src="/js/jquery.slicknav.js" type="text/javascript"></script>
<script src="/js/jquery00.js" type="text/javascript"></script>
<script src="/js/scripts.js" type="text/javascript"></script>
<script src="/js/html5_IE.js" type="text/javascript"></script>
</head>

<body>
<!-- Wrapper Div starts from here -->
<div class="wrapper"> 
  <!-- Header starts from here -->
  <header>
  	<div class="home_banner">
    	<img src="/images/home_banner1.jpg" alt="">
        <div class="clear"></div>
    </div>
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
            	<a>MENU</a>
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
    
  </header>
  <!-- Header ends here --> 
  <!-- Container starts from here -->
  <section class="main_container">
      <section class="container">
        <div class="all_news">
            <?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
        </div>
        <div class="shadow">
        	<img src="/images/bottom_shadow.png" alt="">
        </div>
        <div class="photos_main">
        	<h1>LATEST PHOTOS</h1>
            <ul>
            	<li><a href="#"><span>&nbsp;</span><img src="/images/photo_img1.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img2.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img3.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img4.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img5.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img6.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img7.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img8.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img9.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img10.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img11.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img12.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img13.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img14.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img15.jpg" alt=""></a></li>
                <li><a href="#"><span>&nbsp;</span><img src="/images/photo_img16.jpg" alt=""></a></li>
            </ul>
            <a href="#" class="all_videos">SEE ALL PHOTOS &amp; VIDEOS</a>
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
        	<img src="/images/direction_icon.png" alt="">
            <h2><strong>EXPLORE.</strong> <strong><span>NEXT RACE</span></strong> 45°56’48’’N 0°31’46’’W</h2>
            <p>01 June 2014 - Saint Jean d’Angely - France</p>
            <a class="button red">EXPLORE THE MAP</a>
        </div>
        <div class="map">
        	<img src="/images/full_map.png" alt="">
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
  <!-- Footer ends here --> 
</div>
<!-- Wrapper Div ends here -->
</body>
</html>
