<?php
/*
Template Name: Home Page Template
*/

$detect = new Mobile_Detect();

get_header();

	if ($detect->isMobile() && !($detect->isTablet())) { ?>
		<img src="<?php bloginfo('template_directory'); ?>/img/voodoo-doll-mobile.png" id="main-img" alt="voodoo-doll" />
	<?php } else { ?>
		<img src="<?php bloginfo('template_directory'); ?>/img/voodoo-doll.png" id="main-img" alt="voodoo-doll" />
	<?php }

get_footer(); 

?>
