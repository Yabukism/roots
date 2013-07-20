<article <?php post_class('clearfix'); ?>>
  <header>
  <div class="entry-summary clearfix">
  <div class="arrow_box">
     <i class="icon-quote-left title"></i><?php the_content(); ?>
     </div>
  </div>
  </header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      </a></h2>
</article>
