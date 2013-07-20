<article <?php post_class('clearfix'); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <?php
		if ( has_post_format( 'link' ))
		{
			echo '<i class="icon-external-link"></i>';
		}
		elseif ( has_post_format( 'chat' ))
		{
			echo '<i class="icon-comments"></i>';
		}
		else
		{
			echo '<i class="icon-pencil"></i>';
		}
    ?>
      <?php the_title(); ?>
      </a></h2>
  </header>
  <div class="entry-summary">
    <?php if ( has_post_thumbnail()) : ?>
    <div class="span6">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('large'); ?></a>
    </div>
    <div class="span6">
      <?php the_excerpt(); ?>
      <?php get_template_part('templates/entry-meta'); ?>
    </div> 
       
	<?php else: ?>
    <div class="span12">
      <?php the_excerpt(); ?>
      <?php get_template_part('templates/entry-meta'); ?>
    </div>
    
	<?php endif; ?>
  </div>
</article>
