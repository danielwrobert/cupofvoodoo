<?php get_header(); ?>

	<h2>404 - Page Not Found</h2>
	<p class="dark-txt">Sorry! This is probably not what you were expecting. Perhaps we should start from <a href="<?php echo get_option('home'); ?>/" title="Home">The Beginning</a>.</p>
	<img src="<?php bloginfo('template_directory'); ?>/img/voodoo-doll.png" id="main-img" alt="voodoo-doll" />

<?php //get_sidebar(); ?>

<?php get_footer(); ?>