<article <?php post_class('clearfix'); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>">
	<i class="icon-music"></i>
<?php the_title(); ?>
      </a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary clearfix">
    <?php the_content(); ?>
  </div>
</article>
