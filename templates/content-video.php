<article <?php post_class('clearfix'); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>">
<span><i class="icon-youtube-play"></i></span>
<?php the_title(); ?>
      </a></h2>
  </header>
  <div class="entry-summary clearfix">
    <?php the_excerpt(); ?>
  </div>
    <?php get_template_part('templates/entry-meta'); ?>
</article>

