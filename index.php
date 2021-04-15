<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="post_title">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
			</div>

			<div class="entry">
				<?php
					// if ( has_post_thumbnail() ) {
					// 	echo "<div class='feat_image image-frame'>";
					// 		the_post_thumbnail();
					// 	echo "</div>";
					// }
					the_content();
				?>
			</div>

			<div class="postmetadata">
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
				Posted in <?php the_category(', ') ?> | 
				<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
			</div>

		</article>

	<?php endwhile; ?>
	
    <!-- TODO: Consider removing this include and creating a function, like done in the WPTuts tutorial -->
	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Sorry, no posts today!</h2>
		<img src="<?php bloginfo('template_directory'); ?>/img/voodoo-doll.png" id="main-img" alt="voodoo-doll" />

	<?php endif; ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
