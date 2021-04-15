<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow" /> 
    <?php } ?>

    <title>
        <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page() && !is_page('home'))) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home() || is_page('home')) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
    </title>
    <meta name="author" content="Daniel Robert" />
    <meta name="copyright" content="Copyright © <?php echo date("Y"); ?>" />
    <meta name="description" content="Cup of Voodoo, by Daniel Robert" />

    <meta property="og:description"  content="A blog and portfolio by Daniel Robert." />
    <meta property="og:image"  content="<?php bloginfo('template_directory'); ?>/facebook-post-icon.png" />

    <meta name= "viewport" content= "width=device-width, initial-scale = 1">

	<meta name="robots" content="noindex,nofollow">

    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <!-- <link rel="apple-touch-icon" href="/apple-touch-icon.png"> -->

    <!-- CSS concatenated and minified via ant build script-->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <!-- end CSS-->
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <script type="text/javascript" src="https://use.typekit.com/nyg0rtf.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div id="container">
        <div id="content_wrap">
            <div class="nav_wrap">
                <nav>
                    <ul class="clearfix">
                        <li class="nav_home"><a href="<?php echo get_option('home'); ?>/" title="Home">Home</a></li>
                        <li class="nav_about"><a href="<?php bloginfo('url'); ?>/about/" title="About">About</a></li>
                        <li class="nav_journal"><a href="<?php bloginfo('url'); ?>/journal/" title="journal">Journal</a></li>
                        <li class="nav_portfolio"><a href="<?php bloginfo('url'); ?>/portfolio/" title="Portfolio">Portfolio</a></li>
                        <li class="nav_contact"><a href="<?php bloginfo('url'); ?>/contact/" title="Contact">Contact</a></li>    
                  </ul>
                </nav>
            </div>

            <header> <!-- TODO: remove id and fix CSS -->
                <h1 class="logo">
                    <img class="icon_main" src="<?php bloginfo('template_directory'); ?>/img/logo-icon.png" alt="Home" />
                    <a class="ir" href="<?php echo get_option('home'); ?>/" title="Home">
                        <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="Cup of Voodoo" />
                    </a>
                </h1>
            </header>
            <div id="main" class="clearfix" role="main">
                <div class="content">