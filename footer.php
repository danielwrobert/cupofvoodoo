                </div> <!-- END .content -->
                <?php get_sidebar(); ?>
            </div> <!--! end of #main -->
        </div> <!--! end of #content_wrap -->
    </div> <!--! end of #container -->

    <footer>
      <div id="top-strip">&nbsp;</div>
            <div id="footer-content">
              <div id="boxes">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer One')) : ?>
                <section>
                <h3>Upcoming Events</h3>
                <p>Dan is at home in sunny San Diego, CA with no upcoming events or travel plans.</p>
                </section>
                <?php endif; ?>

                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Two')) : ?>
                <section>
                <h3>About Cup of Voodoo</h3>
                <p>Cup of Voodoo is a blog &amp; portfolio created by
                Dan Robert -- a front-end web developer
                living and working in San Diego, CA.</p>
                <p class="footer_links"><a href="<?php bloginfo('url'); ?>/about/">Read More &rsaquo;&rsaquo;</a></p>
                <p class="footer_links"><a href="<?php bloginfo('template_directory'); ?>/img/resume.pdf">Download Resume &rsaquo;&rsaquo;</a></p>
                </section>
                <?php endif; ?>
                
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Three')) : ?>
                <section class="twitter_feed">
                <h3>Voodoo Tweets</h3>
                <div><a href="https://twitter.com/#!/danielwrobert" title="Daniel W. Robert Tweets">@danielwrobert</a>:<p id="voodoo_tweets">Hmmm ... Twitter seems to be down at the moment.</p></div>
                </section>
                <?php endif; ?>
              </div><!--! end of #boxes -->
          </div> <!--! end of #footer-content -->
          <div><p>&copy;<?php echo date("Y"); echo " "; //bloginfo('name'); ?>Daniel W Robert. All Rights Reserved.</p></div>
    </footer>

    <?php wp_footer(); ?>


    <!-- scripts (can be concatenated and minified via ant build script, if used)-->
    
    <!-- end scripts-->


    <script> // Change UA-XXXXX-X to be your site's ID
        window._gaq = [['_setAccount','UA-23832336-1'],['_trackPageview'],['_trackPageLoadTime']];
        Modernizr.load({
            load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
        });
    </script>


    <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->
  
</body>
</html>
