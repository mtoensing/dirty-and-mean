<?php
/**
 * Template Name: Recent Commented
 *
 * Description: A custom top game
 *
 */
get_header();
?>


<div id="content" class="section">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="entry">
        <h1 class="title entry-title"><span><?php esc_html(the_title()); ?><?php edit_post_link('edit', '<small> ', '</small>'); ?></span></h1>
            <?php the_content(); ?>
      </div>
      <?php
    endwhile;
  endif;
  
  $html = false;
  
  if (get_option('marctv-cache')) {
    $html = get_transient('marctv-lastcom-page');
  }

  if (!$html) {
    $results = query_posts_with_recent_comments(24);
    $html = get_mostcommentlist($results,"");
    set_transient('marctv-lastcom-page', $html, 60 * 60);
  }

  echo $html;

  /* Restore original Post Data
   * NB: Because we are using new WP_Query we aren't stomping on the
   * original $wp_query and it does not need to be reset.
   */
  wp_reset_postdata();
  ?>
</ul>
<?php marctv_pagination(" ", '<span class="pagenav">', "</span>", "« Vorherige", "Nächste »", 'span', '9'); ?>
</div><!-- #primary -->

<?php get_footer(); ?>

