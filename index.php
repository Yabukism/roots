<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
<?php if(function_exists('wp_pagenavi')) {
 wp_pagenavi(); } else { ?>
<nav class="post-nav">
  <ul class="pager">
    <li class="previous">
      <?php next_posts_link(__('&larr; Older posts', 'wci')); ?>
    </li>
    <li class="next">
      <?php previous_posts_link(__('Newer posts &rarr;', 'wci')); ?>
    </li>
  </ul>
</nav>
<?php } ?>
<?php endif; ?>
