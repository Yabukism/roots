<?php while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?>>


<?php if ( 'quote' == get_post_format( $post->ID ) ) : ?>
<div class="entry-content clearfix">
<div class="arrow_box">
  <i class="icon-quote-left title"></i>
  <?php the_content(); ?>
</div>
<header>
  <h1 class="entry-title">
    <?php the_title(); ?>
  </h1>
  <?php get_template_part('templates/entry-meta'); ?>
</header>

<?php elseif ( 'status' == get_post_format( $post->ID ) ) : ?>
<header>
  <h1 class="entry-title">
    <i class="icon-comment-alt"></i><?php the_title(); ?>
  </h1>
  <?php get_template_part('templates/entry-meta'); ?>
</header>
<?php echo get_avatar(get_the_author_meta('user_email'), 80 ); ?>
<div class="entry-content clearfix">
<?php the_content(); ?>

<?php elseif ( 'link' == get_post_format( $post->ID,'LinkFormatURL', true ) ) : ?>

<div class="entry-content clearfix">
<header>
  <h1 class="entry-title">
    <a href="<?php echo get_post_meta($post->ID, 'LinkFormatURL', true); ?>"><i class="icon-external-link"></i><?php the_title(); ?></a>
  </h1>
</header>	

<?php elseif ( 'audio' == get_post_format( $post->ID ) ) : ?>
<header>
  <h1 class="entry-title">
    <i class="icon-music"></i><?php the_title(); ?>
  </h1>
  <?php get_template_part('templates/entry-meta'); ?>
</header>
<div class="entry-content clearfix">
<?php the_content(); ?>

<?php elseif ( 'video' == get_post_format( $post->ID ) ) : ?>
<header>
  <h1 class="entry-title">
    <i class="icon-facetime-video"></i><?php the_title(); ?>
  </h1>
  <?php get_template_part('templates/entry-meta'); ?>
</header>
<div class="entry-content clearfix">
<?php the_content(); ?>

<?php elseif ( 'gallery' == get_post_format( $post->ID ) ) : ?>
<header>
  <h1 class="entry-title">
    <i class="icon-camera-retro"></i><?php the_title(); ?>
  </h1>
</header>
<div class="entry-content clearfix">
<?php the_content(); ?>
  <?php get_template_part('templates/entry-meta'); ?>


<?php elseif ( 'image' == get_post_format( $post->ID ) ) : ?>
<header>
  <h1 class="entry-title">
    <i class="icon-picture"></i><?php the_title(); ?>
  </h1>
</header>
<div class="entry-content clearfix">
<?php the_content(); ?>
  <?php get_template_part('templates/entry-meta'); ?>


<?php elseif ( 'chat' == get_post_format( $post->ID ) ) : ?>
<header>
  <h1 class="entry-title">
    <i class="icon-comments"></i><?php the_title(); ?>
  </h1>
</header>
<div class="entry-content clearfix">
<?php the_content(); ?>
  <?php get_template_part('templates/entry-meta'); ?>


<?php else : ?>
<header>
  <h1 class="entry-title"><i class="icon-file"></i><?php the_title(); ?></h1>
    <?php get_template_part('templates/entry-meta'); ?>
</header> 
<div class="entry-content clearfix"> 
  <?php the_content(); ?>

  <?php endif; ?>
</div>
  <?php the_tags('<p class="single-tags clearfix"><i class="icon-tags"></i> ', ', ', '</p>'); ?>

<footer class="clearfix">
  <?php reverie_page_links(); ?>
  <nav class="single-pagination row-fluid">
    <?php previous_post_link( '%link', '<span class="meta-nav"><i class="icon-angle-left"></i>' . '</span> %title' ); ?>
    <?php next_post_link( '%link', '%title <span class="meta-nav">' . '<i class="icon-angle-right"></i></span>' ); ?>
  </nav>
  <!-- .nav-single --> 
</footer>
<?php get_template_part('/templates/rerated'); ?>
<?php comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>
