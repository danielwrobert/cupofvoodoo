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
      $wp_query = new WP_Query( array( "post_type"=>"portfolio", "portfolio"=>"$portfolio", 'orderby' => 'menu_order', 'order' => 'DESC', 'posts_per_page' => -1) );
      if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
        <?php
          $meta = get_post_custom($post->ID); 
          $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        ?>
        <li class="project" rel="work">
          <figure>
            <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail();
              }
            ?>
            <figcaption>
              <h3><?php the_title(); ?></h3>
              <?php the_excerpt(); ?>

              <h4>Technologies:</h4>
              <p class="tech_list">
                <?php 
                  echo get_the_term_list( $post->ID, 'technology', '', ', ', '' );
                ?>
              </p>

              <?php if($meta['site_associated_url'][0]) : ?>
                <p class="launch"><a href="<?php echo $meta['site_associated_url'][0]; ?>" target="_blank">Launch Site &rsaquo;&rsaquo;</a></p>
              <?php endif; ?>
            </figcaption>
          </figure> 
        </li>
        <?php endwhile; ?>
    <?php else : ?>

    <h2>Sorry, no portfolio items have been posted yet.</h2>
    <img src="<?php bloginfo('template_directory'); ?>/img/voodoo-doll.png" id="main-img" alt="voodoo-doll" />

    <?php 
      endif;
      $wp_query = null;
      $wp_query = $original_query;
      wp_reset_postdata();
    ?>
  </ul>
</div>
    
<?php get_footer(); ?>