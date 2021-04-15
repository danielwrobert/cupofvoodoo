<?php
/*
Template Name: Portfolio Page
*/
get_header(); ?>

<div class="post">
    <h2>Portfolio</h2>
	<ul id="thumbs" class="clearfix">
      	<?php
			$original_query = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query( array( "post_type"=>"project", "project"=>"$project", 'orderby' => 'menu_order', 'order' => 'DESC', 'posts_per_page' => -1) );
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
				<?php
					$meta = get_post_custom($post->ID); 
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				?>
				<li class="project shadowed" rel="work">
					<figure>
						<?php if ($meta['thumb_associated_url'][0]) : ?>
							<img src="<?php echo $meta['thumb_associated_url'][0]; ?>" alt="<?php the_title(); ?>">
						<?php 
							else :
							the_post_thumbnail("project-thumb");
							endif;
						?>
						<div class="project-info"> 
							<h4><?php the_title(); ?></h4>
							<p>
								<?php 
									echo get_the_term_list( $post->ID, 'technology', '', ', ', '' );
								?>
							</p>
						</div>
				        <figcaption>
							<h4>Description:</h4>
							<?php the_excerpt(); ?>

							<?php if($meta['agency_associated_url'][0] && $meta['agency_link_associated_url'][0]) : ?>
								<h4>Agency/Org:</h4>
								<a href="<?php echo $meta['agency_link_associated_url'][0]; ?>"><?php echo $meta['agency_associated_url'][0]; ?></a>
							<?php elseif($meta['agency_associated_url'][0]) : ?>
								<h4>Agency/Org:</h4>
								<span><?php echo $meta['agency_associated_url'][0]; ?></span>
							<?php endif; ?>

							<?php if($url) : ?>
								<p class="light"><a href="<?php echo $url; ?>" title="Gallery">View Gallery &rsaquo;&rsaquo;</a></p>
							<?php endif; ?>

							<?php if($meta['site_associated_url'][0]) : ?>
								<p class="launch"><a href="<?php echo $meta['site_associated_url'][0]; ?>" target="_blank">Launch Site &rsaquo;&rsaquo;</a></p>
							<?php endif; ?>
				        </figcaption>
			        </figure> 
			    </li>
	    		<?php endwhile; ?>
				<?php else : ?>

			<h2>Sorry, no projects have been posted yet.</h2>
			<img src="<?php bloginfo('template_directory'); ?>/img/voodoo-doll.png" id="main-img" alt="voodoo-doll" />

		<?php 
			endif;
			$wp_query = null;
			$wp_query = $original_query;
			wp_reset_postdata();
		?>
	</ul>
</div> <!-- E/O .post -->

<?php get_footer(); ?>
