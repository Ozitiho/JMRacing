<!DOCTYPE HTML>
<html>
    <head>

        <?php
        echo $this->Html->charset();
        $cakeDescription = __d('cake_dev', 'JM Racing');
        ?>

        <title>
            <?php echo $cakeDescription ?>:
            <?php
            // If a custom title is set, show it, otherwise use default
            if ($this->fetch('title') != null) {
                $title_for_layout = $this->fetch('title');
            }
            print($title_for_layout);
            ?>
        </title>

        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('css_styles');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');

        $photos = $this->requestAction('socialMedia/getFacebookPictures');

        // Include the elements
        print($this->element('sponsors'));
		print($this->element('map'));
		print($this->element('next_race'));
        ?>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                        <a href="/"><img src="/images/logo.png" alt=""></a>
                    </div>
                    <div class="right">
                        <div class="social_icons">
                            <a href="https://www.facebook.com/JMRacingTeamMX" class="fb"><img src="/images/fb.png" alt=""></a>
                            <a href="https://twitter.com/JMRacingMX" class="twitter"><img src="/images/twitter.png" alt=""></a>
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
                                    <li><a href="/">HOME</a></li>
                                    <li class="sep">|</li>
                                    <li><a href="/articles">NEWS</a></li>
                                    <li class="sep">|</li>
                                    <li><a href="/team">TEAM</a>
                                        <div class="submenu">
                                            <ul>
                                                <li><a href="/racers/view/1">Aleksandr Tonkov #59</a></li>
                                                <li class="sep">|</li>
                                                <li><a href="/racers/view/2">Romain Febvre #461</a></li>
                                                <li class="sep">|</li>
                                                <li><a href="/events">Race Results</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="sep">|</li>
                                    <li><a href="/sponsors">SPONSORS</a></li>
                                    <li class="sep">|</li>
                                    <li><a href="/events">CALENDAR &amp; RESULTS</a></li>
                                    <li class="sep">|</li>
                                    <li><a href="https://www.facebook.com/husqvarnamxgp/photos_albums">PHOTOS &amp; MOVIES</a></li>
                                    <li class="sep">|</li>
                                    <li><a href="/products">MERCHANDISE</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="clear"></div>
                </section>
                <div class="home_banner">
                    <?php
                    echo $this->fetch('bannerImage');
                    ?>
                    <div class="clear"></div>
                </div>
                <div class="events_main">
                    <?php
// Countdown header
                    echo $this->fetch('flash');
                    echo $this->fetch('header');
                    ?>
                </div>
            </header>
            <!-- Header ends here --> 
            <!-- Container starts from here -->
            <?php
            /* The section class(es) that should be used are different on the articles(home) page
             * than on the other pages.
             */
            if ($title_for_layout == "Home" || $title_for_layout == "Articles") {
                ?>
                <section class="main_container">
                    <?php
                } else {
                    ?>
                    <section class="main_container inner_container2 inner_container3"> 
                        <?php
                    }
                    ?>
                    <section class="container">
                        <div class="all_news">
                            <?php
                            // Container for all pages
                            echo $this->fetch('content');
                            ?>
                        </div>
                        <div class="shadow">
                            <img src="/images/upper_shadow.png" alt="">
                        </div>
                        <?php
// Get sponsors dynamically
                        echo $this->fetch('sponsors');
                        ?>
                        <div class="shadow">
                            <img src="/images/bottom_shadow.png" alt="">
                        </div>
                        <div class="photos_main">
                            <h1><a id="photos">LATEST PHOTOS <br><span>&nbsp;</span></a></h1>
                            <div class="hide">
                                <ul>
                                    <?php
                                    for ($i = 0; $i < 16; $i++):
                                        ?>
                                        <li>
                                            <a href="<?php echo $photos[$i]['link']; ?>"><span>&nbsp;</span>
                                                <div class="center-cropped photos" style="background-image: url('<?php echo $photos[$i]['source']; ?>');">
                                                    <img src="<?php echo $photos[$i]['source']; ?>" alt="">
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                    endfor;
                                    ?>
                                </ul>
                                <a href="https://www.facebook.com/husqvarnamxgp/photos_albums" class="all_videos">SEE ALL PHOTOS &amp; VIDEOS</a>
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

                                <h2><strong>EXPLORE.</strong> <strong><span>NEXT RACE</span></strong></h2>
                                <?php
									// Fetch the next_race element
									echo $this->fetch('next_race');
								?>
                                <a class="button red" id="explore">EXPLORE THE MAP</a>
                                <div class="map">
                                    <img src="/images/full_map.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="map map1" id="A_map">
                            <a id="close"><img src="/images/G_cross.png" alt=""></a>
                            <img src="/images/full_map.png" alt="" id="A_map_img">
                            <?php
								// Fetch the map element
								echo $this->fetch('map');
                            ?>
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
                                <li><a href="/">HOME</a></li>
                                <li class="sep">|</li>
                                <li><a href="/articles">NEWS</a></li>
                                <li class="sep">|</li>
                                <li><a href="/team">TEAM</a></li>
                                <li class="sep">|</li>
                                <li><a href="/sponsors">SPONSORS</a></li>
                                <li class="sep">|</li>
                                <li><a href="/events">CALENDAR &amp; RESULTS</a></li>
                                <li class="sep">|</li>
                                <li><a href="https://www.facebook.com/husqvarnamxgp/photos_albums">PHOTOS &amp; MOVIES</a></li>
                                <li class="sep">|</li>
                                <li><a href="/products">MERCHANDISE</a></li>
                                <li class="sep">|</li>
                                <li>
								<?php 
									if (!$this->Session->read('Auth.User')){
										echo "<a href=\"/users/login\">LOGIN</a></li>";
									}
									else{
										echo "<a href=\"/users/logout\">LOGOUT</a></li>";
									}
								?>
                                <li class="sep">|</li>
                            </ul>
                        </div>
                        <ul class="social_icons">
                            <li class="fb"><a href="https://www.facebook.com/JMRacingTeamMX">&nbsp;</a></li>
                            <li class="twitter"><a href="https://twitter.com/JMRacingMX">&nbsp;</a></li>
                            <li class="google" style="visibility:hidden;"><a href="#">&nbsp;</a></li>
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
        <script src="/js/EventEmitter.js"></script>
        <script src="/js/eventie.js"></script>
        <script src="/js/doc-ready.js"></script>
        <script src="/js/get-style-property.js"></script>
        <script src="/js/get-size.js"></script>
        <script src="/js/item.js"></script>
        <script src="/js/outlayer.js"></script>

        <script src="/js/masonry.js"></script>

        <script>
            $(window).load(function() {
                var container = document.querySelector('#container');
                var msnry = new Masonry(container, {
                    columnWidth: 1
                });
            });
        </script>

        <script src="/js/scripts.js" type="text/javascript"></script>
    </body>
</html>
