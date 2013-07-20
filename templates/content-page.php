<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
<?php edit_post_link(__('Edit', 'wci'), '<div class="post-edit"><i class="icon-edit"></i>', '</div>'); ?>
<footer class="clearfix">
  <?php reverie_page_links(); ?>
  <nav class="single-pagination row-fluid">
    <?php previous_post_link( '%link', '<span class="meta-nav"><i class="icon-angle-left"></i>' . '</span> %title' ); ?>
    <?php next_post_link( '%link', '%title <span class="meta-nav">' . '<i class="icon-angle-right"></i></span>' ); ?>
  </nav>
  <!-- .nav-single --> 
</footer>
<?php comments_template('/templates/comments.php'); ?>